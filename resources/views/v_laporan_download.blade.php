<!DOCTYPE html>
<html>

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

        .w-85 {
            width: 85%;
        }

        .w-50 {
            width: 50%;
        }

        .w-15 {
            width: 15%;
        }

        .w-10 {
            width: 10%;
        }

        .w-5 {
            width: 5%;
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

    <table border="0" width="100%">
        <tr>
            <td width="30%" style="border:none">
                <img style="width: 145px;height: 145px;padding-top: 30px;" src="foto_bahan/rfaz_logo.jpg">
            </td>
            <td style="border:none">
                <h1 class="text-center m-0 p-0>Faktur">Laporan Pemesanan</h1>
            </td>
            <td width="30%" style="border:none">
                <h1 class="text-center m-0 p-0">&nbsp;</h1>
            </td>
        </tr>
    </table>



    <div class="add-detail mt-10">

        <div class="w-50 float-left mt-10">
            <!-- <p class="m-0 pt-5 text-bold w-100">Invoice Id - <span class="gray-color">#6</span></p> -->
            <p class="m-0 pt-5 text-bold w-100">Tahun {{ date_format(now(),'Y') }}</span></p>
        </div>

        <div style="clear: both;"></div>
    </div>
    <div class="table-section bill-tbl w-100 mt-10">
        <table class="table w-100 mt-10" style="border-collapse: collapse;">
            <tr>
                <th class="w-5">No.</th>
                <th>Pemesan</th>
                <th class="w-10">Tgl. Mulai</th>
                <th class="w-10">Tgl. Selesai</th>
                <th class="w-20">Jenis Benang</th>
                <th class="w-15">Berat Benang [Kg]</th>
                <th class="w-10">Panjang Kain [m]</th>
                <th class="w-10">Harga</th>
            </tr>
            <?php
            $i = 0;
            $tot_benang = 0;
            $tot_kain = 0;
            $tot_harga = 0;
            foreach ($pesanan as $pesan) {
                $kode_pesanan = $pesan->kode_pesanan;
                $myproduksi = $produksi->where('kode_pesanan', 'like', $kode_pesanan)->first();
                $i++;
                echo "<tr>";
                echo "<td style=text-align:center>$i</td>";
                echo "<td>" . $pesan->profilmodel->nama_perusahaan . "</td>";
                echo "<td style=text-align:center>" . date_format(new datetime($myproduksi->tgl_mulai), 'd M Y') . "</td>";
                echo "<td style=text-align:center>" . date_format(new datetime($myproduksi->tgl_selesai), 'd M Y') . "</td>";
                echo "<td>" . $pesan->benangmodel->nama_benang . "</td>";
                echo "<td style=text-align:center>" . $myproduksi->jumlah_benang  . "</td>";
                echo "<td style=text-align:center>" . $myproduksi->jumlah_produk . "</td>";
                echo "<td style=text-align:right>" . number_format($pesan->harga_final) . "</td>";
                echo "</tr>";
                $tot_benang = $tot_benang + $myproduksi->jumlah_benang;
                $tot_kain = $tot_kain + $myproduksi->jumlah_produk;
                $tot_harga = $tot_harga + $pesan->harga_final;
            }
            ?>
            <tr>
                <td style=text-align:right colspan="5"><b>Total</td>
                <td style=text-align:center><b>{{ number_format($tot_benang) }}</td>
                <td style=text-align:center><b>{{ number_format($tot_kain) }}</td>
                <td style=text-align:right><b>{{ number_format($tot_harga) }}</td>
            </tr>
        </table>
    </div>
</body>

</html>