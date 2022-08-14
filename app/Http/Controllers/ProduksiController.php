<?php

namespace App\Http\Controllers;

use App\Models\ProduksiModel;
use App\Models\PesananModel;
use App\Models\ProfilModel;
use App\Models\BenangModel;


class ProduksiController extends Controller
{
    public function __construct()
    {
        $this->ProduksiModel = new ProduksiModel();
        $this->PesananModel = new PesananModel();
        $this->ProfilModel = new ProfilModel();
    }

    public function index()
    {
        $produksi = ProduksiModel::with('pesananmodel')->get();
        return view('v_produksi', compact('produksi'));
    }

    public function add()
    {
        return view('v_addProduksi');
    }

    public function delete($id)
    {
        $this->ProduksiModel->deleteData($id);
        return redirect()->route('produksi')->with('pesan', 'Data Berhasil Terhapus');
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
        return redirect()->route('produksi')->with('pesan', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        if (!$this->ProduksiModel->detailData($id)) {
            abort(404);
        }
        $data = [
            'produksi' => $this->ProduksiModel->detailData($id),
        ];
        return view('v_editProduksi', $data);
    }

    public function update($id)
    {
        if (request()->status == "Proses" or request()->status == "Selesai") {


            if (request()->status == "Selesai") {

                $produksi = $this->ProduksiModel::all()->where('id', $id)->first();
                $data = [
                    'harga_final' => request()->harga_benang * request()->jumlah_produk,
                    'status' => request()->status,
                    'updated_at' => now()
                ];
            } else {

                $data = [
                    'status' => request()->status,
                    'updated_at' => now()
                ];
            }

            $this->PesananModel->updateData($id, $data);
            return redirect()->route('produksi')->with('pesan', request()->pesanan_id . 'Data Berhasil Terupdate');
        } else {

            request()->validate([
                'tgl_mulai' => 'required',
                'tgl_masuk_benang' => 'required',
                'jumlah_benang' => 'required'
            ]);

            $data = [
                'tgl_mulai' => request()->tgl_mulai,
                'tgl_masuk_benang' => request()->tgl_masuk_benang,
                'jumlah_benang' => request()->jumlah_benang,
                'tgl_selesai' => request()->tgl_selesai,
                'jumlah_produk' => request()->jumlah_produk,
                'updated_at' => now()
            ];
            $this->ProduksiModel->updateData($id, $data);

            return redirect()->route('produksi')->with('pesan', 'Data Berhasil Terupdate');
        }
    }

    public function search()
    {
        $produksi = ProduksiModel::with('pesananmodel')
            ->where('kode_pesanan', 'like', '%' . request()->kode_pesanan . '%')
            ->get();

        return view('v_produksi', compact('produksi'));
    }
}
