@extends('layout.v_template')
@section('title', 'Tambah Pesanan')
@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="/pesanan/insert" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-row">
        <div class="form-group col-md-4">
            <label>Pelanggan</label>
            <select name="pelanggan_id" class="form-control @error('pelanggan_id') is-invalid @enderror" id="pelanggan_id">
                <option value="">-- Pilih Pelanggan --</option>
                @foreach ($pelanggans as $pelanggan)
                <option value="{{ $pelanggan->id }}"> {{ $pelanggan->nama_perusahaan }}&nbsp;&nbsp;|&nbsp;&nbsp;{{ $pelanggan->nama_kontak }}</option>
                @endforeach
            </select>
            @error('pelanggan_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-4">
            <label>Jenis Benang</label>
            <select name="benang_id" id="benang_id" class="form-control @error('benang_id') is-invalid @enderror">
                <option value="">-- Pilih Jenis Benang --</option>
                @foreach ($benangs as $benang)
                <option value="{{ $benang->id }}"> {{ $benang->nama_benang }}</option>
                @endforeach
            </select>
            @error('benang_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-2">
            <label>Jumlah Benang [Kg]</label>
            <input name="berat_bahan" class="form-control @error('berat_bahan') is-invalid @enderror" value="{{ old('berat_bahan') }}" placeholder="Masukkan Jumlah benang masuk">
            <div class="invalid-feedback">
                @error('berat_bahan')
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
                <input type="date" name="tanggal_mulai" class="form-control @error('tanggal_masuk') is-invalid @enderror" data-inputmask-inputformat="dd/mm/yyyy" data-mask value="{{old('tanggal_mulai')}}">
                <div class="invalid-feedback">
                    @error('tanggal_masuk')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group col-md-2">
            <label>Tanggal Selesai</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                </div>
                <input type="date" name="tanggal_selesai" class="form-control @error('tanggal_selesai') is-invalid @enderror" data-inputmask-inputformat="dd/mm/yyyy" data-mask value="{{old('tanggal_selesai')}}">
                <div class="invalid-feedback">
                    @error('tanggal_selesai')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-4">
            <label>Status</label>
            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                <option value="">-- Pilih Status Pemesanan --</option>
                <option value="Siap">Siap</option>
                <option value="Selesai">Selesai</option>
                <option value="Selesai">Dikirim</option>
                <option value="Selesai">Closed</option>
            </select>
            @error('status')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>

    <!--     <div class="form-row">
        <div class="form-group col-md-2">
            <label>Harga Final</label>
            <input name="harga_final" class="form-control @error('harga_final') is-invalid @enderror" value="0" placeholder="Masukkan harga final">
            <div class="invalid-feedback">
                @error('harga_final')
                {{ $message }}
                @enderror
            </div>
        </div>
    </div> -->

    <div class="form-group">
        <button class="btn btn-primary"> Simpan </button>
        <a class="btn btn-primary" href="/pesanan" role="button">&nbsp;&nbsp;&nbsp;Batal&nbsp;&nbsp;&nbsp;</a>
    </div>
</form>

@endsection