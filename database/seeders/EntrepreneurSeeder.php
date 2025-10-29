<?php
namespace Database\Seeders;

use App\Models\User;
use App\Models\EntrepreneurProfile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class EntrepreneurSeeder extends Seeder
{
    public function run(): void
    {
        $entrepreneurs = [
            [
                'user' => [
                    'name' => 'TechCorp Solutions',
                    'email' => 'hr@techcorp.com',
                    'password' => Hash::make('password'),
                    'role' => 'entrepreneur',
                    'email_verified_at' => now(),
                ],
                'profile' => [
                    'company_name' => 'TechCorp Solutions',
                    'company_description' => 'Leading software development company specializing in web applications, mobile apps, and cloud solutions. We work with startups and enterprises to build innovative digital products.',
                    'website' => 'https://techcorp-solutions.com',
                    'phone' => '+1-555-0101',
                    'address' => '123 Innovation Drive',
                    'city' => 'San Francisco, CA',
                ]
            ],
            [
                'user' => [
                    'name' => 'Green Valley Hospital',
                    'email' => 'jobs@greenvalley.health',
                    'password' => Hash::make('password'),
                    'role' => 'entrepreneur',
                    'email_verified_at' => now(),
                ],
                'profile' => [
                    'company_name' => 'Green Valley Hospital',
                    'company_description' => 'A 300-bed community hospital providing comprehensive healthcare services. We are committed to excellence in patient care and medical innovation.',
                    'website' => 'https://greenvalley.health',
                    'phone' => '+1-555-0202',
                    'address' => '456 Medical Plaza',
                    'city' => 'Austin, TX',
                ]
            ],
            [
                'user' => [
                    'name' => 'Bella Vista Restaurant Group',
                    'email' => 'careers@bellavista.com',
                    'password' => Hash::make('password'),
                    'role' => 'entrepreneur',
                    'email_verified_at' => now(),
                ],
                'profile' => [
                    'company_name' => 'Bella Vista Restaurant Group',
                    'company_description' => 'Premium dining experiences across multiple locations. We operate fine dining restaurants, casual cafes, and catering services with a focus on fresh, local ingredients.',
                    'website' => 'https://bellavista.com',
                    'phone' => '+1-555-0303',
                    'address' => '789 Culinary Street',
                    'city' => 'New York, NY',
                ]
            ],
            [
                'user' => [
                    'name' => 'EduBright Academy',
                    'email' => 'hr@edubright.edu',
                    'password' => Hash::make('password'),
                    'role' => 'entrepreneur',
                    'email_verified_at' => now(),
                ],
                'profile' => [
                    'company_name' => 'EduBright Academy',
                    'company_description' => 'Progressive private school serving K-12 students with innovative teaching methods and technology integration. We foster creativity, critical thinking, and global citizenship.',
                    'website' => 'https://edubright.edu',
                    'phone' => '+1-555-0404',
                    'address' => '321 Education Boulevard',
                    'city' => 'Denver, CO',
                ]
            ],
            [
                'user' => [
                    'name' => 'FinanceFirst Bank',
                    'email' => 'recruiting@financefirst.com',
                    'password' => Hash::make('password'),
                    'role' => 'entrepreneur',
                    'email_verified_at' => now(),
                ],
                'profile' => [
                    'company_name' => 'FinanceFirst Bank',
                    'company_description' => 'Regional bank offering personal and business banking, investment services, and financial planning. We pride ourselves on personalized service and community involvement.',
                    'website' => 'https://financefirst.com',
                    'phone' => '+1-555-0505',
                    'address' => '654 Banking Center',
                    'city' => 'Chicago, IL',
                ]
            ],
            [
                'user' => [
                    'name' => 'BuildRight Construction',
                    'email' => 'jobs@buildright.com',
                    'password' => Hash::make('password'),
                    'role' => 'entrepreneur',
                    'email_verified_at' => now(),
                ],
                'profile' => [
                    'company_name' => 'BuildRight Construction',
                    'company_description' => 'Full-service construction company specializing in residential and commercial projects. From custom homes to office buildings, we deliver quality construction on time and on budget.',
                    'website' => 'https://buildright.com',
                    'phone' => '+1-555-0606',
                    'address' => '987 Construction Way',
                    'city' => 'Phoenix, AZ',
                ]
            ]
        ];

        foreach ($entrepreneurs as $entrepreneur) {
            $user = User::firstOrCreate(
                ['email' => $entrepreneur['user']['email']],
                $entrepreneur['user']
            );

            EntrepreneurProfile::firstOrCreate(
                ['user_id' => $user->id],
                array_merge($entrepreneur['profile'], ['user_id' => $user->id])
            );
        }
    }
}
