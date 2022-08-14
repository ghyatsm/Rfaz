<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TblPesananTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tbl_pesanan')->delete();
        
        \DB::table('tbl_pesanan')->insert(array (
            0 => 
            array (
                'id' => 1,
                'kode_pesanan' => '140272',
                'pelanggan_id' => 1,
                'benang_id' => 1,
                'berat_bahan' => '10',
                'tanggal_mulai' => '2022-08-14',
                'tanggal_selesai' => '2022-08-15',
                'harga_awal' => 166667,
                'harga_final' => 150000,
                'status' => 'Closed',
                'isLunas' => NULL,
                'created_at' => '2022-08-14 19:31:12',
                'updated_at' => '2022-08-14 19:31:42',
            ),
        ));
        
        
    }
}