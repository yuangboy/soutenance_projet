<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rendezvouss extends Model
{
    use HasFactory;

    protected $table = 'rendezvousses'; // Nom de la table

    protected $fillable = ['patient_id', 'praticien_id', 'appointment_time', 'status'];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    public function praticien()
    {
        return $this->belongsTo(Praticien::class, 'praticien_id');
    }
}
