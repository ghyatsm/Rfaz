@extends('layout.v_template')

@section('title', 'Mesin')
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
<a href="/mesin/add" class="btn btn-info btn-sm"> Tambah Data Mesin </a> <br></br>

<table id="customers" class="table table-bordered">
    <tr>
        <th width="40">No</th>
        <th width="220">Kode Mesin</th>
        <th width="300">Merek Mesin</th>
        <th width="200">Kapasitas [Kg/Hari]</th>
        <th>Status</th>
        <th width="130">Action</th>
    </tr>

    <tbody>
        <?php $no = 1; ?>
        @foreach ($mesin as $data)
        <tr>
            <td> {{ $no++ }} </td>
            <td style="text-align:left;"> {{ $data->kode_mesin }} </td>
            <td style="text-align:left;"> {{ $data->merek_mesin }} </td>
            <td style="text-align:left;"> {{ $data->kecepatan }} </td>
            <td style="text-align:left;"> {{ $data->status }} </td>
            <td>
                <!-- <a href="/pesanan/detail/{{ $data->id }}" class="btn btn-sm btn-success">Detail</a> -->
                <a href="/mesin/edit/{{ $data->id}}" class="btn btn-sm btn-warning">Edit</a>
                <form action="/mesin/delete/{{$data->id}}" method="POST" class="d-inline">
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