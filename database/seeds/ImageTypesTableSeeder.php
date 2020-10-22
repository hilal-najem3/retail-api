<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ImageTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $image_types = [
    		['name' => "Thumbnail"],
    		['name' => "Collection"],
    	];

        DB::table('image_types')->insert($image_types);
    }
}
