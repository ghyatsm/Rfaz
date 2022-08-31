<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MesinModel;


class MesinController extends Controller
{
    public function __construct()
    {
        $this->MesinModel = new MesinModel();
    }

    public function index()
    {
        $data = [
            'mesin' => $this->MesinModel->allData(),
        ];

        // return dd($data);

        return view('v_mesin', $data);
    }

    public function add()
    {
        return view('v_addMesin');
    }

    public function delete($id)
    {
        $this->MesinModel->deleteData($id);
        return redirect()->route('mesin')->with('pesan', 'Data Berhasil Terhapus');
    }

    public function insert()
    {
        request()->validate([
            'kode_mesin' => 'required',
            'merek_mesin' => 'required',
            'kecepatan' => 'required',
            'status' => 'required'
        ]);

        $data = [
            'kode_mesin' => request()->kode_mesin,
            'merek_mesin' => request()->merek_mesin,
            'kecepatan' => request()->kecepatan,
            'status' => request()->status,
            'created_at' => now(),
            'updated_at' => now()
        ];
        $this->MesinModel->addData($data);
        return redirect()->route('mesin')->with('pesan', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        if (!$this->MesinModel->detailData($id)) {
            abort(404);
        }
        $data = [
            'mesin' => $this->MesinModel->detailData($id),
        ];
        return view('v_editMesin', $data);
    }

    public function update($id)
    {
        request()->validate([
            'kode_mesin' => 'required',
            'merek_mesin' => 'required',
            'kecepatan' => 'required',
            'status' => 'required'
        ]);

        $data = [
            'kode_mesin' => request()->kode_mesin,
            'merek_mesin' => request()->merek_mesin,
            'kecepatan' => request()->kecepatan,
            'status' => request()->status,
            'updated_at' => now()
        ];
        $this->MesinModel->updateData($id, $data);

        return redirect()->route('mesin')->with('pesan', 'Data Berhasil Terupdate');
    }
}
