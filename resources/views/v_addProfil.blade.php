@extends('layout.v_template')

@section('title', 'Tambah Profil')
@section('content')

<form action="/profil/insert" method="POST" enctype="multipart/form-data">

    @csrf
    <!-- {{ csrf_field() }} -->

    <div class="form-group">
        <label>Nama Perusahaan</label>
        <input name="nama_perusahaan" class="form-control" value="{{ old('nama_perusahaan') }}" placeholder="Nama Perusahaan">
        <div class="text-danger">
            @error('nama_perusahaan')
            {{ $message }}
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label>Nama Kontak</label>
        <input name="nama_kontak" class="form-control" value="{{ old('nama_kontak') }}" placeholder="Nama Kontak">
        <div class="text-danger">
            @error('nama_kontak')
            {{ $message }}
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label>Alamat</label>
        <input name="alamat2" class="form-control" value="{{ old('alamat2') }}" placeholder="Alamat">
        <div class="text-danger">
            @error('alamat2')
            {{ $message }}
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label>No HP</label>
        <input name="no_hp" class="form-control" value="{{ old('no_hp') }}" placeholder="No HP">
        <div class="text-danger">
            @error('no_hp')
            {{ $message }}
            @enderror
        </div>
    </div>

    <div class="col-sm 12">
        <div class="form-group">
            <button class="btn btn-primary"> Simpan </button>
            <a class="btn btn-primary" href="/profil" role="button">&nbsp;&nbsp;&nbsp;Batal&nbsp;&nbsp;&nbsp;</a>
        </div>
    </div>

</form>
@endsection