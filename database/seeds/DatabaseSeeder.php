<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS=FALSE');
        $this->call(RoleSeeder::class);
        $this->call(EtatSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(EventSeeder::class);
    }
}
