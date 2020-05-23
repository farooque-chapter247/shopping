<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Chapter247 Admin',
            'email' => 'admin@chapter247.com',
            'password' => bcrypt('password'),
        ]);

        $user->assignRole('super-admin');

        $user = User::create([
            'name' => 'testing',
            'email' => 'test@chapter247.com',
            'password' => bcrypt('password'),
        ]);

        $user->assignRole('customer');
    }
}
