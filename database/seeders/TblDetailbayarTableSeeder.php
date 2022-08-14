<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TblDetailbayarTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tbl_detailbayar')->delete();
        
        \DB::table('tbl_detailbayar')->insert(array (
            0 => 
            array (
                'id' => 1,
                'pesanan_id' => 1,
                'tgl_bayar' => '2022-08-18',
                'cara_bayar' => 'Tunai',
                'jumlah_bayar' => 75000,
                'bank' => NULL,
                'keterangan' => NULL,
                'created_at' => '2022-08-14 19:32:09',
                'updated_at' => '2022-08-14 19:32:09',
            ),
            1 => 
            array (
                'id' => 2,
                'pesanan_id' => 1,
                'tgl_bayar' => '2022-08-20',
                'cara_bayar' => 'Tunai',
                'jumlah_bayar' => 75000,
                'bank' => NULL,
                'keterangan' => NULL,
                'created_at' => '2022-08-14 19:32:23',
                'updated_at' => '2022-08-14 19:32:23',
            ),
        ));
        
        
    }
}