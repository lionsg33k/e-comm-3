<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\UserHasRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $user = User::create([
            "name" => "Mehdi",
            "email" => "admin@gmail.com",
            "password" => Hash::make("admin@gmail.com")
        ]);

        $role = Role::where("name", "admin")->first();

        $user->roles()->attach($role);
    }
}
