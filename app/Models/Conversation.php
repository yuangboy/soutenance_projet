<?php

// app/Models/Conversation.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $table = 'conversations';
    protected $fillable = [
        'praticien_id',
        'patient_id',

    ];
    public function praticien()
    {
        return $this->belongsTo(Praticien::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function audioMessages()
    {
        return $this->hasMany(AudioMessage::class);
    }
}
