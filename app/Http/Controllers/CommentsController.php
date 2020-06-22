<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CreateCommentRequest;
use App\Post;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.comments.index")->with("comments",Comment::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCommentRequest $request)
    {
        
        $data = ([
            "post_id"=>$request->post_id,
            "user_id"=>auth()->user()->id,
            "author"=>auth()->user()->name,
            "email"=>auth()->user()->email,
            "body"=>$request->body,
            "is_active"=>0
        ]);

        if(auth()->user()->photo) {

            $data['photo'] = auth()->user()->photo->file;

        } else {

            $data['photo'] = "/images/avatar1.jpg";
        }

        $comment = Comment::create($data);
        session()->flash("success" , "Comment Submitted successfully and awaiting approval by the author of the post. Thank you!!!");
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $comments = $post->comments;
        return view('admin.comments.show', compact('comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $comment = Comment::findOrFail($id);
        $comment->update($request->all());
        return redirect()->back()->with("success" , "Comment Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return redirect()->back()->with("success" , "Comment has deleted Successfully");
    }
}
