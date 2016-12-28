<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
             'name'     => 'Admin',
             'email'    => 'admin@gmail.com',
             'password' => Hash::make('admin@gmail.com' . 'admin123')
         ]);
    }
}
