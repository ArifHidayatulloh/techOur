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
        $history = History::all()->where('user_id',Auth::user()->id);
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
            'hp' => 'required',
        ]);

        // Setelah itu, periksa apakah ada file gambar yang diunggah
        if ($request->hasFile('image')) {
            // Hapus gambar yang lama jika ada
            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }
        
            // Unggah gambar yang baru
            $imagePath = $request->file('image')->store('user_images', 'public');
            $user->image = $imagePath;
        }
        
        // Set atribut lainnya
        $user->name = $request->name;
        $user->email = $request->email;
        $user->hp = $request->hp;
        
        // Simpan perubahan
        $user->save();
        
        return redirect()->back()->with('successProfile', 'Profile updated successfully');
        
    }

    public function editImage($id){
        $user = User::find($id);

        $user->where('id',$id)->update(array('image' => null));
        
        return redirect()->back();
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
