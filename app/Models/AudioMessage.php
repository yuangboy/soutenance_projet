<?php

// app/Models/AudioMessage.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class AudioMessage extends Model
{
    use HasFactory;
    //+protected $table = 'praticiens';
    public $table = 'audiomessages';
    protected $fillable = [
        'conversation_id',
        'audio_path',
        'sender_id',
        'sender_type'
    ];

    public function conversation()
    {
        return $this->belongsTo(Conversation::class);
    }

    public function sender()
    {
        return $this->morphTo();
    }

    public function getAudioUrlAttribute()
    {
        return Storage::url($this->audio_path);
    }
}
