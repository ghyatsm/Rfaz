@extends('layout.v_template')

@section('title', 'Upload Bukti Bayar')
@section('content')

<link rel="stylesheet" href="style.css">

@if (session('pesan'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times; </button>
    <h4> <i class="icon fa fa-check"></i> Sukses!</h4>
    {{ session('pesan') }}.
</div>
@endif

<br>
Pesanan ID : {{ $detailbayar->pesanan_id }}
<br>
Bayar ID : {{ $detailbayar->id }}
<br>
<form name="myForm" action="/detailbayar/upload/save/{{ $detailbayar->id }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="fileToUpload">
    <input type="hidden" name="pesanan_id" value="{{ $detailbayar->pesanan_id }}">
    <button type=submit name=action onclick="return validateForm()">Simpan</button>
</form>

<script>
    function validateForm() {

        proses = true;
        var file_ext;
        var dest;
        var x = document.forms["myForm"]["fileToUpload"].value;
        //alert("file: " + x);
        //is a file selected?

        if (x == null || x == "") {
            alert("Pilihlah sebuah image file");
            return false;
        } else {

            //is the file a image file?
            file_ext = x.split('.').pop();
            //alert(file_ext);
            if (file_ext.toUpperCase() == "PNG" || file_ext.toUpperCase() == "GIF" || file_ext.toUpperCase() == "JPEG" || file_ext.toUpperCase() == "BMP" || file_ext.toUpperCase() == "JPG") {
                alert("sukses");
                return true;
            } else {
                //alert("return true");
                alert(file_ext.toUpperCase() + " " + "Pilihlah sebuah image file");
                return false;
            }
        }
    }
</script>
@endsection