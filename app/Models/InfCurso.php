<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InfCurso extends Model
{
    protected $table = 'cursos';
    protected $primaryKey = 'curso_id';
    public $timestamps = false;
    protected $fillable = [
        'grado_id',
        'seccion_id',
        'ano_lectivo_id',
        'aula_id',
        'profesor_principal_id',
        'cupo_maximo',
        'estado',
    ];

    public function grado()
    {
        return $this->hasOne('App\Models\InfGrado', 'grado_id', 'grado_id');
    }

    public function seccion()
    {
        return $this->hasOne('App\Models\InfSeccion', 'seccion_id', 'seccion_id');
    }

    public function anoLectivo()
    {
        return $this->hasOne('App\Models\InfAnioLectivo', 'ano_lectivo_id', 'ano_lectivo_id');
    }

    public function aula()
    {
        return $this->hasOne('App\Models\InfAula', 'aula_id', 'aula_id');
    }

    public function profesor()
    {
        return $this->hasOne('App\Models\InfDocente', 'profesor_id', 'profesor_principal_id');
    }
    
    public static function getEstadosPermitidos()
    {
        return ['En Planificación', 'Disponible', 'Completo', 'En Curso', 'Finalizado'];
    }
}