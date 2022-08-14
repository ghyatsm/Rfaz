@extends('layout.v_template')
@section('title', 'Edit Data Pembayaran')
@section('content')
<form action="/detailbayar/update/{{ $detailbayar->id }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="content">

        <div class="form-row">
            <div class="form-group col-md-2">
                <input type="hidden" name="pesanan_id" class="form-control @error('pesanan_id') is-invalid @enderror" value="{{ $detailbayar->pesanan_id }}">
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
                <input type="date" name="tgl_bayar" class="form-control @error('tgl_bayar') is-invalid @enderror" data-inputmask-inputformat="dd/mm/yyyy" data-mask value="{{ $detailbayar->tgl_bayar }}">
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
                <input name="jumlah_bayar" class="form-control @error('jumlah_bayar') is-invalid @enderror" value="{{ $detailbayar->jumlah_bayar }}">
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
                    <option value="Transfer" {{ ($detailbayar->cara_bayar == 'Transfer' ? ' selected' : '') }}>Transfer</option>
                    <option value="Cek" {{ ($detailbayar->cara_bayar == 'Cek' ? ' selected' : '') }}>Cek</option>
                    <option value="Tunai" {{ ($detailbayar->cara_bayar == 'Tunai' ? ' selected' : '') }}>Tunai</option>
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
                <input name="bank" value=" {{ $detailbayar->bank }}">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2">
                <label>Keterangan</label>
                <input name="keterangan" value=" {{ $detailbayar->keterangan }}">
            </div>
        </div>


        <br>

        <div class="col-sm 12">
            <div class="form-group">
                <button class="btn btn-primary"> Simpan </button>
                <a class="btn btn-primary" href="/detailbayar/{{ $detailbayar->pesanan_id }}" role="button">&nbsp;&nbsp;&nbsp;Batal&nbsp;&nbsp;&nbsp;</a>
            </div>
        </div>

</form>

@endsection