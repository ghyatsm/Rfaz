<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TblUserTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tbl_user')->delete();
        
        \DB::table('tbl_user')->insert(array (
            0 => 
            array (
                'id' => 1,
                'username' => 'fachri',
                'realname' => 'fachri',
                'password' => '8fa14cdd754f91cc6554c9e71929cce7',
                'role' => 'keuangan',
                'created_at' => '2022-07-17 17:55:12',
                'updated_at' => '2022-07-20 15:43:11',
            ),
            1 => 
            array (
                'id' => 10,
                'username' => 'abaz',
                'realname' => 'Abd. Aziz',
                'password' => '8fa14cdd754f91cc6554c9e71929cce7',
                'role' => 'admin',
                'created_at' => '2022-07-18 11:25:22',
                'updated_at' => '2022-07-20 15:43:23',
            ),
            2 => 
            array (
                'id' => 12,
                'username' => 'ghiyats',
                'realname' => 'm. ghiyats',
                'password' => '8fa14cdd754f91cc6554c9e71929cce7',
                'role' => 'penjualan',
                'created_at' => '2022-07-19 09:19:43',
                'updated_at' => '2022-07-19 09:19:43',
            ),
            3 => 
            array (
                'id' => 13,
                'username' => 'ziyan',
                'realname' => 'z. nafisa',
                'password' => '8fa14cdd754f91cc6554c9e71929cce7',
                'role' => 'produksi',
                'created_at' => '2022-07-19 14:13:24',
                'updated_at' => '2022-07-19 14:13:24',
            ),
        ));
        
        
    }
}