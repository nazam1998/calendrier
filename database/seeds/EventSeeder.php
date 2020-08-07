<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->truncate();
        DB::table('events')->insert([
            [
                'start' => Carbon::now(),
                'end' => Carbon::now(),
                'title' => 'Hello World',
                'valide' => true,
                'user_id' => App\User::inRandomOrder()->first()->id,
            ],
        ]);
    }
}
