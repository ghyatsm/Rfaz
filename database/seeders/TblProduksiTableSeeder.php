<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TblProduksiTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tbl_produksi')->delete();
        
        \DB::table('tbl_produksi')->insert(array (
            0 => 
            array (
                'id' => 1,
                'kode_pesanan' => '140272',
                'tgl_masuk_benang' => '2022-08-14',
                'jumlah_benang' => '10',
                'tgl_mulai' => '2022-08-15',
                'tgl_selesai' => '2022-08-17',
                'jumlah_produk' => '15',
                'pesanan_id' => NULL,
                'created_at' => NULL,
                'updated_at' => '2022-08-14 19:31:39',
            ),
        ));
        
        
    }
}