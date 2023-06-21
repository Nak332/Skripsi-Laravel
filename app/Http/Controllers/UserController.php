<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function updatePassword(Request $request)
{
        # Validation
        $request->validate([
            'password_old' => 'required',
            'password_new' => 'required|confirmed',
        ]);


        #Match The Old Password
        if(!Hash::check($request->password_old, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
            // return redirect('/');
        }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->password_new)
        ]);
        // return redirect('/profil');
        return back()->with("status", "Password changed successfully!");
}

}
