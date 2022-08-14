@extends('layout.v_template')

@section('title', 'Pengguna')
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
<a href="/user/add" class="btn btn-info btn-sm"> Tambah Data User </a> <br></br>

<table id="customers" class="table table-bordered">
    <thead>
        <tr>
            <th width="40">No</th>
            <th width="120">Username</th>
            <th width="180">Realname</th>
            <th width="100">Role</th>
            <th>Password</th>
            <th width="250">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        @foreach ($users as $data)
        <tr>
            <td> {{ $no++ }} </td>
            <td style="text-align: left;"> {{ $data->username }} </td>
            <td style="text-align: left;"> {{ $data->realname }} </td>
            <td style="text-align: left;"> {{ $data->role }} </td>
            <td style="text-align: left;"> {{ $data->password }} </td>
            <td>
                <a href="/user/edit/{{ $data->id}}" class="btn btn-sm btn-warning">Edit</a>
                <form action="/user/delete/{{$data->id}}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-sm btn-danger" onclick="return confirm('are you sure')"> Delete </button>
                </form>
                <form action="/user/editpassword/{{$data->id}}" method="GET" class="d-inline">
                    <button class="btn btn-sm btn-danger"> Ubah Password </button>
                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>


@endsection