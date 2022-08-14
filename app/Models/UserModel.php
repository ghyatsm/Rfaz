<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class UserModel extends Model
{
    protected $table = 'tbl_user';
    protected $guarded = ['id'];


    public function allData()
    {
        return DB::table('tbl_user')->get();
    }

    public function addData($data)
    {
        DB::table('tbl_user')->insert($data);
    }

    public function detailData($id)
    {
        return DB::table('tbl_user')->where('id', $id)->first();
    }

    public function updateData($id, $data)
    {
        DB::table('tbl_user')
            ->where('id', $id)
            ->update($data);
    }

    public function deleteData($id)
    {
        DB::table('tbl_user')
            ->where('id', $id)
            ->delete();
    }
    public function cekData($name, $pwd)
    {
        return DB::table('tbl_user')
            ->where('username', $name)
            ->where('password', md5($pwd));
    }
}
