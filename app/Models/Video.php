<?php

// app/Models/Video.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
   protected $table = 'videos';

     protected $fillable = ['title', 'description', 'video_path'];
}

