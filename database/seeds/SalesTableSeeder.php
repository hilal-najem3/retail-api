<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sales = [
            ['percentage' => 0],
    		['percentage' => 5], ['percentage' => 10], ['percentage' => 15], ['percentage' => 20],
    		['percentage' => 25], ['percentage' => 30], ['percentage' => 35], ['percentage' => 40],
    	];

        DB::table('sales')->insert($sales);
    }
}
