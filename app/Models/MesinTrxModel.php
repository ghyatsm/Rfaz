<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class MesinTrxModel extends Model
{
    protected $table = 'tbl_mesin_trx';
    protected $guarded = ['id'];

    public function mesinmodel()
    {
        return $this->belongsTo(MesinModel::class, 'mesin_id');
    }

    public function allData()
    {
        return DB::table('tbl_mesin_trx')->orderBy('id', 'desc')->get();
    }

    public function addData($data)
    {
        DB::table('tbl_mesin_trx')->insert($data);
    }

    public function detailData($id)
    {
        return DB::table('tbl_mesin_trx')->where('id', $id)->first();
    }

    public function updateData($id, $data)
    {
        DB::table('tbl_mesin_trx')
            ->where('produksi_id', $id)
            ->update($data);
    }

    public function deleteData($id)
    {
        DB::table('tbl_mesin_trx')
            ->where('id', $id)
            ->delete();
    }

    public function deleteProduksi($produksi_id)
    {
        DB::table('tbl_mesin_trx')
            ->where('produksi_id', $produksi_id)
            ->delete();
    }
}
