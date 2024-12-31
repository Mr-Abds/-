<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;
    protected $fillable = [
        'title',
        'subtitle',
        'body',
        'user_id',
        'image',
        'likes_num'
    ];

    public function user(){
        return $this->belongsTo(User::class);

    }

    public function likes(){
        return $this->hasMany(Like::class);
        
    } 

    public function comments(){
        return $this->hasMany(comment::class);
        
    }
}
