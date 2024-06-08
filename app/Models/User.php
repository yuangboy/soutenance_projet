<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    //use HasRoles;
    //use HasFactory, HasRoles;
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    //use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected $table = 'users';
    protected $filable=[
        'id',
        'name',
        'email',
        'role',
        'status',
    ];

    public function isAdmin()
    {
        return $this->admin;
    }
    public function patient()
    {
        return $this->hasOne(Patient::class,'user_id');
    }
    // Dans le modèle User
    public function praticien() {
        return $this->hasOne(Praticien::class); // ou belongsTo selon votre schéma de relations
    }
     public function suivis()
    {
        return $this->hasMany(Suivre::class, 'praticiens_id');
    }

    // Récupère les patients suivis par le praticien
    public function patients()
    {
        return $this->hasManyThrough(Patient::class, Suivre::class, 'praticiens_id', 'id', 'id', 'patients_id');
    }

    public function examens()
    {
        return $this->hasMany(Examen::class, 'praticien_id');
    }

}
