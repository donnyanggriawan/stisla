<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // public function index()
    // {
    //     echo "admin index <br>";
    //     echo Auth::user()->name;
    //     echo "<br><a href='/logout'>Logout >></a>";
    // }

    public function admin()
    {
        echo "selamat datang di halaman admin <br>";
        echo Auth::user()->name;
        echo "<br><a href='/logout'>Logout >></a>";
    }

    public function user()
    {
        echo "selamat datang di halaman user <br>";
        echo Auth::user()->name;
        echo "<br><a href='/logout'>Logout >></a>";
    }

    public function index()
    {
        return view('dashboard.index', [
            'title' => 'Dashboard'
        ]);
    }
}
