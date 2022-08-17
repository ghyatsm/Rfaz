<?php
if (!isset($_SESSION["username"])) {
    session_start();
}
?>

@extends('layout.v_template')
@section('title', 'Ubah Password')
@section('content')
<form action="/user/updatepassword/{{ $_SESSION['userid'] }}" method="POST" enctype="multipart/form-data" onsubmit="return(validasi());">
    @csrf

    <div class="content">
        <div class="row">
            <div class="col-sm-6">

                <div class="form-group">
                    <label>Username</label>
                    <input name="Username" class="form-control" readonly value="{{ $_SESSION['username'] }}">
                </div>

                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input name="realname" class="form-control" readonly value="{{ $_SESSION['realname'] }}">
                </div>

                <div class="form-group">
                    <label>Role</label>
                    <input name="role" class="form-control" readonly value="{{ $_SESSION['role'] }}">
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                    <div class="text-danger">
                        @error('password')
                        {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Ulang Password</label>
                    <input type="password" name="password2" id="password2" class="form-control">
                    <div class="text-danger">
                        @error('password')
                        {{ $message }}
                        @enderror
                    </div>
                </div>

                <br>

                <div class="col-sm 12">
                    <div class="form-group">
                        <button class="btn btn-primary"> Simpan </button>
                        <a class="btn btn-primary" href="/home" role="button">&nbsp;&nbsp;&nbsp;Batal&nbsp;&nbsp;&nbsp;</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    function validasi() {

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