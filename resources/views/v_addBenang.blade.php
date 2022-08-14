@extends('layout.v_template')

@section('title', 'Tambah benang')
@section('content')

<form action="/benang/insert" method="POST" enctype="multipart/form-data">

    @csrf
    <!-- {{ csrf_field() }} -->

    <div class="form-group">
        <label>Kode Benang</label>
        <input name="kode_benang" class="form-control" placeholder="Kode Benang">
        <div class="text-danger">
            @error('kode_benang')
            {{ $message }}
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label>Nama Benang</label>
        <input name="nama_benang" class="form-control" placeholder="Nama Benang">
        <div class="text-danger">
            @error('nama_benang')
            {{ $message }}
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label>Harga Benang</label>
        <input name="harga_benang" class="form-control" placeholder="Harga Benang">
        <div class="text-danger">
            @error('harga_benang')
            {{ $message }}
            @enderror
        </div>
    </div>

    <div class="col-sm 12">
        <div class="form-group">
            <button class="btn btn-primary"> Simpan </button>
            <a class="btn btn-primary" href="/benang" role="button">&nbsp;&nbsp;&nbsp;Batal&nbsp;&nbsp;&nbsp;</a>
        </div>
    </div>

</form>
@endsection