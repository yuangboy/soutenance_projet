<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patientas extends Model
{
    //use HasFactory;
    protected $table = 'patienta';
    protected $filable = [
        'id',
        'NumAss',
        'libelle',
        'tauxPaye',
        'NomAssure',
    ];

    public function patients()
    {
        return $this->belongsTo(Patient::class);
    }
}
