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
        $this->call([
            CurrenciesTableSeeder::class,
            SalesTableSeeder::class,
            ImageTypesTableSeeder::class,
    		UserTableSeeder::class,
    		RolesTableSeeder::class,
            UserRolesTableSeeder::class,
    	]);
    }
}
