<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class BenangModel extends Model
{
    protected $table = 'tbl_benang';
    protected $guarded = ['id'];

    public function pesananmodel()
    {
        return $this->hasMany(PesananModel::class);
    }

    public function getKode_BenangAttribute()
    {
        return Carbon::parse($this->attributes['kode_benang']);
    }

    public function getNama_BenangAttribute()
    {
        return Carbon::parse($this->attributes['nama_benang']);
    }

    public function getHarga_BenangAttribute()
    {
        return Carbon::parse($this->attributes['harga_benang']);
    }


    public function allData()
    {
        return DB::table('tbl_benang')->orderBy('nama_benang', 'asc')->get();
    }

    public function addData($data)
    {
        DB::table('tbl_benang')->insert($data);
    }

    public function detailData($id)
    {
        return DB::table('tbl_benang')->where('id', $id)->first();
    }

    public function updateData($id, $data)
    {
        DB::table('tbl_benang')
            ->where('id', $id)
            ->update($data);
    }

    public function deleteData($id)
    {
        DB::table('tbl_benang')
            ->where('id', $id)
            ->delete();
    }
}
