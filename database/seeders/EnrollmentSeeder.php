<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EnrollmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = Student::all();
        $courses = Course::all();

        foreach ($students as $student) {
            // Each student enrolls in 2-5 random courses
            $randomCourses = $courses->random(rand(2, 5));

            foreach ($randomCourses as $course) {
                // Create enrollment with realistic dates and progress
                $enrolledAt = Carbon::now()->subDays(rand(1, 180));

                // Calculate progress based on enrollment date
                $daysSinceEnrolled = Carbon::now()->diffInDays($enrolledAt);
                $progress = min(100, round($daysSinceEnrolled / 2)); // Roughly 2 days per 1% progress

                Enrollment::create([
                    'student_id' => $student->id,
                    'course_id' => $course->id,
                    'enrolled_at' => $enrolledAt,
                    'amount' => $course->price,
                    'progress' => $progress
                ]);
            }
        }
    }
}

