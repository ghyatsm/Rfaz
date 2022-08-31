@extends('layout.v_template')

@section('title', 'Jadwal Mesin')
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

<table id="customers" class="table table-bordered">
    <tr>
        <th width="40">No</th>
        <th width="150">Kode Mesin</th>
        <th width="150">Status</th>
        <th>Jadwal</th>
    </tr>
    <tbody>
        <?php $no = 1; ?>
        @foreach ($collection as $data)
        <tr>
            <td> {{ $no++ }} </td>
            <td style="text-align:left;"> {{ $data["kode_mesin"] }}</td>
            <td style="text-align:left;"> {{ $data["status"] }} </td>
            <td>
                <table>
                    <tr>
                        <?php
                        $mydate = now();
                        for ($i = 0; $i < 31; $i++) {
                            $tgl_selesai = date_create($data["tgl_selesai"]);
                            $tgl_selesai = date_add($tgl_selesai, date_interval_create_from_date_string("1 days"));
                            if (isset($data["tgl_mulai"])) {
                                if (($mydate >= $data["tgl_mulai"]) and ($mydate <= $tgl_selesai)) {
                                    echo "<td width=30 bgcolor=red>" . date_format($mydate, 'j') . "</td>";
                                } else {
                                    echo "<td width=30>" . date_format($mydate, 'j') . "</td>";
                                }
                            } else {
                                echo "<td width=30>" . date_format($mydate, 'j') . "</td>";
                            }
                            $mydate = date_add($mydate, date_interval_create_from_date_string("1 days"));
                        }
                        ?>
                    </tr>
                </table>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>


@endsection