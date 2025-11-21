<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    
    public function index()
    {
        if (session('user_id')) {
            return redirect()->route('home');
        }

        return view('auth.login');
    }


    public function authenticate(Request $request){
    $request->validate([
        'username' => 'required',
        'password' => 'required',
    ]);

    $user = User::where('username', $request->username)->first();

    if(!$user || !Hash::check($request->password, $user->password)){
        return back()->withErrors([
            'username' => 'Username atau password salah'
        ])->withInput();
    }

    session([
        'user_id' => $user->id,
        'user_name' => $user->name,
        'user_role' => $user->role,
        'level' => $user->level,
        'password_confirmation' => $user->password_confirmation,
    ]);

    $request->session()->regenerate();

    return redirect()->route('home')->with('success', 'Login berhasil!');
}

    
   public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login');
}

public function register()
{
    if (session('user_id')) {
        return redirect()->route('home');
    }
    return view('auth.register');
}

public function storeRegister(Request $request)
{
    $request->validate([
        'nama' => 'required',
        'username' => 'required|unique:users',
        'password' => 'required|confirmed',
        'kelamin' => 'required',
        'alamat' => 'required',
        'level' => 'required',
    ]);

    User::create([
        'nama' => $request->nama,
        'username' => $request->username,
        'password' => bcrypt($request->password),
        'kelamin' => $request->kelamin,
        'alamat' => $request->alamat,
        'level' => $request->level,
    ]);

    return redirect()->route('login')->with('success', 'Registrasi berhasil');
}
}
