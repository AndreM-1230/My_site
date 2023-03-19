<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function save(Request $request){

        if (Auth::check()){
            return redirect()->intended(route('user.private'));
        }

        $validateField = $request->validate([
            'login'=>'required',
            'password'=>'required',
            'nickname'=>'required',
            'type'=>'required'
        ]);
        $validateField['password'] = Hash::make($validateField['password']);
        $user = User::create($validateField);
        if ($user){
            Auth::login($user);
            return redirect(route('user.private'));
        }

        return redirect(route('user.registration'))->withErrors(
            ['formError' => 'Произошла ошибка']
        );
    }
}
