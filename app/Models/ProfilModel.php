<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\PesananModel;

class ProfilModel extends Model
{
    protected $table = 'tbl_profil';
    protected $guarded = ['id'];

    public function pesananmodel()
    {
        return $this->hasMany(PesananModel::class);
    }

    public function getNama_PerusahaanAttribute()
    {
        return Carbon::parse($this->attributes['nama_perusahaan']);
    }

    public function getNama_KontakAttribute()
    {
        return Carbon::parse($this->attributes['nama_kontak']);
    }

    public function getAlamatAttribute()
    {
        return Carbon::parse($this->attributes['alamat']);
    }

    public function getNo_HPAttribute()
    {
        return Carbon::parse($this->attributes['no_hp']);
    }

    public function allData()
    {
        return DB::table('tbl_profil')->orderBy('nama_perusahaan', 'asc')->get();
    }

    public function addData($data)
    {
        DB::table('tbl_profil')->insert($data);
    }

    public function detailData($id)
    {
        return DB::table('tbl_profil')->where('id', $id)->first();
    }

    public function updateData($id, $data)
    {
        DB::table('tbl_profil')
            ->where('id', $id)
            ->update($data);
    }

    public function deleteData($id)
    {
        DB::table('tbl_profil')
            ->where('id', $id)
            ->delete();
    }
}
