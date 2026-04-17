<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Experience;
use App\Models\Education;
use App\Models\Setting;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ── Admin User ────────────────────────────────────────────────────────
        User::updateOrCreate(
            ['email' => 'admin@sherifaudu.com'],
            [
                'name'     => 'Sherif Badamasi Audu',
                'password' => Hash::make('Admin@1234'),
            ]
        );

        // ── Site Settings ─────────────────────────────────────────────────────
        $settings = [
            'full_name'       => 'Badamasi Sherif Audu',
            'tagline'         => 'Full-Stack Developer · Cybersecurity Specialist · API Architect · Academic Instructor',
            'bio'             => 'Results-driven Full-Stack Developer and Cybersecurity Specialist with 5+ years of combined experience in software development, academic instruction, and information security. Recently architected and delivered a complete agricultural e-commerce and loan management platform (ACHOICE LIMITED) using PHP 8.2, Laravel 11, React.js and MySQL — a production-ready system with 48 RESTful API endpoints, Paystack payment integration, Cloudinary image management, Termii SMS notifications, and role-based access control. Holds an MTech in Cyber Security Science and active memberships in CPN, NCS and CSEAN. Available for freelance, remote and contract engagements worldwide.',
            'email'           => 'Badamasisherif12@gmail.com',
            'phone'           => '+234 806 136 2600',
            'location'        => 'Bida, Niger State, Nigeria',
            'github_url'      => 'https://github.com/Famous005',
            'linkedin_url'    => 'https://linkedin.com/in/sherifaudu',
            'fiverr_url'      => 'https://fiverr.com',
            'upwork_url'      => 'https://upwork.com',
            'cv_url'          => '',
            'years_experience'=> '5+',
            'projects_count'  => '20+',
            'clients_count'   => '10+',
        ];

        foreach ($settings as $key => $value) {
            Setting::set($key, $value);
        }

        // ── Projects ──────────────────────────────────────────────────────────
        $projects = [
            [
                'title'            => 'ACHOICE LIMITED — Agricultural E-Commerce & Loan Platform',
                'description'      => 'A complete full-stack agricultural e-commerce and loan management platform built from scratch with 48 RESTful API endpoints, Paystack payment integration, Cloudinary CDN, Termii SMS notifications, and role-based access control.',
                'long_description' => "Architected and delivered a production-ready platform from scratch — backend API, database design, payment integration, notifications and deployment pipeline.\n\nKey achievements:\n• 48 RESTful API endpoints across 7 controllers (auth, products, orders, loans, admin, images, notifications)\n• Paystack payment gateway with webhook handling and automatic stock deduction\n• Role-based access control via Laravel Sanctum + custom AdminMiddleware (buyers, sellers, admins)\n• Cloudinary CDN for product image storage with auto-resizing\n• Termii SMS + SendGrid/Mailtrap transactional email notifications\n• Led 3-person team using GitHub PR workflow with protected main and develop branches\n• Comprehensive test suite: 40 scenarios, ~87.5% pass rate",
                'tech_stack'       => ['PHP 8.2', 'Laravel 11', 'React.js', 'MySQL', 'Paystack', 'Cloudinary', 'Termii', 'Laravel Sanctum'],
                'category'         => 'web',
                'image_url'        => null,
                'github_url'       => 'https://github.com/Famous005/achoice-platform',
                'live_url'         => null,
                'featured'         => true,
                'sort_order'       => 1,
            ],
            [
                'title'            => 'Hybrid Android Malware Detection System',
                'description'      => 'MTech thesis research combining static and dynamic analysis for Android malware detection using Machine Learning and Deep Learning models to enhance detection accuracy beyond traditional signature-based methods.',
                'long_description' => "Applied ML and DL models to enhance detection efficiency and accuracy beyond traditional signature-based methods.\n\n• Combined static analysis (permissions, API calls, manifest parsing) with dynamic analysis (runtime behaviour)\n• Evaluated multiple ML classifiers: Random Forest, SVM, CNN, LSTM\n• Conducted systematic literature review published as seminar presentation\n• Awaiting external defence for MTech degree",
                'tech_stack'       => ['Python', 'Machine Learning', 'Deep Learning', 'Android Security', 'TensorFlow', 'Scikit-learn'],
                'category'         => 'security',
                'image_url'        => null,
                'github_url'       => null,
                'live_url'         => null,
                'featured'         => true,
                'sort_order'       => 2,
            ],
            [
                'title'            => 'Secure Data System: AES + LSB Image Steganography',
                'description'      => 'Dual-layer data security system merging AES encryption with LSB steganography. Achieved secure data concealment within image files with minimal visual distortion.',
                'long_description' => "Designed and evaluated a dual-layer data security system merging AES-256 encryption with LSB (Least Significant Bit) steganography.\n\n• AES encryption layer ensures data confidentiality before embedding\n• LSB steganography embeds encrypted data inside image pixels with minimal distortion\n• Evaluated PSNR and MSE metrics to confirm image quality preservation\n• Undergraduate final year project — assessed and awarded Second Class Upper",
                'tech_stack'       => ['Python', 'Cryptography', 'AES Encryption', 'LSB Steganography', 'Image Processing', 'NumPy'],
                'category'         => 'security',
                'image_url'        => null,
                'github_url'       => null,
                'live_url'         => null,
                'featured'         => true,
                'sort_order'       => 3,
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }

        // ── Skills ────────────────────────────────────────────────────────────
        $skills = [
            // Backend
            ['name' => 'PHP 8.2',              'category' => 'backend',   'proficiency' => 92, 'sort_order' => 1],
            ['name' => 'Laravel 11',           'category' => 'backend',   'proficiency' => 90, 'sort_order' => 2],
            ['name' => 'Laravel Sanctum',      'category' => 'backend',   'proficiency' => 88, 'sort_order' => 3],
            ['name' => 'RESTful API Design',   'category' => 'backend',   'proficiency' => 90, 'sort_order' => 4],
            ['name' => 'MySQL',                'category' => 'backend',   'proficiency' => 85, 'sort_order' => 5],
            ['name' => 'Database Migrations',  'category' => 'backend',   'proficiency' => 85, 'sort_order' => 6],

            // Frontend
            ['name' => 'React.js',             'category' => 'frontend',  'proficiency' => 82, 'sort_order' => 1],
            ['name' => 'JavaScript (ES6+)',    'category' => 'frontend',  'proficiency' => 85, 'sort_order' => 2],
            ['name' => 'Tailwind CSS',         'category' => 'frontend',  'proficiency' => 88, 'sort_order' => 3],
            ['name' => 'HTML5 & CSS3',         'category' => 'frontend',  'proficiency' => 90, 'sort_order' => 4],
            ['name' => 'Axios',                'category' => 'frontend',  'proficiency' => 85, 'sort_order' => 5],
            ['name' => 'Context API',          'category' => 'frontend',  'proficiency' => 80, 'sort_order' => 6],

            // DevOps & Tools
            ['name' => 'Git & GitHub',         'category' => 'devops',    'proficiency' => 88, 'sort_order' => 1],
            ['name' => 'GitHub PR Workflow',   'category' => 'devops',    'proficiency' => 85, 'sort_order' => 2],
            ['name' => 'XAMPP / Apache',       'category' => 'devops',    'proficiency' => 82, 'sort_order' => 3],
            ['name' => 'VS Code',              'category' => 'devops',    'proficiency' => 90, 'sort_order' => 4],
            ['name' => 'Linux CLI',            'category' => 'devops',    'proficiency' => 70, 'sort_order' => 5],

            // Integrations
            ['name' => 'Paystack API',         'category' => 'integrations', 'proficiency' => 88, 'sort_order' => 1],
            ['name' => 'Cloudinary CDN',       'category' => 'integrations', 'proficiency' => 85, 'sort_order' => 2],
            ['name' => 'Termii SMS',           'category' => 'integrations', 'proficiency' => 82, 'sort_order' => 3],
            ['name' => 'Webhook Handling',     'category' => 'integrations', 'proficiency' => 85, 'sort_order' => 4],
            ['name' => 'Mailtrap / SendGrid',  'category' => 'integrations', 'proficiency' => 80, 'sort_order' => 5],

            // Security
            ['name' => 'Ethical Hacking',      'category' => 'security',  'proficiency' => 80, 'sort_order' => 1],
            ['name' => 'Penetration Testing',  'category' => 'security',  'proficiency' => 78, 'sort_order' => 2],
            ['name' => 'Cryptography',         'category' => 'security',  'proficiency' => 82, 'sort_order' => 3],
            ['name' => 'AES Encryption',       'category' => 'security',  'proficiency' => 85, 'sort_order' => 4],
            ['name' => 'LSB Steganography',    'category' => 'security',  'proficiency' => 80, 'sort_order' => 5],
            ['name' => 'Network Security',     'category' => 'security',  'proficiency' => 80, 'sort_order' => 6],

            // Data & Analytics
            ['name' => 'Python',               'category' => 'data',      'proficiency' => 75, 'sort_order' => 1],
            ['name' => 'Power BI',             'category' => 'data',      'proficiency' => 78, 'sort_order' => 2],
            ['name' => 'Advanced Excel',       'category' => 'data',      'proficiency' => 80, 'sort_order' => 3],
            ['name' => 'Machine Learning',     'category' => 'data',      'proficiency' => 72, 'sort_order' => 4],
            ['name' => 'Deep Learning',        'category' => 'data',      'proficiency' => 68, 'sort_order' => 5],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }

        // ── Work Experience ───────────────────────────────────────────────────
        $experiences = [
            [
                'title'      => 'Graduate Assistant — Software Development & Cybersecurity',
                'company'    => 'Newgate University',
                'location'   => 'Minna, Niger State',
                'start_date' => '2022',
                'end_date'   => null,
                'is_current' => true,
                'responsibilities' => [
                    'Design and deliver course materials for cybersecurity, software development and computer science modules to undergraduate students',
                    'Developed full-stack web applications as teaching demonstrations — including a production-ready e-commerce and loan platform using Laravel 11 and React.js',
                    'Mentor students in PHP, MySQL, API development, Git workflow and information security fundamentals',
                    'Supervise undergraduate research projects and provide structured technical feedback',
                    'Participate in student screening, academic assessments and curriculum development',
                ],
                'sort_order' => 1,
            ],
            [
                'title'      => 'Direct Sales Executive',
                'company'    => 'United Bank for Africa (UBA)',
                'location'   => 'Mokwa, Niger State',
                'start_date' => '2022',
                'end_date'   => '2022',
                'is_current' => false,
                'responsibilities' => [
                    'Consistently met and exceeded personal sales targets through strategic networking and cold calling',
                    'Built lasting client relationships to support long-term business growth',
                    'Identified new business opportunities through prospecting and market research',
                ],
                'sort_order' => 2,
            ],
            [
                'title'      => 'Computer Operator',
                'company'    => 'Abu Thuahira Computer Link',
                'location'   => 'Bida, Niger State',
                'start_date' => '2021',
                'end_date'   => '2022',
                'is_current' => false,
                'responsibilities' => [
                    'Managed server backups, tape rotations and system maintenance procedures',
                    'Maintained data integrity across multiple systems using structured spreadsheets',
                    'Performed data retrieval and entry operations using specialised software tools',
                ],
                'sort_order' => 3,
            ],
            [
                'title'      => 'Classroom Teacher',
                'company'    => 'Royal Nurture Ducere Academy',
                'location'   => 'Lugbe, Abuja',
                'start_date' => '2020',
                'end_date'   => '2021',
                'is_current' => false,
                'responsibilities' => [
                    'Delivered curriculum-aligned lessons across multiple subjects using diverse instructional materials',
                    'Assessed student progress through routine tests and standardised examinations',
                    'Collaborated with parents, administrators and counselors on student improvement plans',
                ],
                'sort_order' => 4,
            ],
            [
                'title'      => 'Computer Programming Instructor',
                'company'    => 'Dan Abu Cyber Café',
                'location'   => 'Bida, Niger State',
                'start_date' => '2019',
                'end_date'   => '2020',
                'is_current' => false,
                'responsibilities' => [
                    'Trained staff and clients in computer programming, software usage and professional service delivery',
                    'Coached team members on customer service excellence and daily task collaboration',
                ],
                'sort_order' => 5,
            ],
            [
                'title'      => 'Student Trainee — Networking',
                'company'    => 'Huawei Academy',
                'location'   => 'Minna, Niger State',
                'start_date' => '2018',
                'end_date'   => '2018',
                'is_current' => false,
                'responsibilities' => [
                    'Completed intensive training in routing, switching, IP addressing and corporate network simulation',
                    'Passed HCIA Routing & Switching certification examination upon completion',
                ],
                'sort_order' => 6,
            ],
            [
                'title'      => 'Undergraduate Intern — IT',
                'company'    => 'Nigerian Agip Oil Company',
                'location'   => 'Maitama, Abuja',
                'start_date' => '2014',
                'end_date'   => '2015',
                'is_current' => false,
                'responsibilities' => [
                    'Installed and configured middleware in Linux and Windows server environments',
                    'Developed and implemented data loss prevention procedures with the IT team',
                    'Drafted professional memos, letters and marketing materials supporting business operations',
                ],
                'sort_order' => 7,
            ],
        ];

        foreach ($experiences as $exp) {
            Experience::create($exp);
        }

        // ── Education ─────────────────────────────────────────────────────────
        $educations = [
            [
                'degree'      => 'MTech',
                'field'       => 'Cyber Security Science',
                'institution' => 'Federal University of Technology Minna',
                'grade'       => 'Awaiting External Defence',
                'start_year'  => '2022',
                'end_year'    => null,
                'is_current'  => true,
                'description' => 'Thesis: Hybrid-Based Android Malware Detection — Enhancing Efficiency and Accuracy through Machine Learning and Deep Learning Models',
                'sort_order'  => 1,
            ],
            [
                'degree'      => 'BTech',
                'field'       => 'Cyber Security Science',
                'institution' => 'Federal University of Technology Minna',
                'grade'       => 'Second Class Upper',
                'start_year'  => '2015',
                'end_year'    => '2019',
                'is_current'  => false,
                'description' => 'Final Year Project: Design and Evaluation of a Data Security System by Merging AES Encryption and LSB Image Steganography',
                'sort_order'  => 2,
            ],
            [
                'degree'      => 'National Diploma',
                'field'       => 'Computer Science',
                'institution' => 'Federal Polytechnic Bida',
                'grade'       => null,
                'start_year'  => '2012',
                'end_year'    => '2014',
                'is_current'  => false,
                'description' => null,
                'sort_order'  => 3,
            ],
            [
                'degree'      => 'SSCE',
                'field'       => 'WAEC',
                'institution' => 'Government Secondary School Minna',
                'grade'       => null,
                'start_year'  => '2004',
                'end_year'    => '2010',
                'is_current'  => false,
                'description' => null,
                'sort_order'  => 4,
            ],
        ];

        foreach ($educations as $edu) {
            Education::create($edu);
        }

        $this->command->info('✅  Portfolio database seeded successfully!');
        $this->command->info('📧  Admin: admin@sherifaudu.com');
        $this->command->info('🔑  Password: Admin@1234  ← Change this immediately!');
    }
}
