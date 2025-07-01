<?php

namespace App\Http\Controllers;

use App\Models\InfPago;
use App\Models\Matricula;
use App\Models\InfConceptoPago;
use Illuminate\Http\Request;

class InfPagoController extends Controller
{
    const PAGINATION = 7;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $buscarpor = $request->get('buscarpor');
        $pagos = InfPago::with(['matricula', 'concepto'])
            ->where('codigo_transaccion', 'like', '%' . $buscarpor . '%')
            ->paginate($this::PAGINATION);

        return view('cpagos.pagos.index', compact('pagos', 'buscarpor'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $matriculas = Matricula::all();
        $conceptos = InfConceptoPago::all();
        return view('cpagos.pagos.create', compact('matriculas', 'conceptos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'matriculaId' => 'required|exists:matriculas,matricula_id',
            'conceptoId' => 'required|exists:conceptospago,concepto_id',
            'monto' => 'required|numeric|min:0',
            'fechaVencimiento' => 'required|date',
            'fechaPago' => 'nullable|date',
            'metodoPago' => 'nullable|string|max:50',
            'comprobanteUrl' => 'nullable|string|max:255',
            'estado' => 'required|in:Pendiente,Pagado,Anulado',
            'codigoTransaccion' => 'nullable|string|max:100|unique:pagos,codigo_transaccion',
            'observaciones' => 'nullable|string|max:500',
        ], [
            'matriculaId.required' => 'Seleccione una matrícula',
            'matriculaId.exists' => 'La matrícula seleccionada no existe',
            'conceptoId.required' => 'Seleccione un concepto',
            'conceptoId.exists' => 'El concepto seleccionado no existe',
            'monto.required' => 'Ingrese el monto',
            'monto.numeric' => 'El monto debe ser numérico',
            'fechaVencimiento.required' => 'Ingrese la fecha de vencimiento',
            'fechaVencimiento.date' => 'Ingrese una fecha válida',
            'fechaPago.date' => 'Ingrese una fecha de pago válida',
            'estado.required' => 'Seleccione el estado',
            'estado.in' => 'Estado no válido',
            'codigoTransaccion.unique' => 'El código de transacción ya existe',
            'observaciones.max' => 'Las observaciones son demasiado largas (máximo 500 caracteres)'
        ]);

        $pago = new InfPago();
        $pago->matricula_id = $request->matriculaId;
        $pago->concepto_id = $request->conceptoId;
        $pago->monto = $request->monto;
        $pago->fecha_vencimiento = $request->fechaVencimiento;
        $pago->fecha_pago = $request->fechaPago;
        $pago->metodo_pago = $request->metodoPago;
        $pago->comprobante_url = $request->comprobanteUrl;
        $pago->estado = $request->estado;
        $pago->codigo_transaccion = $request->codigoTransaccion;
        $pago->usuario_registro = 1; // Usuario por defecto
        $pago->observaciones = $request->observaciones;
        $pago->save();

        return redirect()
            ->route('pagos.index')
            ->with('success', 'Pago registrado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pago = InfPago::with(['matricula', 'concepto'])->findOrFail($id);
        return view('cpago.mostrar', compact('pago'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pago = InfPago::findOrFail($id);
        $matriculas = Matricula::all();
        $conceptos = InfConceptoPago::all();
        return view('cpago.pagos.edit', compact('pago', 'matriculas', 'conceptos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $pago = InfPago::findOrFail($id);

        $data = $request->validate([
            'matriculaId' => 'required|exists:matriculas,matricula_id',
            'conceptoId' => 'required|exists:conceptospago,concepto_id',
            'monto' => 'required|numeric|min:0',
            'fechaVencimiento' => 'required|date',
            'fechaPago' => 'nullable|date',
            'metodoPago' => 'nullable|string|max:50',
            'comprobanteUrl' => 'nullable|string|max:255',
            'estado' => 'required|in:Pendiente,Pagado,Anulado',
            'codigoTransaccion' => 'nullable|string|max:100|unique:pagos,codigo_transaccion,' . $id . ',pago_id',
            'observaciones' => 'nullable|string|max:500',
        ]);

        $pago->update([
            'matricula_id' => $request->matriculaId,
            'concepto_id' => $request->conceptoId,
            'monto' => $request->monto,
            'fecha_vencimiento' => $request->fechaVencimiento,
            'fecha_pago' => $request->fechaPago,
            'metodo_pago' => $request->metodoPago,
            'comprobante_url' => $request->comprobanteUrl,
            'estado' => $request->estado,
            'codigo_transaccion' => $request->codigoTransaccion,
            'observaciones' => $request->observaciones,
        ]);

        return redirect()
            ->route('pagos.index')
            ->with('success', 'Pago actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $pago = InfPago::findOrFail($id);

            if ($pago->estado == 'Pagado') {
                return redirect()
                    ->route('pagos.index')
                    ->with('error', 'No se puede eliminar un pago con estado "Pagado"');
            }

            $codigo = $pago->codigo_transaccion;
            $pago->delete();

            return redirect()
                ->route('pagos.index')
                ->with('success', "Pago {$codigo} eliminado satisfactoriamente");
        } catch (\Exception $e) {
            return redirect()
                ->route('pagos.index')
                ->with('error', 'Error al eliminar el pago: ' . $e->getMessage());
        }
    }
}
