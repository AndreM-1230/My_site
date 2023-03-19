<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function setting()
    {
        return view('accounts.setting');
    }

    public function update(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $user = Auth::user();

        if (Hash::check($request->current_password, $user->password)) {
            $user->update([
                'password' => Hash::make($request->password)
            ]);

            Auth::logout();

            return redirect()->route('user.login')->with('success', 'Password changed successfully. Please login with your new password.');
        } else {
            return back()->withErrors(['current_password' => 'Please enter your correct current password.']);
        }
    }

}
