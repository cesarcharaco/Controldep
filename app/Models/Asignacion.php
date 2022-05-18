<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Profesores;
use App\Models\Asignatura;
use App\Models\Periodo;
class Asignacion extends Model
{
    use HasFactory;

    protected $table='asignacion';

    protected $fillable=['id_profesor','id_asignatura','id_periodo','horas','subseccion_tecnica','subseccion_practica','semestre','pensum','seccion','subseccion_campo_clinico','jornada'];

    public function pde()
    {
    	return $this->hasMany('App\Models\PDE','id_asignacion','id');
    }

    public function profesor(){

        return $this->belongsToMany(Profesores::class,'asignacion','id_asignatura','id_periodo','id_profesor')->withPivot('horas','subseccion_tecnica','semestre','pensum','seccion','subseccion_practica','subseccion_campo_clinico','jornada');
    }

    public function asignatura(){

        return $this->belongsToMany(Asignatura::class,'asignacion','id_asignatura','id_periodo','id_profesor')->withPivot('horas','subseccion_tecnica','semestre','pensum','seccion','subseccion_practica','subseccion_campo_clinico','jornada');
    }

    public function periodo(){

        return $this->belongsToMany(Periodo::class,'asignacion','id_asignatura','id_periodo','id_profesor')->withPivot('horas','subseccion_tecnica','semestre','pensum','seccion','subseccion_practica','subseccion_campo_clinico','jornada');
    }



}
