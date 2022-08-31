<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\MesinTrxModel;

class MesinModel extends Model
{
    protected $table = 'tbl_mesin';
    protected $guarded = ['id'];

    public function mesintrxmodel()
    {
        return $this->hasMany(MesinTrxModel::class, 'id', 'mesin_id');
    }

    public function allData()
    {
        return DB::table('tbl_mesin')->orderBy('id', 'desc')->get();
    }

    public function addData($data)
    {
        DB::table('tbl_mesin')->insert($data);
    }

    public function detailData($id)
    {
        return DB::table('tbl_mesin')->where('id', $id)->first();
    }

    public function updateData($id, $data)
    {
        DB::table('tbl_mesin')
            ->where('id', $id)
            ->update($data);
    }

    public function deleteData($id)
    {
        DB::table('tbl_mesin')
            ->where('id', $id)
            ->delete();
    }

    public function deleteProduksi($produksi_id)
    {
        DB::table('tbl_mesin')
            ->where('produksi_id', $produksi_id)
            ->delete();
    }
}
