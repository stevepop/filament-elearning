<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Module;
use App\Models\Instructor;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        $courses = [
            [
                'title' => 'Modern JavaScript Development',
                'description' => 'Master modern JavaScript including ES6+, async/await, and modern tooling. Learn to build professional web applications.',
                'level' => 'intermediate',
                'price' => 149.99,
                'modules' => [
                    [
                        'title' => 'ES6+ Features',
                        'type' => 'video',
                        'content' => 'Learn about arrow functions, destructuring, and other ES6+ features.',
                    ],
                    [
                        'title' => 'Async Programming',
                        'type' => 'video',
                        'content' => 'Understanding Promises, async/await, and handling asynchronous operations.',
                    ],
                    [
                        'title' => 'Modern Tooling',
                        'type' => 'pdf',
                        'content' => 'Comprehensive guide to Webpack, Babel, and modern JavaScript tooling.',
                    ],
                ]
            ],
            [
                'title' => 'Machine Learning Fundamentals',
                'description' => 'Introduction to machine learning concepts and practical applications using Python and popular ML libraries.',
                'level' => 'beginner',
                'price' => 199.99,
                'modules' => [
                    [
                        'title' => 'Introduction to Python for ML',
                        'type' => 'video',
                        'content' => 'Python basics and essential libraries for machine learning.',
                    ],
                    [
                        'title' => 'Supervised Learning',
                        'type' => 'quiz',
                        'content' => 'Quiz on classification and regression concepts.',
                    ],
                ]
            ],
            [
                'title' => 'AWS Cloud Architecture',
                'description' => 'Learn to design and implement scalable cloud solutions using AWS services. Includes hands-on projects and real-world scenarios.',
                'level' => 'advanced',
                'price' => 299.99,
                'modules' => [
                    [
                        'title' => 'AWS Fundamentals',
                        'type' => 'video',
                        'content' => 'Introduction to AWS services and cloud concepts.',
                    ],
                    [
                        'title' => 'Serverless Architecture',
                        'type' => 'video',
                        'content' => 'Building applications using AWS Lambda and API Gateway.',
                    ],
                    [
                        'title' => 'High Availability Design',
                        'type' => 'pdf',
                        'content' => 'Designing fault-tolerant and scalable architectures.',
                    ],
                    [
                        'title' => 'AWS Security Best Practices',
                        'type' => 'quiz',
                        'content' => 'Security concepts and implementation in AWS.',
                    ],
                ]
            ],
            [
                'title' => 'iOS App Development with Swift',
                'description' => 'Complete guide to building iOS applications using Swift and SwiftUI. From basics to App Store deployment.',
                'level' => 'intermediate',
                'price' => 199.99,
                'modules' => [
                    [
                        'title' => 'Swift Programming Basics',
                        'type' => 'video',
                        'content' => 'Core concepts of Swift programming language.',
                    ],
                    [
                        'title' => 'UIKit Fundamentals',
                        'type' => 'video',
                        'content' => 'Building user interfaces with UIKit.',
                    ],
                    [
                        'title' => 'SwiftUI Introduction',
                        'type' => 'video',
                        'content' => 'Modern UI development with SwiftUI.',
                    ],
                    [
                        'title' => 'App Store Submission',
                        'type' => 'pdf',
                        'content' => 'Guide to preparing and submitting your app.',
                    ],
                ]
            ],
            [
                'title' => 'Full-Stack React & Node.js',
                'description' => 'Build complete web applications using React for frontend and Node.js for backend. Includes authentication, databases, and deployment.',
                'level' => 'intermediate',
                'price' => 249.99,
                'modules' => [
                    [
                        'title' => 'React Fundamentals',
                        'type' => 'video',
                        'content' => 'Core concepts of React including hooks and context.',
                    ],
                    [
                        'title' => 'Node.js & Express',
                        'type' => 'video',
                        'content' => 'Building REST APIs with Express.js.',
                    ],
                    [
                        'title' => 'MongoDB Integration',
                        'type' => 'pdf',
                        'content' => 'Working with MongoDB and Mongoose.',
                    ],
                    [
                        'title' => 'Authentication & Authorization',
                        'type' => 'video',
                        'content' => 'Implementing JWT authentication.',
                    ],
                    [
                        'title' => 'Deployment Strategies',
                        'type' => 'quiz',
                        'content' => 'Different ways to deploy your full-stack application.',
                    ],
                ]
            ],
        ];

        $instructors = Instructor::all();

        foreach ($courses as $index => $courseData) {
            $course = Course::create([
                'title' => $courseData['title'],
                'description' => $courseData['description'],
                'level' => $courseData['level'],
                'price' => $courseData['price'],
                'instructor_id' => $instructors[$index % count($instructors)]->id,
                'is_published' => true,
            ]);

            foreach ($courseData['modules'] as $orderIndex => $moduleData) {
                Module::create([
                    'course_id' => $course->id,
                    'title' => $moduleData['title'],
                    'type' => $moduleData['type'],
                    'content' => $moduleData['content'],
                    'order' => $orderIndex + 1,
                ]);
            }
        }
    }
}

