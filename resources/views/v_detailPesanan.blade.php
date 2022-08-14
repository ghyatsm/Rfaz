@extends('layout.v_template')
@section('title', 'Detail Pesanan')
@section('content')

<table class="table">
    <tr>
        <th width="200px"> Kode Pesanan </th>
        <th width="30px"> : </th>
        <th>{{ $pesanan->kode_bahan }}</th>
    </tr>
    <tr>
        <th width="100px"> Nama Bahan </th>
        <th width="30px"> : </th>
        <th>{{ $pesanan->nama_bahan }}</th>
    </tr>
    <tr>
        <th width="100px"> Berat Bahan </th>
        <th width="30px"> : </th>
        <th>{{ $pesanan->berat_bahan }}</th>
    </tr>
    <tr>
        <th width="100px"> Foto Bahan </th>
        <th width="30px"> : </th>
        <th><img src="{{ url('foto_bahan/'.$pesanan->foto_bahan) }}" width="400px" </th>
    </tr>
    <tr>
        <th><a href="/pesanan" class="btn btn-success tbn-sm"> Kembali </a></th>
    </tr>
</table>

@endsection