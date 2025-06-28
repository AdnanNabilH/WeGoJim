<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    // Tambahkan ini:
    protected $fillable = ['title', 'youtube_url', 'instructor', 'category'];

}
