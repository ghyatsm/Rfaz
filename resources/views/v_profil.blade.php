@extends('layout.v_template')

@section('title', 'Pelanggan')
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
<a href="/profil/add" class="btn btn-info btn-sm"> Tambah Profil Pelanggan </a> <br></br>

<table id="customers" class="table table-bordered">
    <tr>
        <th width="40">No</th>
        <th width="220">Nama Perusahaan</th>
        <th width="140">Nama Kontak</th>
        <th width="120">No HP</th>
        <th>Alamat</th>
        <th width="130"></th>
    </tr>

    <tbody>
        <?php $no = 1; ?>
        @foreach ($profil as $data)
        <tr>
            <td> {{ $no++ }} </td>
            <td style="text-align:left;"> {{ $data->nama_perusahaan }} </td>
            <td style="text-align:left;"> {{ $data->nama_kontak }} </td>
            <td> {{ $data->no_hp }} </td>
            <td style="text-align:left;"> {{ $data->alamat2 }} </td>
            <td>
                <!-- <a href="/pesanan/detail/{{ $data->id }}" class="btn btn-sm btn-success">Detail</a> -->
                <a href="/profil/edit/{{ $data->id}}" class="btn btn-sm btn-warning">Edit</a>
                <form action="/profil/delete/{{$data->id}}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-sm btn-danger" onclick="return confirm('are you sure')"> Delete </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


@endsection