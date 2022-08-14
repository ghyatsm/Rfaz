<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use App\Models\PesananModel;
use App\Models\ProduksiModel;
use App\Models\DetailbayarModel;

class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function generateInvoiceHTML($id)
    {
        $this->DetailbayarModel = new DetailbayarModel();
        $this->PesananModel = new PesananModel();
        $this->ProduksiModel = new ProduksiModel();

        $temp = PesananModel::with('profilmodel', 'benangmodel')->where('id', $id)->first();

        $data = [
            'detailbayar' => $this->DetailbayarModel->allData($id),
            'pesanan' => PesananModel::with('profilmodel', 'benangmodel')->where('id', $id)->first(),
            'produksi' => ProduksiModel::where('kode_pesanan', 'like', $temp->kode_pesanan)->first()
        ];
        return view('v_faktur', $data);
    }

    public function generateInvoicePDF($id)
    {
        $this->DetailbayarModel = new DetailbayarModel();
        $this->PesananModel = new PesananModel();
        $this->ProduksiModel = new ProduksiModel();

        $temp = PesananModel::with('profilmodel', 'benangmodel')->where('id', $id)->first();

        $data = [
            'detailbayar' => $this->DetailbayarModel->allData($id),
            'pesanan' => PesananModel::with('profilmodel', 'benangmodel')->where('id', $id)->first(),
            'produksi' => ProduksiModel::where('kode_pesanan', 'like', $temp->kode_pesanan)->first()
        ];

        $pdf = FacadePdf::loadView('v_faktur_download', $data);
        return $pdf->download("FakturPembayaran_$temp->kode_pesanan.pdf");
    }

    public function generateLaporanHTML()
    {
        $this->PesananModel = new PesananModel();
        $this->ProduksiModel = new ProduksiModel();

        $data = [
            'pesanan' => PesananModel::with('profilmodel', 'benangmodel')->where('status', 'Closed')->get(),
            'produksi' => $this->ProduksiModel->allData(),
        ];
        return view('v_laporan', $data);
    }

    public function generateLaporanPDF()
    {
        $this->PesananModel = new PesananModel();
        $this->ProduksiModel = new ProduksiModel();

        $data = [
            'pesanan' => PesananModel::with('profilmodel', 'benangmodel')->where('status', 'Closed')->get(),
            'produksi' => $this->ProduksiModel->allData(),
        ];

        $pdf = FacadePdf::loadView('v_laporan_download', $data)->setPaper('a4', 'landscape');
        return $pdf->download('LaporanPemesanan.pdf');
    }
}
