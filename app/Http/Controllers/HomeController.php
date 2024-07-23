<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::user()->usertype == 'admin') {
            return view('admin.dashboard');
        }
        return view('dashboard');
    }
}
