@extends('layout.v_template')

@section('title', 'Produksi')
@section('content')

<style>
    #customers td,
    #customers th {
        border: 1px solid #ddd;
        padding: 4px;
        text-align: center;
    }

    #customers tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #customers tr:hover {
        background-color: #ddd;
    }

    #customers th {
        padding-top: 10px;
        padding-bottom: 10px;
        text-align: center;
        background-color: #04AA6D;
        color: white;
    }
</style>


@if (session('pesan'))

<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times; </button>
    <h4> <i class="icon fa fa-check"></i> Sukses!</h4>
    {{ session('pesan') }}.
</div>

@endif
<br>
<form action="/produksi/search" method="post">
    @csrf
    <table width=100% border="0">
        <tr height="50px">
            <td border="0" style="text-align:right;">
                <input name="kode_pesanan" type="text" placeholder="Masukan kode pesanan" style="border-radius:3px; font-size:10pt; height:30px;"></input>
            </td>
            <td border="0" style="text-align:right;" width="80px">
                <button type="submit" style="border-radius:3px; height:30px; font-size:10pt">&nbsp;&nbsp;Search&nbsp;&nbsp;
                </button>
            </td>
        </tr>
    </table>
</form>

<table id="customers" class="table table-bordered">
    <tr>
        <th style="text-align: center; vertical-align: middle;" rowspan="2" width="50">No</th>
        <th style="text-align: center; vertical-align: middle;" colspan="5">Pesanan</th>
        <th style="text-align: center; vertical-align: middle;" colspan="4" width="120">Produksi</th>
        <th style="text-align: center; vertical-align: middle;" rowspan="2" width="80">Status</th>
        <th style="text-align: center; vertical-align: middle;" rowspan="2" width="150">Action</th>

    </tr>
    <tr>
        <th style="text-align: center; vertical-align: middle;" width="80">Kode</th>
        <th style="text-align: center; vertical-align: middle;" width="220">Pemesan</th>
        <th style="text-align: center; vertical-align: middle;" width="180">Jenis Benang</th>
        <th style="text-align: center; vertical-align: middle;" width="120">Benang [Kg]</th>
        <th style="text-align: center; vertical-align: middle;" width="120">Target Selesai</th>
        <th style="text-align: center; vertical-align: middle;" width="120">Tgl. Mulai</th>
        <th style="text-align: center; vertical-align: middle;" width="120">Tgl. Selesai</th>
        <th style="text-align: center; vertical-align: middle;" width="80">Benang [kg]</th>
        <th style="text-align: center; vertical-align: middle;" width="80">Kain [m]</th>
    </tr>

    <tbody>
        <?php $no = 1; ?>
        @foreach ($produksi as $index => $data)
        <tr>
            <td> {{ $index + $produksi->firstItem() }} </td>
            <td> {{ $data->kode_pesanan }} </td>
            <td style="text-align:left;"> {{ $data->pesananmodel->profilmodel->nama_perusahaan  }}</td>
            <td style="text-align:left;"> {{ $data->pesananmodel->benangmodel->nama_benang }}</td>
            <td> {{ $data->pesananmodel->berat_bahan }} </td>
            <td> {{ $data->pesananmodel->tanggal_selesai }} </td>
            <td> {{ $data->tgl_mulai }} </td>
            <td> {{ $data->tgl_selesai }} </td>
            <td> {{ $data->jumlah_benang }} </td>
            <td> {{ $data->jumlah_produk }} </td>
            <td> {{ $data->pesananmodel->status }} </td>
            <td>
                <?php
                $set_status = ($data->pesananmodel->status == 'Siap' ? 'Proses' : ($data->pesananmodel->status == 'Proses' ? 'Selesai' : ($data->pesananmodel->status == 'Selesai' ? 'Disabled' : 'Disabled')));

                $set_disable = '';
                if ($set_status == 'Disabled') {
                    $set_disable = 'disabled';
                }

                $disable = ($data->pesananmodel->status == 'Closed' ? 'disabled' : '') ?>

                <form action="/produksi/edit/{{ $data->id }}" class="d-inline">
                    <button class="btn btn-sm btn-warning" {{ $disable }}> Edit </button>
                </form>
                <form action="/produksi/update/{{$data->pesananmodel->id}}" method="POST" class="d-inline">
                    @csrf
                    <input type="hidden" name="harga_benang" value="{{ $data->pesananmodel->benangmodel->harga_benang }}">
                    <input type="hidden" name="jumlah_produk" value="{{ $data->jumlah_produk }}">
                    <input type="hidden" name="produksi_id" value="{{ $data->id }}">
                    <button {{ $set_disable }} name="status" value="{{ $set_status }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">{{ $set_status }}</button>
                </form>

            </td>
        </tr>
        @endforeach

    </tbody>
</table>
{{ $produksi->links() }}
@endsection

<script>
    function validate() {

        alarm(document.getElementById("pesanan_id").value);

    }
</script>