<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    private $interests = [
        'Web Development',
        'Mobile Development',
        'Machine Learning',
        'Data Science',
        'Cloud Computing',
        'DevOps',
        'UI/UX Design',
        'Blockchain',
        'Cybersecurity',
        'Game Development'
    ];

    public function run(): void
    {
        // Get users who aren't instructors
        $users = User::whereDoesntHave('instructor')->get();

        foreach ($users as $user) {
            // Randomly select 2-4 interests for each student
            $studentInterests = collect($this->interests)
                ->random(rand(2, 4))
                ->values()
                ->toArray();

            Student::create([
                'user_id' => $user->id,
                'bio' => fake()->paragraph(),
                'interests' => $studentInterests,
            ]);
        }
    }
}
