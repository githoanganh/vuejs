<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

        $user = User::create([
            'first_name' => 'anh',
            'last_name' => 'em',
            'nickname' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456')
        ]);
        $user->posts()->create([
            'title' => 'ok man',

        ]);
        $user->posts()->create([
            'title' => 'ok man 1',

        ]);
    }
}
