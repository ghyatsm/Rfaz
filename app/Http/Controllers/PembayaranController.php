<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PembayaranModel;
use App\Models\PesananModel;

class PembayaranController extends Controller
{

    public function __construct()
    {
        $this->PesananModel = new PesananModel();
    }

    public function index()
    {
        $pesanan = PesananModel::with('profilmodel', 'benangmodel')->get();
        return view('v_pembayaran', compact('pesanan'));
    }

    public function search()
    {
        $pesanan = PesananModel::with('profilmodel', 'benangmodel')
            ->where('kode_pesanan', 'like', '%' . request()->kode_pesanan . '%')
            ->where('status', 'like', '%' . request()->status . '%')
            ->get();

        return view('v_pembayaran', compact('pesanan'));
    }

    public function update($id)
    {
        $data = [
            'status' => request()->isLunas
        ];
        $this->PesananModel->updateData($id, $data);

        return redirect()->route('pembayaran')->with('pesan', 'Data Berhasil Terupdate');
    }
}
