<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'login'
        ];

        return view('auth.login', $data);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        $infoLogin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($infoLogin)) {
            if (Auth::user()->role == 'admin') {
                return redirect('dashboard')->with('success','Login Sukses alhamdulillah hirabbil alamin');
            } elseif (Auth::user()->role == 'user') {
                return redirect('dashboard')->with('success','Login Sukses alhamdulillah hirabbil alamin');
            }
        } else {
            return back()->with('error','Username & Password not match')->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function register()
    {
        return view('auth.register', [
            'title' => 'Register'
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'email|unique:users,email',
            'password' => 'required|min:6',
            'password-confirm' => 'required|same:password'
        ]);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user'
        ]);
        $user->save();

        return redirect('/')->with('success', 'Congrats For Ur New Account!');
    }
}
