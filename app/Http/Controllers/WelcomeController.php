<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    
    public function index() {
        return view("welcome")
        ->with("posts", Post::searched()->simplePaginate(8))
        ->with("categories",Category::all())
        ->with("tags",Tag::all())
        ->with("newest",Post::searched()->simplePaginate(6));
    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show(Post $post) {
        return view("single-blog")
        ->with("post",$post)
        ->with("tag",$post->tag)
        ->with("comments",$post->comments()->where("is_active", "=" ,1)->get());
    }

    public function category(Category $category) {
        return view("blog.category")
        ->with("category",$category)
        ->with("posts",$category->posts()->searched()->simplePaginate(8))
        ->with("categories",Category::all())
        ->with("tags", Tag::all())
        ->with("newest",Post::searched()->simplePaginate(6));
    }

    public function tag(Tag $tag) {
        return view("blog.tag")
        ->with("category",$tag)
        ->with("posts",$tag->posts()->searched()->simplePaginate(8))
        ->with("categories",Category::all())
        ->with("tags", Tag::all())
        ->with("newest",Post::searched()->simplePaginate(6));
    }
}
