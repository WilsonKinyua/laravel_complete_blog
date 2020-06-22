<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTodoRequest;
use App\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodosController extends Controller
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

                $todo = Todo::all();
                
            } else {

                $todo = Todo::where("user_id","=",Auth::user()->id)->get();
            }
        }

        return view("admin.todos.index")->with("todos",$todo);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.todos.index");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTodoRequest $request)
    {
        $data = ([
            "user_id"=>auth()->user()->id,
            "title"=>$request->title,
            "content"=>$request->content,
            "completed"=>0
        ]);

        Todo::create($data);
        session()->flash("success","Todo Created Successfully");
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
        //
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
    public function update(Request $request, Todo $todo)
    {
       $todo->update(["completed"=>1]);
       session()->flash("success","Todo Completed Successfully");
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();
        session()->flash("success","Todo Completed Successfully");
        return redirect()->back();
    }
}
