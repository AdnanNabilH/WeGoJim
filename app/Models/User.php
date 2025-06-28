<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_photo',
        'joined_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'joined_at' => 'datetime',
        'password' => 'hashed',
    ];

public function wishlist()
{
    return $this->belongsToMany(Course::class, 'wishlists', 'user_id', 'course_id')->withTimestamps();
}

public function myLearning()
{
    return $this->belongsToMany(Course::class, 'my_learning'); // atau nama tabel pivot kamu
}


    
}
