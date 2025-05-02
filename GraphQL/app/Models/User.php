<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;  
use Illuminate\Database\Eloquent\Relations\HasMany; 

class User extends Model
{
    protected $fillable = ['name', 'email']; 
    

    // Un usuario tiene muchos posts
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
