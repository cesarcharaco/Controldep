<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    use HasFactory;

    protected $table='asignaturas';

    protected $fillable=['codigo','asignatura','id_programa'];


    public function asignacion(){

    	return $this->belongsToMany(Pedidos::class,'asignacion','id_asignatura','id_periodo','id_profesor')->withPivot('horas','subseccion_tecnica','semestre','pensum','seccion','subseccion_practica','subseccion_campo_clinico','jornada');
    }

    public function programa()
    {
    	return $this->belongsTo('App\Models\Programa','id_programa','id');
    }
}
