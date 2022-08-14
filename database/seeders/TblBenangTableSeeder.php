<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TblBenangTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tbl_benang')->delete();
        
        \DB::table('tbl_benang')->insert(array (
            0 => 
            array (
                'id' => 1,
                'kode_benang' => 'POLI',
                'nama_benang' => 'poly',
                'harga_benang' => 10000,
                'created_at' => '2022-08-14 19:30:57',
                'updated_at' => '2022-08-14 19:30:57',
            ),
        ));
        
        
    }
}