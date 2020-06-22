<?php

namespace App;

class Photo extends Model
{
    protected $uploads = '/images/';

    public function getFileAttribute($photo){
        return $this->uploads . $photo;
    }
}
