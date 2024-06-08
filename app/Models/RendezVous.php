<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RendezVous extends Model
{
    protected $table='rendezvous';
    protected $guarded=[];

    public function praticiens(){
        return $this->belongsTo(Praticien::class,'praticien_id');
    }

    use HasFactory;
}
