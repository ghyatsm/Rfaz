@extends('layout.v_template')
@section('title', 'Edit Data Benang')
@section('content')
<form action="/benang/update/{{ $benang->id }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="content">
        <div class="row">
            <div class="col-sm-6">

                <div class="form-group">
                    <label>Kode Benang</label>
                    <input name="kode_benang" class="form-control" value="{{ $benang->kode_benang }}">
                    <div class="text-danger">
                        @error('kode_benang')
                        {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Nama Benang</label>
                    <input name="nama_benang" class="form-control" value="{{ $benang->nama_benang}}">
                    <div class="text-danger">
                        @error('nama_benang')
                        {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Harga Benang</label>
                    <input name="harga_benang" class="form-control" value="{{ $benang->harga_benang}}">
                    <div class="text-danger">
                        @error('harga_benang')
                        {{ $message }}
                        @enderror
                    </div>
                </div>

                <br>

                <div class="col-sm 12">
                    <div class="form-group">
                        <button class="btn btn-primary"> Simpan </button>
                        <a class="btn btn-primary" href="/benang" role="button">&nbsp;&nbsp;&nbsp;Batal&nbsp;&nbsp;&nbsp;</a>
                    </div>
                </div>
            </div>
        </div>

</form>

@endsection