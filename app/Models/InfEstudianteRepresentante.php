<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfEstudianteRepresentante extends Model
{
    use HasFactory;
    protected $table = 'estudianterepresentante';
    protected $primaryKey = 'estudiante_id';
    public $timestamps=false;
    protected $fillable=['representante_id','es_principal'];
}
