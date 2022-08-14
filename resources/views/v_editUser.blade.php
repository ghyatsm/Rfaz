@extends('layout.v_template')
@section('title', 'Edit Data User')
@section('content')
<form action="/user/update/{{ $user->id }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="content">
        <div class="row">
            <div class="col-sm-6">

                <div class="form-group">
                    <label>Username</label>
                    <input name="username" class="form-control" value="{{ $user->username }}">
                    <div class="text-danger">
                        @error('username')
                        {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Nama Benang</label>
                    <input name="realname" class="form-control" value="{{ $user->realname}}">
                    <div class="text-danger">
                        @error('realname')
                        {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Role</label>
                    <select name="role" class="form-control">
                        <option value=""> -- Pilih role -- </option>
                        <option value="admin" {{ ($user->role == "admin" ? ' selected=': '') }}>admin</option>
                        <option value="produksi" {{ ($user->role == 'produksi' ? ' selected=': '') }}>produksi</option>
                        <option value="keuangan" {{ ($user->role == 'keuangan' ? ' selected=': '') }}>keuangan</option>
                        <option value="penjualan" {{ ($user->role == 'penjualan' ? ' selected=': '') }}>penjualan</option>
                        <option value="manajemen" {{ ($user->role == 'manajemen' ? ' selected=': '') }}>manajemen</option>
                    </select>
                    <div class="text-danger">
                        @error('role')
                        {{ $message }}
                        @enderror
                    </div>
                </div>

                <br>

                <div class="col-sm 12">
                    <div class="form-group">
                        <button class="btn btn-primary"> Simpan </button>
                        <a class="btn btn-primary" href="/user" role="button">&nbsp;&nbsp;&nbsp;Batal&nbsp;&nbsp;&nbsp;</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection