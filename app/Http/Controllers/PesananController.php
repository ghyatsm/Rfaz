<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PesananModel;
use App\Models\ProfilModel;
use App\Models\BenangModel;
use App\Models\ProduksiModel;

class PesananController extends Controller
{

    public function __construct()
    {
        $this->PesananModel = new PesananModel();
        $this->ProduksiModel = new ProduksiModel();
    }

    public function index()
    {
        $pesanan1 = PesananModel::with('profilmodel', 'benangmodel')->get(); // langkah sorting
        $pesanan = $pesanan1->sortByDesc('id');
        $pesanan = PesananModel::Paginate(2);                        // langkah sorting

        return view('v_pesanan', compact('pesanan'));
    }

    public function add()
    {
        $pelanggans = ProfilModel::all();
        $benangs = BenangModel::all();
        return view('v_addPesanan', compact('pelanggans', 'benangs'));
    }

    public function insert()
    {
        request()->validate([
            'pelanggan_id' => 'required',
            'benang_id' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'berat_bahan' => 'required|numeric',
            'harga_final' => 'numeric'
        ]);

        $benangs = BenangModel::all()->where('id', request()->benang_id)->first();

        $kode_pesanan = date('d') . substr(strval(time()), -4);
        $data = [
            'kode_pesanan' => $kode_pesanan,
            'benang_id' => request()->benang_id,
            'pelanggan_id' => request()->pelanggan_id,
            'berat_bahan' => request()->berat_bahan,
            'tanggal_mulai' => request()->tanggal_mulai,
            'tanggal_selesai' => request()->tanggal_selesai,
            'harga_awal' => ($benangs->harga_benang * request()->berat_bahan) / 0.6,
            'status' => request()->status,
            'created_at' => now(),
            'updated_at' => now()
        ];
        $this->PesananModel->addData($data);

        /* --- insert new data for tbl_produksi ----- */

        if (request()->status == 'Siap') {
            $data = [
                'kode_pesanan' => $kode_pesanan
            ];

            $this->ProduksiModel->addData($data);
        }

        return redirect()->route('pesanan')->with('pesan', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        if (!$this->PesananModel->detailData($id)) {
            abort(404);
        }

        $data = [
            'pesanan' => $this->PesananModel->detailData($id),
            'pelanggans' => ProfilModel::all(),
            'benangs' => BenangModel::all()
        ];
        return view('v_editPesanan', $data);
    }

    public function update($id)
    {
        request()->validate([
            'pelanggan_id' => 'required',
            'benang_id' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'berat_bahan' => 'required|numeric',
        ]);

        $temp_pesanan = $this->PesananModel->detailData($id);
        $old_status = $temp_pesanan->status;

        $data = [
            'pelanggan_id' => request()->pelanggan_id,
            'benang_id' => request()->benang_id,
            'berat_bahan' => request()->berat_bahan,
            'tanggal_mulai' => request()->tanggal_mulai,
            'tanggal_selesai' => request()->tanggal_selesai,
            'status' => request()->status,
        ];
        $this->PesananModel->updateData($id, $data);

        /* --- insert new data for tbl_produksi ----- */

        if (request()->status == 'Siap' and $old_status == '') {
            $data = [
                'kode_pesanan' => request()->kode_pesanan
            ];

            $this->ProduksiModel->addData($data);
        }

        return redirect()->route('pesanan')->with('pesan', 'Data Berhasil Terupdate');
    }

    public function delete($id)
    {
        $this->PesananModel->deleteData($id);
        return redirect()->route('pesanan')->with('pesan', 'Data Berhasil Terhapus');
    }

    public function search()
    {
        $pesanan = PesananModel::with('profilmodel', 'benangmodel')
            ->where('kode_pesanan', 'like', '%' . request()->kode_pesanan . '%')
            ->where('status', 'like', '%' . request()->status . '%')
            ->paginate(100);

        return view('v_pesanan', compact('pesanan'));
    }
}
