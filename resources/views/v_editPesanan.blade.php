@extends('layout.v_template')
@section('title', 'Edit Data Pesanan')
@section('content')
<form action="/pesanan/update/{{ $pesanan->id }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="content">

        <div class="form-row">
            <div class="form-group col-md-2">
                <label>Kode Pesanan</label>
                <input name="kode_pesanan" value="{{ $pesanan->kode_pesanan }}" readonly>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label>Pelanggan</label>
                <select name="pelanggan_id" class="form-control @error('pelanggan_id') is-invalid @enderror" id="pelanggan_id">
                    @foreach ($pelanggans as $pelanggan)
                    <option value="{{ $pelanggan->id }}" {{ ($pelanggan->id == $pesanan->pelanggan_id ? 'selected=': '')}}>{{ $pelanggan->nama_perusahaan . "; " . $pelanggan->nama_kontak}}</option>
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
                <select name="benang_id" class="form-control @error('benang_id') is-invalid @enderror" id="benang_id">
                    @foreach ($benangs as $benang)
                    <option value="{{ $benang->id }}" {{ ($benang->id == $pesanan->benang_id ? 'selected=': '')}}>{{ $benang->nama_benang}}</option>
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
                <input name="berat_bahan" class="form-control @error('berat_bahan') is-invalid @enderror" value="{{ $pesanan->berat_bahan }}">
                <div class="invalid-feedback">
                    @error('berat_bahan')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2">
                <label>Tanggal Rencana Mulai</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="date" name="tanggal_mulai" class="form-control @error('tanggal_mulai') is-invalid @enderror" data-inputmask-inputformat="dd/mm/yyyy" data-mask value="{{ $pesanan->tanggal_mulai }}">
                    <div class="invalid-feedback">
                        @error('tanggal_mulai')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group col-md-2">
                <label>Tanggal Rencana Selesai</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="date" name="tanggal_selesai" class="form-control @error('tanggal_selesai') is-invalid @enderror" data-inputmask-inputformat="dd/mm/yyyy" data-mask value="{{ $pesanan->tanggal_selesai }}">
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
                    <option value="Siap" {{ ($pesanan->status == 'Siap' ? ' selected' : '') }}>Siap</option>
                    <option value="Selesai" {{ ($pesanan->status == 'Selesai' ? ' selected' : '') }}>Selesai</option>
                    <option value="Dikirim" {{ ($pesanan->status == 'Dikirim' ? ' selected' : '') }}>Dikirim</option>
                    <option value="Closed" {{ ($pesanan->status == 'Closed' ? ' selected' : '') }}>Closed</option>
                </select>
                @error('status')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <!--         <div class="form-row">
            <div class="form-group col-md-2">
                <label>Harga Final</label>
                <input name="harga_final" class="form-control @error('harga_final') is-invalid @enderror" value="{{ $pesanan->harga_final }}">
                <div class="invalid-feedback">
                    @error('harga_final')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
 -->

        <br>

        <div class="col-sm 12">
            <div class="form-group">
                <button class="btn btn-primary"> Simpan </button>
                <a class="btn btn-primary" href="/pesanan" role="button">&nbsp;&nbsp;&nbsp;Batal&nbsp;&nbsp;&nbsp;</a>
            </div>
        </div>

</form>

@endsection