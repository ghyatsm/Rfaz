<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TblProfilTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tbl_profil')->delete();
        
        \DB::table('tbl_profil')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama_perusahaan' => 'universitas komputer indonesia',
                'nama_kontak' => 'Fuad',
                'alamat2' => 'Bandung',
                'no_hp' => '0111234',
                'created_at' => '2022-08-14 19:30:48',
                'updated_at' => '2022-08-14 19:30:48',
            ),
        ));
        
        
    }
}