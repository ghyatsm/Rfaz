<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        
        $this->call(TblUserTableSeeder::class);
        $this->call(TblProfilTableSeeder::class);
        $this->call(TblBenangTableSeeder::class);
        $this->call(TblPesananTableSeeder::class);
        $this->call(TblProduksiTableSeeder::class);
        $this->call(TblDetailbayarTableSeeder::class);
        
        $this->call(MigrationsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(FailedJobsTableSeeder::class);
        $this->call(PasswordResetsTableSeeder::class);
        $this->call(PersonalAccessTokensTableSeeder::class);
    }
}
