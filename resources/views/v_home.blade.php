<?php
if (!isset($_SESSION["username"])) {
    session_start();
}

if (!isset($_SESSION["username"])) {
    die("access not allowed");
}
?>

@extends('layout.v_template')

@section('title', 'Home' )
@section('content')

@if (session('pesan'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times; </button>
    <h4> <i class="icon fa fa-check"></i> Sukses!</h4>
    {{ session('pesan') }}.
</div>
@endif

<body>
    <div style="width:100%;height:600px;">
        <img src="foto_bahan/home.png" style="object-fit:fill;width:100%;height:100%;">
        </img>
    </div>
</body>

@endsection