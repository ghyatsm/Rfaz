@extends('layout.v_template')

@section('title', 'Tambah Mesin')
@section('content')

<form action="/mesin/insert" method="POST" enctype="multipart/form-data">

    @csrf

    <div class="form-group">
        <label>Kode Mesin</label>
        <input name="kode_mesin" class="form-control" placeholder="Kode Mesin">
        <div class="text-danger">
            @error('kode_mesin')
            {{ $message }}
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label>Nama Mesin</label>
        <input name="merek_mesin" class="form-control" placeholder="Merek Mesin">
        <div class="text-danger">
            @error('merek_mesin')
            {{ $message }}
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label>Kecepatan [Hari/200 Kg]</label>
        <select name="kecepatan" id="kecepatan" class="form-control @error('kecepatan') is-invalid @enderror">
            <option value="">-- Pilih Kecepatan --</option>
            <option value="90">90</option>
            <option value="95">95</option>
            <option value="100">100</option>
            <option value="105">105</option>
            <option value="110">110</option>
            <option value="115">115</option>
        </select>
        <div class="text-danger">
            @error('kecepatan')
            {{ $message }}
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label>Status</label>
        <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
            <option value="">-- Pilih Status Mesin --</option>
            <option value="aktif">aktif</option>
            <option value="nonaktif">nonaktif</option>
        </select>
        <div class="text-danger">
            @error('status')
            {{ $message }}
            @enderror
        </div>
    </div>

    <div class="col-sm 12">
        <div class="form-group">
            <button class="btn btn-primary"> Simpan </button>
            <a class="btn btn-primary" href="/mesin" role="button">&nbsp;&nbsp;&nbsp;Batal&nbsp;&nbsp;&nbsp;</a>
        </div>
    </div>

</form>
@endsection