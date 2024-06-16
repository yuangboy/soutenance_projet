<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AudioMessage extends Model
{
    use HasFactory;

    protected $fillable = ['rendezvousses_id', 'sender_id', 'file_path'];

    public function rendezvous()
    {
        return $this->belongsTo(Rendezvous::class);
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
}

