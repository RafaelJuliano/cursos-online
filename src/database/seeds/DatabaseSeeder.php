<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@mail.com.br',
            'password' => bcrypt('admin'),
            'status' => 'active',
            'role' => 'admin'
        ]);
    }
}
