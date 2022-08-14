@extends('layout.v_template')

@section('title', 'Data Pembayaran')
@section('content')

<style>
    table {
        width: 100%;
    }

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
<table class="table table-sm">
    <thead>
        <tr>
            <th width="200">Kode Pesanan</th>
            <th width="30">:</th>
            <th> {{$pesanan->kode_pesanan}} </th>
        </tr>
        <tr>
            <th width="200">Pemesan</th>
            <th width="30">:</th>
            <th> {{$pelanggan->nama_perusahaan}}</th>
        </tr>
        <tr>
            <th width="200">Harga Perkiraan</th>
            <th width="30">:</th>
            <th> {{ "Rp. " . number_format($pesanan->harga_awal)}} </th>
        </tr>
        <tr>
            <th width="200">Harga Final</th>
            <th width="30">:</th>
            <th> {{ "Rp. " . number_format($pesanan->harga_final)}} </th>
        </tr>
    </thead>
</table>

<br></br>
<a href="/detailbayar/add/{{ $pesanan->id }}" class="btn btn-primary btn-sm"> Tambah Data Pembayaran </a><br><br>

<table id="customers">
    <tr>
        <th width="40">No</th>
        <th width="130">Tanggal Bayar</th>
        <th width="130">Jumlah Bayar</th>
        <th width="130">Cara Bayar</th>
        <th width="130">Bank</th>
        <th>Keterangan</th>
        <th width="130">Action</th>
    </tr>

    <tbody>

        <?php
        $no = 1;
        $totalbayar = 0;
        ?>
        @foreach ($detailbayar as $data)
        <tr>
            <td> {{ $no++ }} </td>
            <td style="width:200;text-align:center;"> {{ date_format(date_create($data->tgl_bayar),"d M Y") }} </td>
            <td style="text-align:right;"> {{ number_format($data->jumlah_bayar) }} </td>
            <td style="text-align:center;"> {{ $data->cara_bayar }} </td>
            <td style="text-align:center;"> {{ $data->bank }} </td>
            <td style="text-align:left;"> {{ $data->keterangan }} </td>
            <td>
                <!-- <a href="/pesanan/detail/{{ $data->id }}" class="btn btn-sm btn-success">Detail</a>  -->
                <a href="/detailbayar/edit/{{ $data->id}}" class="btn btn-sm btn-warning">Edit</a>
                <form action="/detailbayar/delete/{{$data->id}}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-sm btn-danger" onclick="return confirm('are you sure')"> Delete </button>
                </form>
            </td>
            <?php $totalbayar = $totalbayar + $data->jumlah_bayar; ?>
        </tr>

        @endforeach
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>Total Bayar :</td>
            <td style="text-align:right;">{{ number_format($totalbayar) }}</td>
            <td>
            </td>
            <td colspan=3></td>
        </tr>
        <tr>
            <td></td>
            <td>Kurang Bayar :</td>
            <?php $kurang_bayar = $pesanan->harga_final - $totalbayar; ?>
            <td style="text-align:right;">{{ number_format($kurang_bayar) }}</td>
            <td>
                <form action="/pembayaran/update/{{ $pesanan->id }}" method="post">
                    @csrf
                    <button name="isLunas" value="Lunas" class="btn btn-sm btn-danger" onclick="return confirm('are you sure')" {{ ($kurang_bayar != 0 ? 'disabled' : '') }}>Lunas</button>
                </form>
            </td>
            <td colspan=3></td>
        </tr>
    </tbody>
</table>
<br>
<a class="btn btn-primary btn-sm" href="/pembayaran" role="button"> Kembali </a>

@endsection