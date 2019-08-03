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
        factory(\App\cater::class,5)->create();
    }
}
