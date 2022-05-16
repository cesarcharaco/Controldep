<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PDE extends Model
{
    use HasFactory;

    protected $table='pde';

    protected $fillable=['id_asignacion','ponderacion_eval','nota_eval','instrumento_eval'];

    public function asignacion()
    {
    	return $this->belongsTo('App\Models\Asignacion','id_asignacion','id');
    }
}
