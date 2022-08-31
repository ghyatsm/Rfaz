<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ProduksiModel extends Model
{
    protected $table = 'tbl_produksi';
    protected $guarded = ['id'];

    public function pesananmodel()
    {
        return $this->belongsTo(PesananModel::class, 'kode_pesanan', 'kode_pesanan');
    }


    public function allData()
    {
        return DB::table('tbl_produksi')->get();
    }

    public function addData($data)
    {
        DB::table('tbl_produksi')->insert($data);
    }

    public function detailData($id)
    {
        return DB::table('tbl_produksi')->where('id', $id)->first();
    }

    public function updateData($id, $data)
    {
        DB::table('tbl_produksi')
            ->where('id', $id)
            ->update($data);
    }

    public function deleteData($id)
    {
        DB::table('tbl_produksi')
            ->where('id', $id)
            ->delete();
    }

    public function getTglSelesaiAttribute()
    {
        if ($this->attributes['tgl_selesai'] != null) {
            return Carbon::parse($this->attributes['tgl_selesai'])->isoFormat('DD MMM Y');
        }
    }

    public function getTglMulaiAttribute()
    {
        if ($this->attributes['tgl_mulai'] != null) {
            return Carbon::parse($this->attributes['tgl_mulai'])->isoFormat('DD MMM Y');
        }
    }
}
