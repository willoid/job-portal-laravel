<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $admins = [
            [
                'name' => 'admin1',
                'email' => 'willoid.webdev+admin1@gmail.com',
                'password' => Hash::make('Iam4dm1n!'),
                'role' => 'admin',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'admin2',
                'email' => 'willoid.webdev+admin2@gmail.com',
                'password' => Hash::make('Iam4dm1n!'),
                'role' => 'admin',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'admin3',
                'email' => 'willoid.webdev+admin3@gmail.com',
                'password' => Hash::make('Iam4dm1n!'),
                'role' => 'admin',
                'email_verified_at' => now(),
            ],
        ];

        foreach ($admins as $admin) {
            User::firstOrCreate(
                ['email' => $admin['email']],
                $admin
            );
        }
    }
}
