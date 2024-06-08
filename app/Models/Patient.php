<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Patient extends Model
{
    use HasFactory;
    protected $table = 'patients';
    protected $fillable = [
     'id',
    'user_id',
    'image',
    'prenom',
    'dateNaiss',
    'genre',
    'tel',
    'profession',
    'adresse',
    'matricule',
    'nationalite',
    'ville',
    'lieuNaiss',
    'sitmatrimoniale'
    ];

    protected $guarded=[''];
    /*public function conversations()
    {
        return $this->hasMany(Conversation::class);
    }*/

    public function conversations()
    {
        return $this->hasMany(Conversation::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /*public function praticiens()
    {
        return $this->belongsToMany(Praticien::class, 'suivre', 'patient_id', 'praticien_id')->withTimestamps();
    }*/
    public function praticiens()
    {
        //return $this->belongsToMany(Praticien::class, 'suivre', 'patients_id', 'praticiens_id', 'praticien_patient');
        return $this->belongsToMany(Praticien::class, 'suivre', 'patients_id', 'praticiens_id');
    }

    public function praticien()
    {
        return $this->belongsTo(User::class, 'patients_id');
    }
    public function getNomAttribute()
    {
        return $this->user->nom;
    }
    /*public function patienta()
    {
        return $this->hasMany(patienta::class);
    }*/

    /*public function praticiens() {
        return $this->belongsToMany(Praticien::class, 'suivre', 'patients_id', 'praticiens_id');
    }*/
    public function rendezvous()
    {
        return $this->hasMany(Rendezvous::class, 'patient_id');
    }
    public function examens()
    {
        return $this->hasMany(Examen::class,'patients_id');
    }

}
