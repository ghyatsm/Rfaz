<?php

namespace App\Http\Controllers;

use App\Models\BenangModel;


class BenangController extends Controller
{
    public function __construct()
    {
        $this->BenangModel = new BenangModel();
    }

    public function index()
    {
        $data = [
            'benang' => $this->BenangModel->allData(),
        ];
        return view('v_benang', $data);
    }

    public function add()
    {
        return view('v_addBenang');
    }

    public function delete($id)
    {
        $this->BenangModel->deleteData($id);
        return redirect()->route('benang')->with('pesan', 'Data Berhasil Terhapus');
    }

    public function insert()
    {
        request()->validate([
            'nama_benang' => 'required',
            'kode_benang' => 'required',
            'harga_benang' => 'required',
        ], [
            'nama_benang.required' => 'wajib diisi',
            'kode_benang.required' => 'wajib diisi',
            'harga_benang.required' => 'wajib diisi'
        ]);

        $data = [
            'nama_benang' => request()->nama_benang,
            'kode_benang' => request()->kode_benang,
            'harga_benang' => request()->harga_benang,
            'created_at' => now(),
            'updated_at' => now()
        ];
        $this->BenangModel->addData($data);
        return redirect()->route('benang')->with('pesan', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        if (!$this->BenangModel->detailData($id)) {
            abort(404);
        }
        $data = [
            'benang' => $this->BenangModel->detailData($id),
        ];
        return view('v_editBenang', $data);
    }

    public function update($id)
    {
        request()->validate([
            'nama_benang' => 'required',
            'kode_benang' => 'required',
            'harga_benang' => 'required',
        ], [
            'nama_benang.required' => 'wajib diisi',
            'kode_benang.required' => 'wajib diisi',
            'harga_benang.required' => 'wajib diisi'
        ]);

        $data = [
            'nama_benang' => request()->nama_benang,
            'kode_benang' => request()->kode_benang,
            'harga_benang' => request()->harga_benang,
            'updated_at' => now()
        ];
        $this->BenangModel->updateData($id, $data);

        return redirect()->route('benang')->with('pesan', 'Data Berhasil Terupdate');
    }
}
