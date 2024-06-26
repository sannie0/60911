<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Laravel\Prompts\password;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate(['email' =>['required', 'email'], 'password'=>['required']]);
        if (Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/item')->withErrors(['success'=>'Вы успешно вошли в систему']);
        }
        return back()->withErrors(['error'=>'Данные не зарегистрированы'])->onlyInput('email', 'password');
    }
    public function login(Request $request)
    {
        return view('login', ['user'=>Auth::user()]);
    }


    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/item')->withErrors(['success'=>'Вы успешно вышли из системы']);
    }
}
