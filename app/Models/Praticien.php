<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Suivre;
class Praticien extends Model
{
    use HasFactory;

    protected $table = 'praticiens';
    protected $fillable = [
        'image',
        'prenom',
        'dateNaiss',
        'genre',
        'tel',
        'profession',
        'adresse',
        'mattricule',
        'specialite',
        'user_id',
        'service_id',
    ];

   /* public function conversations()
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
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
    public function getNomAttribute()
    {
        return $this->user->nom;
    }
    /*public function patients() {
        return $this->belongsToMany(Patient::class, 'suivre', 'praticiens_id', 'patients_id');
    }*/
     public function patients()
    {
        return $this->belongsToMany(Patient::class, 'suivre', 'praticiens_id', 'patients_id')->withTimestamps();
    }

    public function rendezvousses()
    {
        return $this->hasMany(Rendezvouss::class);
    }


    public function rendezvous()
    {
        return $this->hasMany(Rendezvous::class, 'praticien_id');
    }

    public function horaires()
    {
        return $this->hasMany(Horaire::class, 'praticien_id');
    }
}
