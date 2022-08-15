@extends('layout.v_template')

@section('title', 'Pembayaran')
@section('content')

<style>
    #customers td,
    #customers th {
        border: 1px solid #ddd;
        padding: 4px;
        text-align: center;
    }

    #customers tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #customers tr:hover {
        background-color: #ddd;
    }

    #customers th {
        padding-top: 10px;
        padding-bottom: 10px;
        text-align: center;
        background-color: #04AA6D;
        color: white;
    }
</style>


@if (session('pesan'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times; </button>
    <h4> <i class="icon fa fa-check"></i> Sukses!</h4>
    {{ session('pesan') }}.
</div>

@endif
<br>

<form action="/pembayaran/search" method="post">
    @csrf
    <table width=100% border="0">
        <tr height="50px">
            <td style="text-align:right;">
                <input name="kode_pesanan" type="text" placeholder="Masukan kode pesanan" style="border-radius:3px; font-size:10pt; height:30px;"></input>
            </td>
            <td style="text-align:right;" width="165px">
                <input name="status" type="text" placeholder="Masukan status pesanan" style="border-radius:3px; font-size:10pt; height:30px;"></input>
            </td>
            <td style="text-align:right;" width="80px">
                <button type="submit" style="border-radius:3px; height:30px; font-size:10pt">&nbsp;&nbsp;Search&nbsp;&nbsp;
                </button>
            </td>
        </tr>
    </table>
</form>

<table id="customers" class="table table-bordered">
    <thead>
        <tr>
            <th width="40" style="text-align: center; vertical-align: middle;" rowspan=2>No</th>
            <th width="90" style="text-align: center; vertical-align: middle;" rowspan=2>Kode Pesanan</th>
            <th colspan="2" style="text-align: center; vertical-align: middle;">Pemesan</th>
            <th colspan="2">Benang</th>
            <th width="120" style="text-align: center; vertical-align: middle;" rowspan=2>Rencana Selesai</th>
            <th colspan="2">Harga</th>
            <th width="80" style="text-align: center; vertical-align: middle;" rowspan=2>Status</th>
            <th width="130" style="text-align: center; vertical-align: middle;" rowspan=2>Action</th>
        </tr>
        <tr>
            <th width>Perusahaan</th>
            <th width="140">Kontak Person</th>
            <th width="80">Jenis</th>
            <th width="80">Jumlah</th>
            <th width="100">Perkiraan</th>
            <th width="100">Final</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        @foreach ($pesanan as $index => $data)
        <tr>
            <td> {{ $index + $pesanan->firstItem() }} </td>
            <td> {{ $data->kode_pesanan }} </td>
            <td style="text-align: left;">{{ $data->profilmodel->nama_perusahaan }}</td>
            <td style="text-align: left;">{{ $data->profilmodel->nama_kontak }}</td>
            <td> {{ $data->benangmodel->kode_benang }}</td>
            <td> {{ $data->berat_bahan }} </td>
            <td> {{ $data->tanggal_selesai }} </td>
            <td style="text-align: right;"> {{ number_format($data->harga_awal) }} </td>
            <td style="text-align: right;"> {{ number_format($data->harga_final) }} </td>
            <td> {{ $data->status }} </td>
            <td>
                <?php $disable = ($data->status == 'Closed' ? 'disabled' : '') ?>
                <form action="/detailbayar/{{ $data->id}}" class="d-inline">
                    @csrf
                    <button class="btn btn-sm btn-warning" {{ $disable }}> Bayar </button>
                </form>
                <form action='generate-invoice-html/{{ $data->id}}' class="d-inline">
                    @csrf
                    <button class="btn btn-sm btn-danger">Faktur</button>
                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $pesanan->links() }}
@endsection