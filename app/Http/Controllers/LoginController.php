<?php

namespace App\Http\Controllers;

if (isset($_SESSION["username"])) {
    session_destroy();
} else {
    session_start();
}

use App\Models\UserModel;


class LoginController extends Controller
{
    public function __construct()
    {
        $this->UserModel = new UserModel();
    }

    public function index()
    {
        return view('v_login');
    }

    public function cek()
    {
        /* ===== PENTING BANGET ... HARUS DINGET ====== */

        $user = $this->UserModel
            ->where('username', 'like', request()->username)
            ->where('password', 'like', md5(request()->password))->get();

        if (count($user) > 0) {

            $_SESSION['userid'] = $user[0]->id;
            $_SESSION['username'] = $user[0]->username;
            $_SESSION['realname'] = $user[0]->realname;
            $_SESSION['role'] = $user[0]->role;

            return redirect()->route('home');
        } else {
            return redirect()->route('login');
        }
    }
}
