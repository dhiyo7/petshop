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
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            'avatar' => 'default.png',
            'name' => "Administrator",
            'email' => "admin@gmail.com",
            'password' => bcrypt('12345678'),
        ]);
    }
}
