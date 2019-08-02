<?php

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
        // $this->call(UsersTableSeeder::class);
        $this->call(CompaniesTableSeeder::class);
        $this->call(CatersTableSeeder::class);
        $this->call(BreakfastsTableSeeder::class);
        $this->call(LunchesTableSeeder::class);
        $this->call(DinnersTableSeeder::class);
    }
}
