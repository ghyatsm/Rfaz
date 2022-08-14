@extends('layout.v_template')
@section('title', 'Tambah Data Pembayaran')
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
<form action="/detailbayar/insert" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-row">
        <div class="form-group col-md-2">
            <input type="hidden" name="pesanan_id" class="form-control @error('pesanan_id') is-invalid @enderror" value="{{ $pesanan }}">
            <div class="invalid-feedback">
                @error('pesanan_id')
                {{ $message }}
                @enderror
            </div>
        </div>
    </div>

    <div class="form-group col-md-2">
        <label>Tanggal Bayar</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
            </div>
            <input type="date" name="tgl_bayar" class="form-control @error('tgl_bayar') is-invalid @enderror" data-inputmask-inputformat="dd/mm/yyyy" data-mask value="{{old('tgl_bayar')}}">
            <div class="invalid-feedback">
                @error('tgl_bayar')
                {{ $message }}
                @enderror
            </div>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-2">
            <label>Jumlah Bayar</label>
            <input name="jumlah_bayar" class="form-control @error('jumlah_bayar') is-invalid @enderror" value="{{ old('jumlah_bayar') }}" placeholder="Masukkan Jumlah Bayar">
            <div class="invalid-feedback">
                @error('jumlah_bayar')
                {{ $message }}
                @enderror
            </div>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-4">
            <label>Cara Bayar</label>
            <select name="cara_bayar" id="cara_bayar" class="form-control @error('cara_bayar') is-invalid @enderror">
                <option value="">-- Pilih Cara Bayar --</option>
                <option value="Transfer">Transfer</option>
                <option value="Cek">Cek</option>
                <option value="Tunai">Tunai</option>
            </select>
            @error('cara_bayar')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-2">
            <label>Bank</label>
            <input name="bank" placeholder="Masukkan Nama Bank">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-2">
            <label>Keterangan</label>
            <input name="keterangan">
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-primary"> Simpan </button>
        <a class="btn btn-primary" href="/detailbayar/{{$pesanan}}" role="button">&nbsp;&nbsp;&nbsp;Batal&nbsp;&nbsp;&nbsp;</a>
    </div>
</form>

@endsection