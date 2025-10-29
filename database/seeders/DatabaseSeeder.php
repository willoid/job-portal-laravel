<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            BranchSeeder::class,
            AdminSeeder::class,
            EntrepreneurSeeder::class,
            JobOfferSeeder::class,
        ]);
    }
}
