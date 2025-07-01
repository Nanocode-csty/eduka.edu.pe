<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    use HasFactory;

    protected $table = 'matriculas';
    protected $primaryKey = 'matricula_id';
    public $timestamps = false;

    protected $fillable = [
        'estudiante_id',
        'curso_id',
        'fecha_matricula',
        'estado',
        'numero_matricula',
        'observaciones',
        'usuario_registro'
    ];

    protected $dates = [
        'fecha_matricula'
    ];

    // Relación con estudiante
    public function estudiante()
    {
        return $this->belongsTo(InfEstudiante::class, 'estudiante_id', 'estudiante_id');
    }

    // Relación con curso (si tienes modelo de curso)
    public function curso()
    {
        return $this->belongsTo(InfAsignatura::class, 'curso_id', 'curso_id');
    }
}