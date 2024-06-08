<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Suivre extends Model
{
    use HasFactory;
    use Notifiable;
    protected $table = 'suivre';

    protected $primaryKey = 'id'; // ou tout autre nom de clé primaire si différent
    protected $foreignKeyPraticien = 'praticiens_id';
    protected $foreignKeyPatient = 'patients_id';

    // Relation avec la table 'suivre'
    public function suivis()
    {
        return $this->hasMany(Suivre::class);
    }

    // Récupère les patients suivis par le praticien
    public function patients()
    {
        return $this->hasManyThrough(Patient::class, Suivre::class, 'praticien_id', 'id', 'id', 'patient_id');

    }
}
