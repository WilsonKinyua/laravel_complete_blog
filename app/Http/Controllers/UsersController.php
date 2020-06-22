<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Photo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.users.index")->with("users", User::all());
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view("admin.users.edit")->with("user", $user);
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
            "password" => Hash::make($request->password),
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
        $user = User::withTrashed()->where('id', $id)->firstOrFail();

        if ($user->trashed()) {
            unlink(public_path() . $user->photo->file);
            $user->forceDelete();
        } else {

            $user->delete();
        }

        session()->flash("success", "User deleted successfully");
        return redirect(route("users.index"));
    }

    public function makeAdmin(User $user)
    {
        $user->role_id = 1;
        $user->save();
        session()->flash("success", "User made Admin successfully");
        return redirect()->back();
    }


    public function editProfile()
    {
        return view("admin.users.update-profile")->with("user", auth()->user());
    }

    public function destroyAccount()
    {
        $user = auth()->user();
        $user->delete();
        session()->flash("error", "Account has been deleted successfully");
        return redirect('/');
    }

    public function trashedAccounts()
    {
        $trashed = User::onlyTrashed()->get();
        return view("admin.users.index")->withUsers($trashed);
    }
}
