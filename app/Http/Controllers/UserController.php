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
            'role' => 'required',
            // 'limit' => 'required'
            // 'image' => 'required|image|mimes:jpg,png,jpeg'
        ]);
        

        $existingUser = User::where('email', $request->email)->first();

        if ($existingUser) {
            return back()->with('errors', 'Email sudah terdaftar');
        }

        // $imagePath = $request->file('image')->store('user_images','public');

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'hp' => $request->hp,
            'password' => bcrypt($request->password),
            'role' => $request->role,
            // 'limit' => $request->limit,
            // 'image' => $imagePath
        ]);

        return redirect()->route('users.index')->with('success','Added Account Successfully');

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
            'role' => 'required',
            'limit' => 'required'
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->hp = $request->hp;
        $user->role = $request->role;
        $user->limit = $request->limit;

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
