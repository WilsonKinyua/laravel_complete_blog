<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\EditPostRequest;
use App\Photo;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
           
            if (Auth::user()->isAdmin()) {
                
                $posts = Post::all();

            } else {

                $posts = Post::where("user_id", "=" ,Auth::user()->id)->get();
            }
            
            
        }

        return view("admin.posts.index",compact("posts"));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.posts.create")->with("categories", Category::all())->with("tags",Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        $data = ([
            "user_id"             =>auth()->user()->id,
            "category_id"         =>$request->category_id,
            "tag_id"              =>$request->tag_id,
            'title'               =>$request->title,
            "short_description"   =>$request->description,
            "content"             =>$request->content,
            "published_at"        =>$request->published_at,
            "slug"                =>Str::slug($request->title , "-"),
        ]);

        if($file = $request->file("photo_id")) {

            $name = time() . $file->getClientOriginalName();
            $file->move("images", $name);
            $photo = Photo::create(["file"=>$name]);
            $data['photo_id'] = $photo->id;
        }

        $post = Post::create($data);
        session()->flash("success" , "Post created successfully");
        return redirect( route("posts.index") );
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view("admin.posts.create")->with("categories", Category::all())->with("tags",Tag::all())->with("post",$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditPostRequest $request, Post $post)
    {

        $data = ([
            "user_id"             =>auth()->user()->id,
            "category_id"         =>$request->category_id,
            "tag_id"              =>$request->tag_id,
            'title'               =>$request->title,
            "short_description"   =>$request->description,
            "content"             =>$request->content,
            "published_at"        =>$request->published_at,
            "slug"                =>Str::slug($request->title , "-"),
        ]);

        if($file = $request->file("photo_id")) {
            $name = time() . $file->getClientOriginalName();
            $file->move("images", $name);

            if($post->photo->file){

                unlink(public_path() . $post->photo->file);
            }

            $photo = Photo::create(["file"=>$name]);

            $data['photo_id'] = $photo->id;
        }

        $post->update($data);
        session()->flash("success" , "Post Updated successfully");
        return redirect( route("posts.index") );


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();
           if($post->trashed()) {
            // unlink(public_path() . $post->photo->file);
            if($post->comments->count() > 0) {

                session()->flash("error" , "Post can't be deleted because it contains comments.Sorry!!!!");
                return redirect()->back();

            } else {
                $post->forceDelete();
            }
           } else {
            $post->delete();
           }
           session()->flash("success" , "Post deleted successfully");
           return redirect( route("posts.index") );
    }



        public function trashed() {
            if (Auth::check()){

                if (Auth::user()->isAdmin()){

                    $trashed = Post::onlyTrashed()->get();

                    } else {

                        $trashed = Post::onlyTrashed()->where("user_id", "=" ,Auth::user()->id)->get();
                    }
            }
            
            return view("admin.posts.trashed")->withPosts($trashed);

        }

        public function restore($id) {
            $post = Post::withTrashed()->where('id', $id)->firstOrFail();
            $post->restore();
            session()->flash("success" , "Post restored successfully");
            return redirect( route("posts.index") );
        }



}
