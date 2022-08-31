@extends('layout.v_template')
@section('title', 'Edit Data Mesin')
@section('content')
<form action="/mesin/update/{{ $mesin->id }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="content">
        <div class="row">
            <div class="col-sm-6">

                <div class="form-group">
                    <label>Kode Mesin</label>
                    <input name="kode_mesin" class="form-control" value="{{ $mesin->kode_mesin }}">
                    <div class="text-danger">
                        @error('kode_mesin')
                        {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Nama Mesin</label>
                    <input name="merek_mesin" class="form-control" value="{{ $mesin->merek_mesin}}">
                    <div class="text-danger">
                        @error('merek_mesin')
                        {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Kecepatan</label>
                        <select name="kecepatan" id="kecepatan" class="form-control @error('kecepatan') is-invalid @enderror">
                            <option value="">-- Pilih Kecepatan --</option>
                            <option value="90" {{ ($mesin->kecepatan == '90' ? ' selected' : '') }}>90</option>
                            <option value="95" {{ ($mesin->kecepatan == '95' ? ' selected' : '') }}>95</option>
                            <option value="100" {{ ($mesin->kecepatan == '100' ? ' selected' : '') }}>100</option>
                            <option value="105" {{ ($mesin->kecepatan == '105' ? ' selected' : '') }}>105</option>
                            <option value="110" {{ ($mesin->kecepatan == '110' ? ' selected' : '') }}>110</option>
                            <option value="115" {{ ($mesin->kecepatan == '115' ? ' selected' : '') }}>115</option>
                        </select>
                        @error('kecepatan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Status</label>
                        <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                            <option value="">-- Pilih Status Pemesanan --</option>
                            <option value="aktif" {{ ($mesin->status == 'aktif' ? ' selected' : '') }}>aktif</option>
                            <option value="nonaktif" {{ ($mesin->status == 'nonaktif' ? ' selected' : '') }}>nonaktif</option>
                        </select>
                        @error('status')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <br>

                <div class="col-sm 12">
                    <div class="form-group">
                        <button class="btn btn-primary"> Simpan </button>
                        <a class="btn btn-primary" href="/mesin" role="button">&nbsp;&nbsp;&nbsp;Batal&nbsp;&nbsp;&nbsp;</a>
                    </div>
                </div>
            </div>
        </div>

</form>

@endsection