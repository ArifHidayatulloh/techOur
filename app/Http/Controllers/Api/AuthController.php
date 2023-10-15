<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'hp' => 'required',
            'password' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'hp' => $request->hp,
            'password' => bcrypt($request->password),
            'role' => 'user',
        ]);

        return response()->json(['message' => 'Pendaftaran berhasil'], 200);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $user->last_login = Carbon::now();
        $user->save();
        $token = $user->createToken('user login')->plainTextToken;

        return response()->json(['token' => $token], 200);
    }

    public function logout(Request $request)
    {
        $user = Auth::user();
        $user->last_logout = Carbon::now();
        $user->save();
        $user->tokens->each(function ($token, $key) {
            $token->delete();
        });

        return response()->json(['message' => 'Logout berhasil'], 200);
    }

    public function me(Request $request)
    {
        return response()->json(['user' => $request->user()]);
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'hp' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->hp = $request->hp;

        if($request->hasFile('image')){
            if($user->image){
                Storage::delete($user->image);
            }

            $imagePath = $request->file('image')->store('user_images','public');
            $user->image = $imagePath;
        }

        $user->save();

        return response()->json(['message' => 'Profile updated successfully']);
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required',
            'new_password_confirm' => 'required',
        ]);

        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json(['message' => 'Current password is incorrect']);
        } elseif ($request->new_password_confirm != $request->new_password) {
            return response()->json(['message' => 'Confirm password does not match']);
        } else {
            $user->update([
                'password' => bcrypt($request->new_password_confirm),
            ]);
            return response()->json(['message' => 'Password updated successfully']);
        }
    }
}
