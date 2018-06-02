<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            'name' => config('app.adminName'),
            'email' => config('app.adminEmail'),
            'password' => bcrypt(config('app.adminPassword')),
            'confirmed' => 1
        ]);

    }
}
