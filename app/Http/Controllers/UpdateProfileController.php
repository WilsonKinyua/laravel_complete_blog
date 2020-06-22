<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Photo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UpdateProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.users.update-password")->with("user",auth()->user());
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
    public function store(Request $request)
    {
        //
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
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $data = ([
            "name" => $request->name,
            "email" => $user->email,
            "about" => $request->about,
            // "password" => Hash::make($request->password),
        ]);

        if ($file = $request->file("photo_id")) {

            $name = time() . $file->getClientOriginalName();
            $file->move("images", $name);
            $photo = Photo::create(["file" => $name]);
            $data['photo_id'] = $photo->id;
        }

        // return dd($data);

        $user->update($data);
        session()->flash("success", "User Updated successfully");
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function updatePassword(UpdateProfileRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $data = ([
            "password" => Hash::make($request->password),
        ]);
        $user->update($data);
        session()->flash("success", "Password Updated successfully");
        return redirect()->back();
    }
}
