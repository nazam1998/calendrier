<?php

use Illuminate\Database\Seeder;

class EtatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('etats')->insert([
            [
                'etat' => 'Futur',
            ],
            [
                'etat' => 'En Cours',
            ],
            [
                'etat' => 'Terminé',
            ]
        ]);
    }
}
