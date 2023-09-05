<?php

namespace App\Http\Controllers;

use App\Models\User;
// use Illuminate\Support\Facedes\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('admin.user.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'hp' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'hp' => $request->hp,
            'password' => bcrypt($request->password),
            'role' => $request->role

        ]);

        return redirect()->route('users.index')->with('Success','Added Account Successfully');

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
    public function edit(User  $user)
    {
        return view('update', [
           'user' => $user,
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'hp' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->hp = $request->hp;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;

        $user->save();

        return redirect()->route('users.index')->with('success','Updated Account Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success','Deleted user success');
    }
}
