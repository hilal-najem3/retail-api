<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
use App\RoleUser;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::first();

        $role = Role::first();

        RoleUser::create([
        	'user_id' => $user->id,
        	'role_id' => $role->id
        ]);
    }
}
