<?php

namespace Database\Seeders;

use App\Models\User;
use phpseclib3\Crypt\Hash;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt(12345678)
            ]
        ];


        foreach($users as $user)
        {
           $a = User::create($user);
           $a->syncRoles('Super Admin');
        }
    }
}
