<?php

use Illuminate\Database\Seeder;

class LunchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(\App\Lunch::class,10)->create();
    }
}
