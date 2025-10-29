<?php
namespace Database\Seeders;

use App\Models\User;
use App\Models\Branch;
use App\Models\JobOffer;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class JobOfferSeeder extends Seeder
{
    public function run(): void
    {
        $entrepreneurs = User::where('role', 'entrepreneur')->with('entrepreneurProfile')->get();
        $branches = Branch::all();

        $jobs = [
            // TechCorp Solutions jobs
            [
                'company' => 'TechCorp Solutions',
                'title' => 'Senior Full Stack Developer',
                'branch' => 'Information Technology',
                'description' => 'We are looking for an experienced Full Stack Developer to join our growing team. You will be responsible for developing and maintaining web applications using modern technologies like React, Node.js, and PostgreSQL.

Key Responsibilities:
- Develop responsive web applications
- Collaborate with designers and product managers
- Write clean, maintainable code
- Participate in code reviews and team meetings
- Mentor junior developers',
                'location' => 'San Francisco, CA (Hybrid)',
                'employment_type' => 'full_time',
                'salary_min' => 120000,
                'salary_max' => 160000,
                'requirements' => '• 5+ years of experience in full stack development
• Proficiency in JavaScript, React, Node.js
• Experience with SQL databases
• Knowledge of Git and agile methodologies
• Strong problem-solving skills
• Bachelor\'s degree in Computer Science or equivalent experience',
                'deadline' => Carbon::now()->addDays(30),
            ],
            [
                'company' => 'TechCorp Solutions',
                'title' => 'DevOps Engineer',
                'branch' => 'Information Technology',
                'description' => 'Join our infrastructure team as a DevOps Engineer and help scale our cloud-based applications. You will work with AWS, Docker, Kubernetes, and CI/CD pipelines.

Responsibilities:
- Manage AWS infrastructure
- Implement automated deployment pipelines
- Monitor application performance
- Ensure security best practices
- Collaborate with development teams',
                'location' => 'San Francisco, CA (Remote)',
                'employment_type' => 'full_time',
                'salary_min' => 130000,
                'salary_max' => 170000,
                'requirements' => '• 4+ years of DevOps experience
• AWS certification preferred
• Experience with Docker and Kubernetes
• Knowledge of Infrastructure as Code (Terraform)
• Strong scripting skills (Python, Bash)
• Experience with monitoring tools',
                'deadline' => Carbon::now()->addDays(25),
            ],
            // Green Valley Hospital jobs
            [
                'company' => 'Green Valley Hospital',
                'title' => 'Registered Nurse - ICU',
                'branch' => 'Healthcare',
                'description' => 'We are seeking a dedicated Registered Nurse to join our Intensive Care Unit. This is an excellent opportunity for an experienced RN who thrives in a fast-paced, critical care environment.

What We Offer:
- Competitive salary and benefits
- Continuing education opportunities
- State-of-the-art facilities
- Supportive team environment
- Career advancement opportunities',
                'location' => 'Austin, TX',
                'employment_type' => 'full_time',
                'salary_min' => 75000,
                'salary_max' => 95000,
                'requirements' => '• Current RN license in Texas
• BSN preferred
• 2+ years of ICU experience
• BLS and ACLS certification
• Strong critical thinking skills
• Excellent communication abilities',
                'deadline' => Carbon::now()->addDays(20),
            ],
            [
                'company' => 'Green Valley Hospital',
                'title' => 'Medical Laboratory Technician',
                'branch' => 'Healthcare',
                'description' => 'Join our laboratory team as a Medical Laboratory Technician. You will perform various laboratory tests and procedures to assist in patient diagnosis and treatment.

Key Duties:
- Perform routine laboratory tests
- Maintain laboratory equipment
- Follow safety protocols
- Document test results accurately
- Assist with quality control measures',
                'location' => 'Austin, TX',
                'employment_type' => 'full_time',
                'salary_min' => 45000,
                'salary_max' => 55000,
                'requirements' => '• Associate degree in Medical Laboratory Technology
• ASCP certification preferred
• Knowledge of laboratory procedures
• Attention to detail
• Ability to work in a team environment',
                'deadline' => Carbon::now()->addDays(15),
            ],
            // Bella Vista Restaurant Group jobs
            [
                'company' => 'Bella Vista Restaurant Group',
                'title' => 'Executive Chef',
                'branch' => 'Gastronomy',
                'description' => 'We are seeking a talented Executive Chef to lead our flagship restaurant kitchen. You will be responsible for menu development, kitchen operations, and team leadership.

Responsibilities:
- Create innovative menus
- Manage kitchen staff and operations
- Ensure food quality and safety standards
- Control food costs and inventory
- Train and develop culinary team',
                'location' => 'New York, NY',
                'employment_type' => 'full_time',
                'salary_min' => 85000,
                'salary_max' => 110000,
                'requirements' => '• 8+ years of culinary experience
• Culinary degree or equivalent experience
• Leadership and team management skills
• Knowledge of food safety regulations
• Creative menu development abilities
• Strong business acumen',
                'deadline' => Carbon::now()->addDays(35),
            ],
            [
                'company' => 'Bella Vista Restaurant Group',
                'title' => 'Server - Fine Dining',
                'branch' => 'Gastronomy',
                'description' => 'Join our service team at our premier fine dining location. We are looking for experienced servers who are passionate about providing exceptional guest experiences.

What You\'ll Do:
- Provide outstanding customer service
- Take orders and serve food and beverages
- Make menu recommendations
- Handle payment processing
- Maintain dining room cleanliness',
                'location' => 'New York, NY',
                'employment_type' => 'part_time',
                'salary_min' => 15,
                'salary_max' => 25,
                'requirements' => '• 2+ years of fine dining experience
• Knowledge of wine and food pairings
• Excellent communication skills
• Professional appearance
• Ability to work evenings and weekends
• ServSafe certification preferred',
                'deadline' => Carbon::now()->addDays(10),
            ],
            // EduBright Academy jobs
            [
                'company' => 'EduBright Academy',
                'title' => 'High School Mathematics Teacher',
                'branch' => 'Education',
                'description' => 'We are seeking a passionate Mathematics Teacher to join our high school faculty. You will teach Algebra, Geometry, and Calculus to students in grades 9-12.

Our Ideal Candidate:
- Has a strong background in mathematics
- Uses innovative teaching methods
- Builds positive relationships with students
- Collaborates effectively with colleagues
- Supports our school\'s mission and values',
                'location' => 'Denver, CO',
                'employment_type' => 'full_time',
                'salary_min' => 50000,
                'salary_max' => 70000,
                'requirements' => '• Bachelor\'s degree in Mathematics or Education
• Teaching license/certification
• Experience with technology integration
• Strong classroom management skills
• Commitment to student success
• Background check required',
                'deadline' => Carbon::now()->addDays(40),
            ],
            [
                'company' => 'EduBright Academy',
                'title' => 'Elementary School Teacher',
                'branch' => 'Education',
                'description' => 'Join our elementary team as a dedicated teacher for grades 3-5. You will create engaging lesson plans and foster a positive learning environment for young learners.

Responsibilities:
- Plan and deliver age-appropriate lessons
- Assess student progress
- Communicate with parents
- Participate in school activities
- Collaborate with teaching team',
                'location' => 'Denver, CO',
                'employment_type' => 'full_time',
                'salary_min' => 45000,
                'salary_max' => 60000,
                'requirements' => '• Bachelor\'s degree in Elementary Education
• Valid teaching license
• Experience with elementary students
• Strong communication skills
• Patience and creativity
• Background check required',
                'deadline' => Carbon::now()->addDays(30),
            ],
            // FinanceFirst Bank jobs
            [
                'company' => 'FinanceFirst Bank',
                'title' => 'Senior Financial Analyst',
                'branch' => 'Finance',
                'description' => 'We are looking for a Senior Financial Analyst to join our corporate finance team. You will be responsible for financial modeling, analysis, and reporting to support strategic decision-making.

Key Responsibilities:
- Prepare financial models and forecasts
- Analyze investment opportunities
- Create executive reports and presentations
- Support budgeting and planning processes
- Collaborate with various departments',
                'location' => 'Chicago, IL',
                'employment_type' => 'full_time',
                'salary_min' => 80000,
                'salary_max' => 100000,
                'requirements' => '• Bachelor\'s degree in Finance or Accounting
• 5+ years of financial analysis experience
• Advanced Excel and financial modeling skills
• CFA designation preferred
• Strong analytical and communication skills
• Experience with financial software',
                'deadline' => Carbon::now()->addDays(25),
            ],
            [
                'company' => 'FinanceFirst Bank',
                'title' => 'Bank Teller',
                'branch' => 'Finance',
                'description' => 'Join our customer service team as a Bank Teller. You will assist customers with their banking needs while providing exceptional service and building relationships.

Daily Duties:
- Process customer transactions
- Open new accounts
- Provide product information
- Balance cash drawer
- Maintain customer confidentiality',
                'location' => 'Chicago, IL',
                'employment_type' => 'full_time',
                'salary_min' => 35000,
                'salary_max' => 42000,
                'requirements' => '• High school diploma required
• Customer service experience preferred
• Strong math and communication skills
• Professional appearance
• Ability to handle cash accurately
• Background check required',
                'deadline' => Carbon::now()->addDays(20),
            ],
            // BuildRight Construction jobs
            [
                'company' => 'BuildRight Construction',
                'title' => 'Project Manager',
                'branch' => 'Construction',
                'description' => 'We are seeking an experienced Project Manager to oversee commercial construction projects from start to finish. You will coordinate with clients, subcontractors, and internal teams.

Project Management Duties:
- Plan and schedule construction activities
- Manage project budgets and timelines
- Coordinate with subcontractors
- Ensure safety and quality standards
- Communicate with clients and stakeholders',
                'location' => 'Phoenix, AZ',
                'employment_type' => 'full_time',
                'salary_min' => 75000,
                'salary_max' => 95000,
                'requirements' => '• Bachelor\'s degree in Construction Management
• 5+ years of project management experience
• PMP certification preferred
• Strong leadership and communication skills
• Knowledge of construction methods and materials
• Proficiency in project management software',
                'deadline' => Carbon::now()->addDays(30),
            ],
            [
                'company' => 'BuildRight Construction',
                'title' => 'Electrician',
                'branch' => 'Construction',
                'description' => 'Join our electrical team as a skilled Electrician. You will install, maintain, and repair electrical systems in residential and commercial buildings.

Electrical Work Includes:
- Install wiring and electrical components
- Read blueprints and schematics
- Troubleshoot electrical problems
- Follow electrical codes and safety standards
- Work with construction teams',
                'location' => 'Phoenix, AZ',
                'employment_type' => 'full_time',
                'salary_min' => 55000,
                'salary_max' => 75000,
                'requirements' => '• Licensed Electrician in Arizona
• 3+ years of electrical experience
• Knowledge of electrical codes
• Physical ability to work in various conditions
• Strong problem-solving skills
• Valid driver\'s license',
                'deadline' => Carbon::now()->addDays(15),
            ],
        ];

        foreach ($jobs as $jobData) {
            // Find the entrepreneur by company name
            $entrepreneur = $entrepreneurs->first(function ($user) use ($jobData) {
                return $user->entrepreneurProfile->company_name === $jobData['company'];
            });

            if ($entrepreneur) {
                // Find the branch
                $branch = $branches->firstWhere('name', $jobData['branch']);

                if ($branch) {
                    JobOffer::firstOrCreate(
                        [
                            'user_id' => $entrepreneur->id,
                            'title' => $jobData['title']
                        ],
                        [
                            'user_id' => $entrepreneur->id,
                            'branch_id' => $branch->id,
                            'title' => $jobData['title'],
                            'description' => $jobData['description'],
                            'location' => $jobData['location'],
                            'employment_type' => $jobData['employment_type'],
                            'salary_min' => $jobData['salary_min'],
                            'salary_max' => $jobData['salary_max'],
                            'requirements' => $jobData['requirements'],
                            'deadline' => $jobData['deadline'],
                            'is_active' => true,
                        ]
                    );
                }
            }
        }
    }
}
