<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function login(Request $request){
        if (Auth::check()){
            return redirect()->intended(route('user.private'));
        }

        $formField = $request->only(['login', 'password']);

        if (Auth::attempt($formField)){
            return redirect()->intended(route('user.private'));
        }

        return redirect(route('user.login'))->withErrors([
            'login' => 'Не удалось авторизоваться'
        ]);
    }
}
