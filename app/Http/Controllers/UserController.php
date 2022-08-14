<?php

namespace App\Http\Controllers;

if (!isset($_SESSION["username"])) {
    session_start();
}

use App\Models\UserModel;


class UserController extends Controller
{
    public function __construct()
    {
        $this->UserModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'users' => $this->UserModel->allData(),
        ];
        return view('v_user', $data);
    }

    public function add()
    {
        return view('v_addUser');
    }

    public function delete($id)
    {
        $this->UserModel->deleteData($id);
        return redirect()->route('user')->with('pesan', 'Data Berhasil Terhapus');
    }

    public function insert()
    {
        request()->validate([
            'username' => 'required',
            'realname' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);

        $data = [
            'username' => request()->username,
            'realname' => request()->realname,
            'password' => md5(request()->password),
            'role' => request()->role,
            'created_at' => now(),
            'updated_at' => now()
        ];

        $this->UserModel->addData($data);
        return redirect()->route('user')->with('pesan', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        if (!$this->UserModel->detailData($id)) {
            abort(404);
        }
        $data = [
            'user' => $this->UserModel->detailData($id),
        ];
        return view('v_editUser', $data);
    }

    public function editpassword($id)
    {
        $data = [
            'user' => $this->UserModel->detailData($id),
        ];
        return view('v_editUserUbahPassword', $data);
    }

    public function update($id)
    {
        request()->validate([
            'username' => 'required',
            'realname' => 'required',
            'role' => 'required'
        ]);

        $data = [
            'username' => request()->username,
            'realname' => request()->realname,
            'role' => request()->role,
            'updated_at' => now()
        ];
        $this->UserModel->updateData($id, $data);
        return redirect()->route('user')->with('pesan', 'Data Berhasil Terupdate');
    }

    public function updatepassword($id)
    {
        $data = [
            'password' => md5(request()->password),
            'updated_at' => now()
        ];
        $this->UserModel->updateData($id, $data);

        if ($_SESSION["role"] == 'admin') {
            return redirect()->route('user')->with('pesan', 'Data Berhasil Terupdate');
        } else {
            return redirect()->route('home')->with('pesan', 'Data Berhasil Terupdate');
        }
    }
}
