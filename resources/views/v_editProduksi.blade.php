@extends('layout.v_template')
@section('title', 'Edit Data Produksi')
@section('content')
<form action="/produksi/update/{{ $produksi->id }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="content">

        <div class="form-row">
            <div class="form-group col-md-2">
                <label>Tanggal Masuk Benang</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="date" name="tgl_masuk_benang" class="form-control @error('tgl_masuk_benang') is-invalid @enderror" data-inputmask-inputformat="dd/mm/yyyy" data-mask value="{{ $produksi->tgl_masuk_benang }}">
                    <div class="invalid-feedback">
                        @error('tgl_masuk_benang')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2">
                <label>Jumlah Benang Masuk [Kg]</label>
                <input name="jumlah_benang" class="form-control @error('jumlah_benang') is-invalid @enderror" value="{{ $produksi->jumlah_benang }}">
                <div class="invalid-feedback">
                    @error('jumlah_benang')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2">
                <label>Tanggal Mulai</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="date" name="tgl_mulai" class="form-control @error('tgl_mulai') is-invalid @enderror" data-inputmask-inputformat="dd/mm/yyyy" data-mask value="{{ $produksi->tgl_mulai }}">
                    <div class="invalid-feedback">
                        @error('tgl_mulai')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2">
                <label>Tanggal Selesai</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="date" name="tgl_selesai" class="form-control @error('tgl_selesai') is-invalid @enderror" data-inputmask-inputformat="dd/mm/yyyy" data-mask value="{{ $produksi->tgl_selesai }}">
                    <div class="invalid-feedback">
                        @error('tgl_selesai')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2">
                <label>Jumlah Produksi Kain [m]</label>
                <input name="jumlah_produk" class="form-control @error('jumlah_produk') is-invalid @enderror" value="{{ $produksi->jumlah_produk }}">
                <div class="invalid-feedback">
                    @error('jumlah_produk')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>

        <br>

        <div class="col-sm 12">
            <div class="form-group">
                <button class="btn btn-primary"> Simpan </button>
                <a class="btn btn-primary" href="/produksi" role="button">&nbsp;&nbsp;&nbsp;Batal&nbsp;&nbsp;&nbsp;</a>
            </div>
        </div>
</form>

@endsection