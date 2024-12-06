<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    // Add the fillable property
    protected $fillable = [
        'title',      
        'genre',          
        'developer',  
        'images',     
        'description', 
    ];
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function tags()
{
    return $this->belongsToMany(Tag::class, 'game_tag');
}
}