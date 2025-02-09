<?php

namespace App\Filament\Resources\StudentResource\Pages;

use App\Filament\Resources\StudentResource;
use App\Filament\Widgets\StudentProgressChart;
use Filament\Resources\Pages\Page;
use App\Models\Student;

class ViewStudentProgress extends Page
{
    protected static string $resource = StudentResource::class;
    protected static string $view = 'filament.resources.students.pages.view-student-progress';

    public Student $record;

    public function mount($record)
    {
        $this->record = $record;
    }

    public function getHeaderWidgets(): array
    {
        return [
            StudentProgressChart::make([
                'studentId' => $this->record->id,
            ]),
        ];
    }

    public function getHeading(): string
    {
        return $this->record ? "Progress for {$this->record->user->name}" : "Student Progress";
    }
}




