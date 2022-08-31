@extends('layout.v_template')
@section('title', 'Edit Data Produksi')
@section('content')
<form action="/produksi/update/{{ $produksi->id }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="content">

        <div class="form-row">
            <div class="form-group col-md-2">
                <label>Tanggal Masuk Benang</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="date" name="tgl_masuk_benang" class="form-control @error('tgl_masuk_benang') is-invalid @enderror" data-inputmask-inputformat="dd/mm/yyyy" data-mask value="{{ $produksi->tgl_masuk_benang }}">
                    <div class="invalid-feedback">
                        @error('tgl_masuk_benang')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group col-md-2">
                <label>Jumlah Benang Masuk [Kg]</label>
                <input id="jumlah_benang" name="jumlah_benang" class="form-control @error('jumlah_benang') is-invalid @enderror" value="{{ $produksi->jumlah_benang }}">
                <div class="invalid-feedback">
                    @error('jumlah_benang')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2">
                <label>Tanggal Mulai</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input id="tgl_mulai" type="date" name="tgl_mulai" class="form-control @error('tgl_mulai') is-invalid @enderror" data-inputmask-inputformat="dd/mm/yyyy" data-mask value="{{ $produksi->tgl_mulai }}">
                    <div class="invalid-feedback">
                        @error('tgl_mulai')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group col-md-2">
                <label>Tanggal Selesai</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input id="tgl_selesai" type="date" name="tgl_selesai" class="form-control @error('tgl_selesai') is-invalid @enderror" data-inputmask-inputformat="dd/mm/yyyy" data-mask value="{{ $produksi->tgl_selesai }}">
                    <div class="invalid-feedback">
                        @error('tgl_selesai')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <label>Mesin Digunakan</label>
        <br>
        <table border="0">

            <?php
            $cnt = intval($mesin->count() / 4);
            $rest = fmod($mesin->count(), 4);
            if ($rest > 0) {
                $cnt = $cnt + 1;
            }
            for ($i = 0; $i < $cnt; $i++) {
                echo "<tr>";
                $speed = 0;
                for ($j = 0; $j < 4; $j++) {
                    $idx = $i * 4 + $j;
                    if ($idx < $mesin->count()) {
                        $checked = "";
                        foreach ($mesin_trx as $trx) {
                            if ($trx->mesin_id == $mesin[$idx]["mesin_id"]) {
                                $checked = "checked";
                                $speed = $speed + intval($mesin[$idx]["kecepatan"]);
                            };
                            $benang = $produksi->jumlah_benang;
                        }
            ?>
                        <td width="250"><input id="{{ $mesin[$idx]['kecepatan'] }}" type="checkbox" name="mesin[{{ $idx }}]" value="{{ $mesin[$idx]['mesin_id'] }}" {{ $checked }} onclick="myFunction()"> {{ $mesin[$idx]["kode_mesin"] }} ({{ $mesin[$idx]["kecepatan"] }} kg/hari)</td>
            <?php
                    } else {
                        echo "  <td></td>";
                    }
                }

                echo "</tr>";
            }
            if ($speed == 0) {
                $estimasi = 0;
            } else {
                $estimasi = ceil($produksi->jumlah_benang / $speed);
            }
            echo "<tr><td colspan=4><label id=estimasi>Estimasi lama produksi : " . $estimasi . " hari</label></td></tr>";
            ?>
        </table>

        <br>

        <div class="form-row">
            <div class="form-group col-md-2">
                <label>Jumlah Produksi Kain [m]</label>
                <input name="jumlah_produk" class="form-control @error('jumlah_produk') is-invalid @enderror" value="{{ $produksi->jumlah_produk }}">
                <div class="invalid-feedback">
                    @error('jumlah_produk')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>

        <br>

        <div class="col-sm 12">
            <div class="form-group">
                <button class="btn btn-primary"> Simpan </button>
                <a class="btn btn-primary" href="/produksi" role="button">&nbsp;&nbsp;&nbsp;Batal&nbsp;&nbsp;&nbsp;</a>
            </div>
        </div>
</form>

<script>
    function myFunction() {

        let checked = document.querySelectorAll('input[type="checkbox"]:checked');
        let benang = document.getElementById("jumlah_benang").value;
        let speed = 0;
        for (let i = 0; i < (checked.length - 1); i++) {
            speed = speed + parseInt(checked[i].id);
        }

        let estimasi = 0;
        if (speed == 0) {
            estimasi = 0;
        } else {
            estimasi = Math.ceil(benang / speed);
        }
        let tglmulai = document.getElementById("tgl_mulai").value;
        var result = new Date(tglmulai);
        result.setDate(result.getDate() + estimasi);
        document.getElementById("estimasi").innerHTML = "Estimasi selesai produksi : " + estimasi + " hari (" + result.getDate() + "/" + (result.getMonth() + 1) + "/" + result.getFullYear() + ")";

    }
</script>
@endsection