<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Asignacion;
class Profesores extends Model
{
    use HasFactory;

    protected $table='profesores';

    protected $fillable=['profesor','rut','dv','telefono','correo','id_usuario'];

    public function usuario()
    {
    	return $this->belongsTo('App\Models\User','id_usuario','id');
    }

    public function asignacion(){

    	return $this->belongsToMany(Asignacion::class,'asignacion','id_profesor','id_asignatura','id_periodo')->withPivot('horas','subseccion_tecnica','semestre','pensum','seccion','subseccion_practica','subseccion_campo_clinico','jornada');
    }

    public function asignacion()
    {
        return $this->hasMany('App\Models\Asignacion','id_asignacion','id');
    }
}
