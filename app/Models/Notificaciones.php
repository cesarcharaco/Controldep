<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notificaciones extends Model
{
    use HasFactory;

    protected $table='notificaciones';

    protected $fillable=['id_pde','mmismo_dia','diez_dias','catorce_dias'];

    public function pde()
    {
    	return $this->belongsTo('App\Models\PDE','id_pde','id');
    }
}
