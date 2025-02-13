<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Contracts\View\View;

class CourseCatalog extends Component
{
    use WithPagination;

    public function render(): View
    {
        $courses = Course::query()
            ->with('instructor')
            ->latest()
            ->paginate(12);


        return view('livewire.course-catalog', [
            'courses' => $courses
        ])->layout('components.layouts.app');
    }
}
