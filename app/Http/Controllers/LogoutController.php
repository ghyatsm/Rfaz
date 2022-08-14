<?php

namespace App\Http\Controllers;

session_start();

class LogoutController extends Controller
{

    public function index()
    {
        session_destroy();
        return view('v_login');
    }
}
