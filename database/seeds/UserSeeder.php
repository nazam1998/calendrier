<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Nazam',
                'email' => 'nazamfr1998@gmail.com',
                'password' => Hash::make('Nazam1998'),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'role_id' => 1,
            ]
        ]);
    }
}
