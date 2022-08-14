<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class DetailbayarModel extends Model
{
    protected $table = 'tbl_detailbayar';
    protected $guarded = [];


    public function allData($pesanan_id)
    {
        return DB::table('tbl_detailbayar')->where('pesanan_id', $pesanan_id)->get();
    }

    public function detailData($id)
    {
        return DB::table('tbl_detailbayar')->where('id', $id)->first();
    }

    public function addData($data)
    {
        DB::table('tbl_detailbayar')->insert($data);
    }

    public function editData($id, $data)
    {
        DB::table('tbl_detailbayar')
            ->where('id', $id)
            ->update($data);
    }

    public function deleteData($id)
    {
        DB::table('tbl_detailbayar')
            ->where('id', $id)
            ->delete();
    }

    public function updateData($id, $data)
    {
        DB::table('tbl_detailbayar')
            ->where('id', $id)
            ->update($data);
    }

    public function getTglBayarAttribute()
    {
        return Carbon::parse($this->attributes['tgl_bayar'])->isoFormat('DD MMM Y');
    }
}
