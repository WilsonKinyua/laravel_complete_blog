<?php

namespace App;

class Tag extends Model
{
    
    public function posts() {

        return $this->hasMany(Post::class);
    }

    public function user(){
        
        return $this->belongsTo(User::class);
    }
}
