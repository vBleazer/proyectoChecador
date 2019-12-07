<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Check extends Model
{
    protected $fillable = [
        'horaEntrada', 'horaSalida', 'fecha', 'duracion'];
}
