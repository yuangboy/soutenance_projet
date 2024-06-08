<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Personne extends Model
{
    use HasFactory, Notifiable;

    protected $table='personnes';
    protected $guarded=[''];

    public function service(){
        return $this->belongsToMany(Services::class);
    }

    public function praticiens(){
        return $this->hasOne(Praticien::class);
    }

    public function patients(){
        return $this->hasOne(Patient::class);
    }
}
