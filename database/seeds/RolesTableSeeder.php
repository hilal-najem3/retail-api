<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$roles = [
    		['name' => 'Super Admin'],
    		['name' => 'Admin'],
    		['name' => 'Manager'],
    		['name' => 'Cashier']
    	];

    	foreach ($roles as $role) {
    		DB::table('roles')->insert($role);
    	}
    }
}
