@extends('layout.v_template')

@section('title', 'Pesanan')
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
<form action="/pesanan/search" method="post">
    @csrf
    <table width=100% border="0">
        <tr height="50px">
            <td style="text-align:left"><a href="/pesanan/add" class="btn btn-info btn-sm"> Tambah Data Pesanan </a></td>
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

<table width="100%" id="customers">
    <thead>
        <tr>
            <th style="text-align: center; vertical-align: middle;" width="40" rowspan=2>No</th>
            <th style="text-align: center; vertical-align: middle;" width="90" rowspan=2>Kode Pesanan</th>
            <th colspan=2 style="text-align: center; vertical-align: middle;">Pemesan</th>
            <th colspan=2>Benang</th>
            <th colspan=2>Tanggal Rencana</th>
            <th colspan=2>Harga Jasa</th>
            <th style="text-align: center; vertical-align: middle;" width="100" rowspan=2>Status</th>
            <th style="text-align: center; vertical-align: middle;" width="130" rowspan=2>Action</th>
        </tr>
        <tr style="background-color: #D6EEEE;">
            <th>Nama Perusahaan</th>
            <th width="130">Kontak Person</th>
            <th width="100">Jenis</th>
            <th width="80">Jumlah</th>
            <th width="120">Mulai</th>
            <th width="120">Selesai</th>
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
            <td style="text-align: left;"> {{ $data->profilmodel->nama_perusahaan }}</td>
            <td style="text-align: left;"> {{ $data->profilmodel->nama_kontak }} </td>
            <td> {{ $data->benangmodel->kode_benang }} </td>
            <td> {{ $data->berat_bahan}} </td>
            <td> {{ $data->tanggal_mulai }} </td>
            <td> {{ $data->tanggal_selesai }} </td>
            <td style="text-align: right;"> {{ number_format($data->harga_awal) }} </td>
            <td style="text-align: right;"> {{ number_format($data->harga_final) }} </td>
            <td> {{ $data->status }} </td>
            <td>
                <!-- <a href="/pesanan/detail/{{ $data->id }}" class="btn btn-sm btn-success">Detail</a> -->
                <?php $disable = ($data->status == 'Closed' ? 'disabled' : '') ?>

                <form action="/pesanan/edit/{{ $data->id}}" class="d-inline">
                    <button class="btn btn-sm btn-warning" {{ $disable }}> Edit </button>
                </form>
                <form action="/pesanan/delete/{{$data->id}}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-sm btn-danger" onclick="return confirm('are you sure')" {{ $disable }}> Delete </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $pesanan->links() }}

@endsection