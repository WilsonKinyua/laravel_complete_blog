<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends Model
{
    use SoftDeletes;
   
    public function deleteImage() {

       return unlink(public_path() . '/images/' . $this->image);
        
    }
    
    public function user() {

        return $this->belongsTo(User::class);
    }

    public function photo() {

        return $this->belongsTo(Photo::class);
    }

    public function category() {

        return $this->belongsTo(Category::class);
    }

    public function tags() {

        return $this->belongsToMany(Tag::class);
    }

    public function hasTag($tagId) {

        return in_array($tagId,$this->tags->pluck('id')->toArray());
    }

    public function scopeSearched($query) 
    {

        $search = request()->query("search");
        if(!$search) {
            return $query->published();
        }

        return $query->published()->where("title","LIKE","%{$search}%");
    }

    public function scopePublished($query) {

        return $query->where("published_at","<=", now());
    }

    public function comments(){

        return $this->hasMany('App\Comment');
    }

}
