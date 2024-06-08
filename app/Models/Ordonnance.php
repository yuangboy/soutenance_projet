<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordonnance extends Model
{
    use HasFactory;

    protected $fillable = ['praticien_id', 'patient_id', 'medicaments', 'instructions'];

    public function praticien()
    {
        return $this->belongsTo(Praticien::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
