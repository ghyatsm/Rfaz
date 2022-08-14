@extends('layout.v_template')

@section('title', 'Benang')
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
<a href="/benang/add" class="btn btn-info btn-sm"> Tambah Data Benang </a>
<br></br>


<table id="customers" class="table table-bordered">
    <tr>
        <th width="40">No</th>
        <th width="200">Kode Benang</th>
        <th>Nama Benang</th>
        <th width="250">Harga Jasa / m</th>
        <th width="130">Action</th>
    </tr>
    <tbody>
        <?php $no = 1; ?>
        @foreach ($benang as $data)
        <tr>
            <td> {{ $no++ }} </td>
            <td style="text-align:left;"> {{ $data->kode_benang }} </td>
            <td style="text-align:left;"> {{ $data->nama_benang }} </td>
            <td style="text-align:right;"> {{ number_format($data->harga_benang) }} </td>
            <td>
                <!-- <a href="/pesanan/detail/{{ $data->id }}" class="btn btn-sm btn-success">Detail</a>  -->
                <a href="/benang/edit/{{ $data->id}}" class="btn btn-sm btn-warning">Edit</a>
                <form action="/benang/delete/{{$data->id}}" method="POST" class="d-inline">
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