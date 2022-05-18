<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignacion extends Model
{
    use HasFactory;

    protected $table='asignacion';

    protected $fillable=['id_profesor','id_asignatura','id_periodo','horas','subseccion_tecnica','subseccion_practica','semestre','pensum','seccion','subseccion_campo_clinico','jornada'];

    public function pde()
    {
    	return $this->hasMany('App\Models\PDE','id_asignacion','id');
    }

    public function profesor()
    {
    	return $this->belongsTo('App\Models\Profesores','id_profesor','id');
    }

    public function asignatura()
    {
        return $this->belongsTo('App\Models\Asignaturas','id_asignatura','id');   
    }

    public function periodo()
    {
        return $this->belongsTo('App\Models\Periodo','id_periodo','id');
    }
}
