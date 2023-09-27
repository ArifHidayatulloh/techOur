<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Tournament;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function profile()
    {
        $history = History::all();
        $totalLimit = History::where(['user_id' => Auth::user()->id, 'status' => 'success'])->sum('limit');

        $totalDataCount = Tournament::all()->where('user_id', Auth::user()->id)->count();
        return view('profile',['limit' => $totalLimit, 'data' => $totalDataCount, 'history' => $history]);
    }

    public function editProfile(Request $request, $id)
    {
        $user = User::find($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            // 'image' => 'required|image|mimes:jpg,png,jpeg',
        ]);

        if ($user->image == null) {
            $user->name = $request->name;
            $user->email = $request->email;
            if ($request->hasFile('image') != null) {
                $imagePath = $request->file('image')->store('user_images', 'public');
                $user->image = $imagePath;
            }
            $user->save();
        } elseif ($request->hasFile('image') != null) {
            Storage::disk('public')->delete($user->image);
            $imagePath = $request->file('image')->store('user_images', 'public');
            $user->name = $request->name;
            $user->email = $request->email;
            $user->image = $imagePath;
            $user->save();
        } else {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
        }


        return redirect()->back()->with('successProfile', 'Berhasil mengubah profile');
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required',
            'new_password_confirm' => 'required',
        ]);

        $user = User::find($id);

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('error', 'Current password is incorrect');
        } elseif ($request->new_password_confirm != $request->new_password) {
            return redirect()->back()->with('notMatch', 'Confirm password does not match');
        } else {
            $user->password = bcrypt($request->new_password);
            $user->save();
            return redirect()->back()->with('success', 'Password updated successfully');
        }
    }
}
