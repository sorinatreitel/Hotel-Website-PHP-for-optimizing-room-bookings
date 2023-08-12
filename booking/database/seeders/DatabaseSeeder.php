<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $user = new User;
        $user->name = "Sorina Treitel";
        $user->email = "sorinatreitel2001@gmail.com";
        $user->password = bcrypt("Test123");
        $user->username = "soso";
        $user->userType = "admin";
        $user->save();
    }
}
