@extends('layout.v_template')

@section('title', 'Faktur Pembayaran')
@section('content')

<head>
    <style type="text/css">
        body {
            font-family: 'Roboto Condensed', sans-serif;
        }

        .m-0 {
            margin: 0px;
        }

        .p-0 {
            padding: 0px;
        }

        .pt-5 {
            padding-top: 5px;
        }

        .mt-10 {
            margin-top: 10px;
        }

        .text-center {
            text-align: center !important;
        }

        .w-100 {
            width: 100%;
        }

        .w-50 {
            width: 50%;
        }

        .w-85 {
            width: 85%;
        }

        .w-15 {
            width: 15%;
        }

        .logo img {
            width: 145px;
            height: 145px;
            padding-top: 30px;
        }

        .logo span {
            margin-left: 8px;
            top: 19px;
            position: absolute;
            font-weight: bold;
            font-size: 25px;
        }

        .gray-color {
            color: #5D5D5D;
        }

        .text-bold {
            font-weight: bold;
        }



        table tr,
        th,
        td {
            border: 1px solid #d2d2d2;
            border-collapse: collapse;
            padding: 7px 8px;
        }

        table tr th {
            background: #F4F4F4;
            font-size: 15px;
        }

        table tr td {
            font-size: 13px;
        }

        .box-text p {
            line-height: 10px;
        }

        .float-left {
            float: left;
        }

        .total-part {
            font-size: 16px;
            line-height: 12px;
        }

        .total-right p {
            padding-right: 20px;
        }
    </style>
</head>

<body>

    <br>
    <a href="/generate-invoice-pdf/{{ $pesanan->id}}" class="btn btn-info btn-sm"> Download Faktur </a> <br></br>

    <table border="0" width="100%">
        <tr>
            <td width="30%" style="border:none">
                <img style="width: 145px;height: 145px;padding-top: 30px;" src="/foto_bahan/rfaz_logo.jpg">
            </td>
            <td style="border:none">
                <h1 class="text-center m-0 p-0>Faktur">Faktur Pembayaran</h1>
            </td>
            <td width="30%" style="border:none">
                <h1 class="text-center m-0 p-0">&nbsp;</h1>
            </td>
        </tr>
    </table>

    <div class="add-detail mt-10">

        <div class="w-50 float-left mt-10">
            <!-- <p class="m-0 pt-5 text-bold w-100">Invoice Id - <span class="gray-color">#6</span></p> -->
            <p class="m-0 pt-5 text-bold w-100">No Pesanan - <span class="gray-color">{{ $pesanan->kode_pesanan }}</span></p>
            <p class="m-0 pt-5 text-bold w-100">Tanggal Pesanan - <span class="gray-color">{{ date_format(new DateTime($pesanan->tanggal_mulai),'d M Y') }}</span></p>
        </div>

        <div style="clear: both;"></div>
    </div>
    <div class="table-section bill-tbl w-100 mt-10">
        <table class="table w-100 mt-10">
            <tr>
                <th class="w-50">Dari</th>
                <th class="w-50">Kepada</th>
            </tr>
            <tr>
                <td>
                    <div class="box-text">
                        <p>RFAZ-Textile</p>
                        <p>Majalaya, Kab. Bandung</p>
                        <p>HP : 0811986542</p>
                        <p>Fax : 022-75430982</p>
                    </div>
                </td>
                <td>
                    <div class="box-text">
                        <p>{{ $pesanan->profilmodel->nama_perusahaan . " / CP: " . $pesanan->profilmodel->nama_kontak }}</p>
                        <p>{{ $pesanan->profilmodel->alamat2 }}</p>
                        <p>{{ $pesanan->profilmodel->no_hp }}</p>
                        <p>Fax : 022-75430982</p>
                    </div>
                </td>
            </tr>

        </table>
    </div>
    <br>
    <div class="table-section bill-tbl w-100 mt-10">
        <table class="table w-100 mt-10">
            <tr>
                <th class="w-40">Nama Jasa</th>
                <th class="w-40">Satuan</th>
                <th class="w-40">Jumlah</th>
                <th class="w-40">Harga</th>
                <th class="w-40">Total</th>
            </tr>
            <tr align="center">
                <td>{{ "Jasa tenun benang " . $pesanan->benangmodel->nama_benang }}</td>
                <td>Meter</td>
                <td>{{ number_format($produksi->jumlah_produk) }}</td>
                <td>{{ number_format($pesanan->benangmodel->harga_benang) }}</td>
                <td>{{ number_format($pesanan->harga_final) }}</td>
            </tr>
            <tr>
                <td colspan="5">
                    <div class="total-part">
                        <div class="total-left w-85 float-left" align="right">
                            <p>Total Tagihan</p>
                        </div>
                        <div class="total-right w-15 float-left text-bold" align="right">
                            <p>{{ number_format($pesanan->harga_final) }}</p>
                        </div>
                        <div style="clear: both;"></div>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <br>
    <div class="table-section bill-tbl w-100 mt-20">
        <table class="table w-100 mt-10">
            <tr>
                <th class="w-40">Tanggal Bayar</th>
                <th class="w-40">Cara Bayar</th>
                <th>Jumlah Bayar</th>
            </tr>

            <?php
            foreach ($detailbayar as $bayar) {
                echo "<tr>";
                $tgl = date_format(new DateTime($bayar->tgl_bayar), 'd M Y');
                echo "<td>$tgl</td>";
                echo "<td>$bayar->cara_bayar</td>";
                echo "<td  align=right>" . number_format($bayar->jumlah_bayar) . "</td>";
            }
            echo "</tr>";
            ?>
            <tr>

                <td colspan="3">
                    <div class="total-part">
                        <div class="total-left w-85 float-left" align="right">
                            <p>Total Bayar</p>
                        </div>
                        <div class="total-right w-15 float-left text-bold" align="right">
                            <p>{{ number_format($pesanan->harga_final) }}</p>

                        </div>
                        <div style="clear: both;"></div>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    @endsection