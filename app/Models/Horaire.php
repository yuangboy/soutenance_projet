<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horaire extends Model
{
    use HasFactory;

    protected $fillable = ['praticien_id', 'start_time', 'end_time', 'is_available'];

    public function praticien()
    {
        return $this->belongsTo(Praticien::class);
    }
}
