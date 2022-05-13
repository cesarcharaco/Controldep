<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    use HasFactory;

    protected $table='programa';

    protected $fillable=['cod','programa'];

    public function asignatura()
    {
    	return $this->hasMany('App\Models\Asignatura','id_programa','id');
    }
}