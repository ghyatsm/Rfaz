<?php

namespace App\Http\Controllers;

use App\Models\DetailbayarModel;
use App\Models\ProfilModel;
use App\Models\BenangModel;
use App\Models\PesananModel;

class DetailbayarController extends Controller
{
    public function __construct()
    {
        $this->DetailbayarModel = new DetailbayarModel();
    }

    public function pesananmodel()
    {
        return $this->belongsTo(PesananModel::class, 'pesanan_id');
    }

    public function index($pesanan_id)
    {
        $this->PesananModel = new PesananModel();
        $this->ProfilModel = new ProfilModel();
        $this->BenangModel = new BenangModel();

        $pesanan = $this->PesananModel->detailData($pesanan_id);
        $pelanggan_id = $pesanan->pelanggan_id;
        $benang_id = $pesanan->benang_id;

        $data = [
            'detailbayar' => $this->DetailbayarModel->allData($pesanan_id),
            'pesanan' => $this->PesananModel->detailData($pesanan_id),
            'pelanggan' => $this->ProfilModel->detailData($pelanggan_id),
            'benang' => $this->BenangModel->detailData($benang_id)
        ];
        return view('v_detailbayar', $data);
    }

    public function add($pesanan_id)
    {
        $data = [
            'pesanan' => $pesanan_id,
        ];
        return view('v_addDetailbayar', $data);
    }

    public function delete($id)
    {
        $this->DetailbayarModel->deleteData($id);
        return redirect()->route('pembayaran')->with('pesan', 'Data Berhasil Terhapus');
    }

    public function insert()
    {
        request()->validate([
            'pesanan_id' => 'required',
            'tgl_bayar' => 'required',
            'jumlah_bayar' => 'required',
            'cara_bayar' => 'required'
        ]);

        $data = [
            'pesanan_id' => request()->pesanan_id,
            'tgl_bayar' => request()->tgl_bayar,
            'jumlah_bayar' => request()->jumlah_bayar,
            'cara_bayar' => request()->cara_bayar,
            'bank' => request()->bank,
            'keterangan' => request()->keterangan,
            'created_at' => now(),
            'updated_at' => now()
        ];
        $this->DetailbayarModel->addData($data);
        //return redirect()->route('detailbayar')->with('pesan', 'Data Berhasil Ditambahkan');
        return redirect()->route('detailbayar', ['pesanan_id' => request()->pesanan_id])->with('pesan', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        if (!$this->DetailbayarModel->detailData($id)) {
            abort(404);
        }
        $data = [
            'detailbayar' => $this->DetailbayarModel->detailData($id),
        ];
        return view('v_editDetailBayar', $data);
    }

    public function update($id)
    {
        request()->validate([
            'tgl_bayar' => 'required',
            'jumlah_bayar' => 'required',
            'cara_bayar' => 'required',
        ]);

        $data = [
            'pesanan_id' => request()->pesanan_id,
            'tgl_bayar' => request()->tgl_bayar,
            'jumlah_bayar' => request()->jumlah_bayar,
            'cara_bayar' => request()->cara_bayar,
            'bank' => request()->bank,
            'keterangan' => request()->keterangan,
            'updated_at' => now()
        ];
        $this->DetailbayarModel->updateData($id, $data);
        return redirect()->route('detailbayar', request()->pesanan_id)->with('pesan', 'Data Berhasil Terupdate');
    }

    public function upload($id)
    {
        $data = [
            'detailbayar' => $this->DetailbayarModel->detailData($id),
        ];
        return view('v_uploadkuitansi', $data);
    }

    public function save($id)
    {

        $this->PesananModel = new PesananModel();
        $pesanan = $this->PesananModel->detailData(request()->pesanan_id);

        $arr = explode(".", basename($_FILES["fileToUpload"]["name"]));
        $target_dir = "kuitansi/";
        if ($arr[0] != "") {

            $file_name = "kuitansi_" . $pesanan->kode_pesanan . "_" . $id . ".jpg";
            $target_file = $target_dir . $file_name;
            $FileType = pathinfo($target_file, PATHINFO_EXTENSION);

            if (!file_exists($target_dir)) {
                mkdir($target_dir, 0777, true);
            }

            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

                $data = [
                    'buktibayar' => $file_name,
                    'updated_at' => now()
                ];
                $this->DetailbayarModel->updateData($id, $data);
                return redirect()->route('detailbayar', request()->pesanan_id)->with('pesan', 'Bukti bayar berhasil diupload');
            } else {
                return redirect()->route('detailbayar', request()->pesanan_id)->with('pesan', 'Bukti bayar gagal diupload');
            }
        }
    }
}
