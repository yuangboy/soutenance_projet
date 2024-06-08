<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emplt extends Model
{

    use HasFactory;
    protected $table = 'emplt';
    protected $fillable = [
        'praticiens_id',
        'annee',
        'jours',
        'heured',
        'heuref',
    ];

     public function praticien()
    {
        return $this->belongsTo(Praticien::class);
    }

}
