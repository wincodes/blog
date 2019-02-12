<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class logoutController extends Controller
{
    public function index()
    {
       
        if (Auth::check()) {
           auth()->logout();
        }
        
        return redirect('/');
    }
}
