<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Asignacion;
class Periodo extends Model
{
    use HasFactory;

    protected $table='periodos';

    protected $fillable=['periodo', 'status'];

    public function asignacion(){

    	return $this->belongsToMany(Asignacion::class,'asignacion','id_periodo','id_asignatura','id_profesor')->withPivot('horas','subseccion_tecnica','semestre','pensum','seccion','subseccion_practica','subseccion_campo_clinico','jornada');
    }
}
