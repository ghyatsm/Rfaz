<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class PesananModel extends Model
{
    protected $table = 'tbl_pesanan';
    protected $guarded = ['id'];

    public function profilmodel()
    {
        return $this->belongsTo(ProfilModel::class, 'pelanggan_id');
    }

    public function benangmodel()
    {
        return $this->belongsTo(BenangModel::class, 'benang_id');
    }

    public function getTanggalSelesaiAttribute()
    {
        return Carbon::parse($this->attributes['tanggal_selesai'])->isoFormat('DD MMM Y');
    }

    public function getTanggalMUlaiAttribute()
    {
        return Carbon::parse($this->attributes['tanggal_mulai'])->isoFormat('DD MMM Y');
    }

    public function allData()
    {
        return DB::table('tbl_pesanan')->orderBy('id', 'desc')->get();
    }

    public function detailData($id)
    {
        return DB::table('tbl_pesanan')->where('id', $id)->first();
    }

    public function addData($data)
    {
        DB::table('tbl_pesanan')->insert($data);
    }

    public function updateData($id, $data)
    {
        DB::table('tbl_pesanan')
            ->where('id', $id)
            ->update($data);
    }

    public function deleteData($id)
    {
        DB::table('tbl_pesanan')
            ->where('id', $id)
            ->delete();
    }
}
