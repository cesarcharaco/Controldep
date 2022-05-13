<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    use HasFactory;

    protected $table='periodos';

    protected $fillable=['periodo', 'status'];

    public function asignacion(){

    	return $this->belongsToMany(Pedidos::class,'asignacion','id_periodo','id_asignatura','id_profesor')->withPivot('horas','subseccion_tecnica','subseccion_practica','subseccion_campo_clinico','jornada');
    }
}
