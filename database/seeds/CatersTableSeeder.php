<?php

use Illuminate\Database\Seeder;

class CatersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Cater::class,10)->create();
    }
}
