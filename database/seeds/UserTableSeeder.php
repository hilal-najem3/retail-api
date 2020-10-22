<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Date;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => "Hilal",
            'last_name' => "Najem",
            'email' => 'hilal@gmail.com',
            'password' => Hash::make('hilal123'),
            'email_verified_at' => $this->freshTimestamp(),
            'created_at' => $this->freshTimestamp(),
            'updated_at' => $this->freshTimestamp(),
        ]);
    }

    /**
     * Get a fresh timestamp for the model.
     *
     * @return \Illuminate\Support\Carbon
     */
    public function freshTimestamp()
    {
        return Date::now();
    }
}
