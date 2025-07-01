<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfAnioLectivoController;
use App\Http\Controllers\InfAsignaturaController;
use App\Http\Controllers\InfAulaController;
use App\Http\Controllers\InfCursoController;
use App\Http\Controllers\InfDocenteController;
use App\Http\Controllers\InfEstudianteController;
use App\Http\Controllers\InfGradoController;
use App\Http\Controllers\InfNivelController;
use App\Http\Controllers\InfRepresentanteController;
use App\Http\Controllers\InfSeccionController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\InfEstudianteRepresentanteController;
use App\Http\Controllers\InfPeriodosEvaluacionController;
use App\Http\Controllers\MatriculaController;
use App\Http\Controllers\InfConceptoPagoController;
use App\Http\Controllers\InfPagoController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class,'index'])->name('home');

    Route::get('/rutarrr1', [PrincipalController::class, 'index'])->name('rutarrr1');
    Route::get('/rutarrr2', [ClienteController::class, 'index'])->name('rutarrr2');
    Route::get('/rutarrr3', [UsuariosController::class, 'index'])->name('rutarrr3');
    Route::get('/rutarrr4', [ProductosController::class, 'index'])->name('rutarrr4');

    Route::resource('/estudiante', InfEstudianteController::class);
    Route::resource('/representante', InfRepresentanteController::class);
    Route::post('/buscar-representante', [InfRepresentanteController::class, 'buscarPorDni'])->name('buscar.representante');
    Route::post('/asignar-representante', [InfRepresentanteController::class, 'asignarRepresentante'])->name('asignar.representante');

    Route::get('/verificar-dni', [InfEstudianteController::class, 'verificarDni'])->name('verificar.dni');
    Route::get('/registrodocente', [InfDocenteController::class, 'index'])->name('registrardocente.index');
    Route::get('/registrorepresentante', [InfRepresentanteController::class, 'index'])->name('registrarrepresentante.index');
    Route::get('/representantes/pdf', [InfRepresentanteController::class, 'exportarPDF'])->name('representantes.pdf');
    Route::get('/registronivel', [InfNivelController::class, 'index'])->name('registrarnivel.index');
    Route::get('/registroseccion', [InfSeccionController::class, 'index'])->name('registrarseccion.index');
    Route::get('/registroaniolectivo', [InfAnioLectivoController::class, 'index'])->name('registraraniolectivo.index');
    Route::get('/registrorepresentanteestudiante', [InfEstudianteRepresentanteController::class, 'index'])->name('registrorepresentanteestudiante.index');
    Route::get('/registrogrado', [InfAulaController::class, 'index'])->name('registraraula.index');
    Route::get('/registroasignatura', [InfAsignaturaController::class, 'index'])->name('registrarasignatura.index');
    Route::get('/registroperiodoevaluacion', [InfPeriodosEvaluacionController::class, 'index'])->name('registrarPeriodosEvaluacion.index');
    Route::get('/registrogrados', [InfGradoController::class, 'index'])->name('grados.index');

Route::get('/matriculas', [MatriculaController::class, 'index'])->name('matriculas.index');
Route::get('/matriculas/create', [MatriculaController::class, 'create'])->name('matriculas.create');
Route::post('/matriculas', [MatriculaController::class, 'store'])->name('matriculas.store');
Route::get('/matriculas/{id}', [MatriculaController::class, 'show'])->name('matriculas.show');
Route::get('/matriculas/{id}/editar', [MatriculaController::class, 'edit'])->name('matriculas.edit');
Route::put('/matriculas/{id}', [MatriculaController::class, 'update'])->name('matriculas.update');
Route::delete('/matriculas/{id}', [MatriculaController::class, 'destroy'])->name('matriculas.destroy');
Route::get('/verificar-numero-matricula', [MatriculaController::class, 'verificarNumeroMatricula'])->name('verificar.numero.matricula');


    Route::resource('/registrarcurso', InfCursoController::class);
    Route::get('/registrarcurso/cancelar', function () {
        return redirect()->route('registrarcurso.index')->with('datos','Acción Cancelada !!!');
    })->name('registrarcurso.cancelar');
    Route::get('registrarcurso/{curso_id}/confirmar', [InfCursoController::class,'confirmar'])->name('registrarcurso.confirmar');

    Route::get('/registroconceptopago', [InfConceptoPagoController::class, 'index'])->name('conceptospago.index');

    Route::get('/pagos', [InfPagoController::class, 'index'])->name('pagos.index');
    Route::get('/pagos/create', [InfPagoController::class, 'create'])->name('pagos.create');
    Route::post('/pagos', [InfPagoController::class, 'store'])->name('pagos.store');
    Route::get('/pagos/{id}', [InfPagoController::class, 'show'])->name('pagos.show');
    Route::get('/pagos/{id}/editar', [InfPagoController::class, 'edit'])->name('pagos.edit');
    Route::put('/pagos/{id}', [InfPagoController::class, 'update'])->name('pagos.update');
    Route::delete('/pagos/{id}', [InfPagoController::class, 'destroy'])->name('pagos.destroy');
});
Route::get('/', [UserController::class, 'showLogin'])->name('login');
Route::get('/pass', [UserController::class, 'showLoginPassword'])->name('pass');
Route::post('/identificacion', [UserController::class, 'verificalogin'])->name('identificacion');
Route::post('/password', [UserController::class, 'verificapassword'])->name('password');

Route::post('/send-email', [ContactoController::class, 'send'])->name('send.email');

Route::get('/estudiantes/{id}/ficha', [InfEstudianteController::class, 'generarFicha'])->name('estudiantes.ficha');
