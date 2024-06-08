<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{
    use HasFactory;
    protected $fillable = [
        'praticiens_id',
        'patients_id',
        'titre',
        'description',
        'numero',
    ];

    public function praticien()
    {
        return $this->belongsTo(User::class, 'praticiens_id');
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patients_id');
    }
}
