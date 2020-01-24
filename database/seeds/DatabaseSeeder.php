<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name'=>'AdminUser',
            'email'=>'admin@admin.com',
            'password'=>bcrypt('4Dm1n'),
        ]);

        $role = [
            'name'=>'AdminRole',
        ];


        $admin->roles()->create($role);

    }
}
