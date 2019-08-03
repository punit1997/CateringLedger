<?php

use Illuminate\Database\Seeder;

class BreakfastsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Breakfast::class,5)->create();
    }
}
