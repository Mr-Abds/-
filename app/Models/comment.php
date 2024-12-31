<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    /** @use HasFactory<\Database\Factories\CommentFactory> */
    use HasFactory;
    protected $fillable = [
        'body'
    ];
    public function posts(){
        return $this->belongsTo(Post::class);
        
    }
    public function user(){
        return $this->belongsTo(User::class);

    }

}
