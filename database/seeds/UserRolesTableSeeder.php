<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
use App\UserRole;

class UserRolesTableSeeder extends Seeder
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

        UserRole::create([
        	'user_id' => $user->id,
        	'role_id' => $role->id
        ]);
    }
}
