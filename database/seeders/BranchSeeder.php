<?php
namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BranchSeeder extends Seeder
{
    public function run(): void
    {
        $branches = [
            'Information Technology',
            'Education',
            'Gastronomy',
            'Healthcare',
            'Finance',
            'Marketing',
            'Sales',
            'Human Resources',
            'Engineering',
            'Design',
            'Customer Service',
            'Logistics',
            'Construction',
            'Manufacturing',
            'Legal',
        ];

        foreach ($branches as $branch) {
            Branch::create([
                'name' => $branch,
                'slug' => Str::slug($branch),
            ]);
        }
    }
}
