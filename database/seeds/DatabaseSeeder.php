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
        factory(\App\User::class)->create([
            'name' => 'John Doe',
            'email' => 'john@doe.com'
        ]);

        factory(\App\User::class)->create([
            'name' => 'Jane Doe',
            'email' => 'jane@doe.com'
        ]);

        factory(\App\User::class)->create([
            'name' => 'Mario Waelchi',
            'email' => 'mario@waelchi.com'
        ]);
    }
}
