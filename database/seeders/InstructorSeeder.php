<?php

namespace Database\Seeders;

use App\Models\Instructor;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class InstructorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $instructors = [
            [
                'name' => 'Dr. Sarah Johnson',
                'email' => 'sarah@example.com',
                'bio' => 'PhD in Computer Science with 10+ years of teaching experience. Specializes in web development and software architecture.',
                'specialization' => 'Web Development'
            ],
            [
                'name' => 'Prof. Michael Chen',
                'email' => 'michael@example.com',
                'bio' => 'Former Tech Lead at Google, now teaching full-time. Expert in machine learning and AI applications.',
                'specialization' => 'Machine Learning'
            ],
            [
                'name' => 'Jessica Williams',
                'email' => 'jessica@example.com',
                'bio' => 'Full-stack developer with 8 years of industry experience. Passionate about teaching modern JavaScript frameworks.',
                'specialization' => 'Frontend Development'
            ],
            [
                'name' => 'David Kumar',
                'email' => 'david@example.com',
                'bio' => 'Cloud architecture specialist with AWS certification. Helps companies transition to cloud infrastructure.',
                'specialization' => 'Cloud Computing'
            ],
            [
                'name' => 'Maria Garcia',
                'email' => 'maria@example.com',
                'bio' => 'Mobile development expert specializing in iOS and Android. Former mobile lead at Twitter.',
                'specialization' => 'Mobile Development'
            ]
        ];

        foreach ($instructors as $instructor) {
            $user = User::create([
                'name' => $instructor['name'],
                'email' => $instructor['email'],
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]);

            Instructor::create([
                'user_id' => $user->id,
                'bio' => $instructor['bio'],
                'specialization' => $instructor['specialization'],
            ]);
        }
    }
}

