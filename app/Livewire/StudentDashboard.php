<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Contracts\View\View;

class StudentDashboard extends Component
{
    public function render(): View
    {
        return view('livewire.student-dashboard', [
            'enrolledCourses' => auth()->user()
                ->enrolledCourses()
                ->with(['modules'])
                ->get()
        ])->layout('components.layouts.app');
    }
}
