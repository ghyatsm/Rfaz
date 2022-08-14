<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ProfilModel;
use App\Models\BenangModel;


class ProfilController extends Controller
{
    public function __construct()
    {
        $this->ProfilModel = new ProfilModel();
    }

    public function index()
    {
        $dataprofil = [
            'profil' => $this->ProfilModel->allData(),
        ];

        return view('v_profil', $dataprofil);
    }

    public function add()
    {
        return view('v_addProfil');
    }

    public function delete($id)
    {
        $this->ProfilModel->deleteData($id);
        return redirect()->route('profil')->with('pesan', 'Data Berhasil Terhapus');
    }

    public function insert()
    {
        request()->validate([
            'nama_perusahaan' => 'required',
            'nama_kontak' => 'required',
            'no_hp' => 'required',
            'alamat2' => 'required'
        ]);

        $data = [
            'nama_perusahaan' => request()->nama_perusahaan,
            'nama_kontak' => request()->nama_kontak,
            'alamat2' => request()->alamat2,
            'no_hp' => request()->no_hp,
            'created_at' => now(),
            'updated_at' => now()
        ];
        $this->ProfilModel->addData($data);
        return redirect()->route('profil')->with('pesan', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        if (!$this->ProfilModel->detailData($id)) {
            abort(404);
        }
        $data = [
            'profil' => $this->ProfilModel->detailData($id),
        ];
        return view('v_editProfil', $data);
    }

    public function update($id)
    {
        request()->validate([
            'nama_perusahaan' => 'required',
            'nama_kontak' => 'required',
            'no_hp' => 'required',
            'alamat2' => 'required'
        ]);

        $data = [
            'nama_perusahaan' => request()->nama_perusahaan,
            'nama_kontak' => request()->nama_kontak,
            'no_hp' => request()->no_hp,
            'alamat2' => request()->alamat2,
            'updated_at' => now()
        ];
        $this->ProfilModel->updateData($id, $data);

        return redirect()->route('profil')->with('pesan', 'Data Berhasil Terupdate');
    }
}
