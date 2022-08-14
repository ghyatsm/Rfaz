@extends('layout.v_template')
@section('title', 'Edit Data Pelanggan')
@section('content')

<form action="/profil/update/{{ $profil->id }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="content">
        <div class="row">
            <div class="col-sm-6">

                <div class="form-group">
                    <label>Nama Perusahaan</label>
                    <input name="nama_perusahaan" class="form-control" value="{{ $profil->nama_perusahaan }}">
                    <div class="text-danger">
                        @error('nama_perusahaan')
                        {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Nama Kontak</label>
                    <input name="nama_kontak" class="form-control" value="{{ $profil->nama_kontak}}">
                    <div class="text-danger">
                        @error('pemesan')
                        {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>No HP</label>
                    <input name="no_hp" class="form-control" value="{{ $profil->no_hp}}">
                    <div class="text-danger">
                        @error('no_hp')
                        {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <input name="alamat2" class="form-control" value="{{ $profil->alamat2}}">
                    <div class="text-danger">
                        @error('alamat2')
                        {{ $message }}
                        @enderror
                    </div>
                </div>

                <br>

                <div class="col-sm 12">
                    <div class="form-group">
                        <button class="btn btn-primary"> Simpan </button>
                        <a class="btn btn-primary" href="/profil" role="button">&nbsp;&nbsp;&nbsp;Batal&nbsp;&nbsp;&nbsp;</a>
                    </div>
                </div>
            </div>
        </div>

</form>

@endsection