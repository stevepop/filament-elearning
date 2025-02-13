<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;
use Illuminate\Contracts\View\View;

class CourseDetails extends Component
{
    public Course $course;

    public function mount(Course $course): void
    {
        $this->course = $course->load(['modules']);
    }

    public function enroll()
    {
        if (! auth()->check()) {
            return redirect()->route('login');
        }

        // Enroll the student
        auth()->user()->enrolledCourses()->attach($this->course);

        return redirect()->route('student.dashboard');
    }

    public function render(): View
    {
        return view('livewire.course-details')->layout('components.layouts.app');
    }
}
