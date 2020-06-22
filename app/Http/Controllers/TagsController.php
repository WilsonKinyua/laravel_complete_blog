<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagsRequest;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TagsController extends Controller
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
                
                $tag = Tag::all();

            } else {

                $tag = Tag::where("user_id", "=" ,Auth::user()->id)->get();
            }
            
            
        }
        
       return view("admin.tags.index")->with("tags" , $tag);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.tags.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagsRequest $request)
    {
       $Tag = Tag::create([
           "name"=> $request->name,
           "user_id"=> Auth::user()->id,
           ]);
       session()->flash("success" , "New Tag was created");
       return redirect( route('tags.index') );
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
    public function edit(Tag $tag)
    {
        return view("admin.tags.create")->with("tag",$tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagsRequest $request, Tag $tag)
    {
        $data = ([
            "name"=>$request->name,
            "user_id"=>auth()->user()->id
        ]);

        $tag->update($data);
        session()->flash("success" , "Tag Updated successfully");
        return redirect( route('tags.index') );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $Tag)
    {
        if($Tag->posts->count() > 0){
            session()->flash("error", "Tag cannot be deleted because it has an active post");
            return redirect( route('tags.index') );
        }

        $Tag->delete();
        session()->flash("success" , "Tag has been deleted successfully");
        return redirect( route('tags.index') );
    }

}
