@extends('layout.v_template')

@section('title', 'Tambah User')
@section('content')

<form action="/user/insert" method="POST" enctype="multipart/form-data" onsubmit="return(validate());">

    @csrf
    <!-- {{ csrf_field() }} -->

    <div class="form-group">
        <label>Username</label>
        <input name="username" class="form-control" value="{{ old('username') }}" placeholder="Username">
        <div class="text-danger">
            @error('username')
            {{ $message }}
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label>Nama Lengkap</label>
        <input name="realname" class="form-control" value="{{ old('realname') }}" placeholder="Nama Lengkap">
        <div class="text-danger">
            @error('realname')
            {{ $message }}
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label>Role</label>
        <select name="role">
            <option value=""> -- Pilih role -- </option>
            <option value="admin">admin</option>
            <option value="produksi">produksi</option>
            <option value="keuangan">keuangan</option>
            <option value="penjualan">penjualan</option>
            <option value="manajemen">manajemen</option>
        </select>

        <div class="text-danger">
            @error('role')
            {{ $message }}
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label>Password</label>
        <input id="password" name="password" type="password" class="form-control" value="{{ old('password') }}" placeholder="Password">
        <div class="text-danger">
            @error('password')
            {{ $message }}
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label>Ulangi Password</label>
        <input id="password2" name="password2" type="password" class="form-control" value="{{ old('password') }}" placeholder="Ulangi Password">
        <div class="text-danger">
            @error('password2')
            {{ $message }}
            @enderror
        </div>
    </div>

    <div class="col-sm 12">
        <div class="form-group">
            <button class="btn btn-primary"> Simpan </button>
            <a class="btn btn-primary" href="/user" role="button">&nbsp;&nbsp;&nbsp;Batal&nbsp;&nbsp;&nbsp;</a>
        </div>
    </div>

</form>

<script>
    function validate() {

        pwd1 = document.getElementById("password").value;
        pwd2 = document.getElementById("password2").value;

        if (pwd1 != pwd2) {
            alert("Ada kesalahan : password tidak sama");
            return false;
        } else {
            return (true);
        }

    }
</script>

@endsection