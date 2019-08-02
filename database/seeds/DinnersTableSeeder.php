<?php

use Illuminate\Database\Seeder;

class DinnersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         factory(\App\Dinner::class,10)->create();
    }
}
