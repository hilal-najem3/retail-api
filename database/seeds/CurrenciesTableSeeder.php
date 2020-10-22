<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currencies = [
    		['name' => "Lebanese Lyre", 'symbol' => 'LL.'], 
    		['name' => "American Dollars", 'symbol' => '$'],
    	];

        DB::table('currencies')->insert($currencies);
    }
}
