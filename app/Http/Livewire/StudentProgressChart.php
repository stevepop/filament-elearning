<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Filament\Widgets\ChartWidget;

class StudentProgressChart extends ChartWidget
{
    public $student;

    protected static ?string $heading = 'Course Progress';

    protected function getData(): array
    {
        $enrollments = $this->student->enrollments()
            ->with('course')
            ->orderBy('enrolled_at')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Progress',
                    'data' => $enrollments->map(fn ($enrollment) => $enrollment->progress),
                    'borderColor' => '#3b82f6',
                    'fill' => false,
                ],
            ],
            'labels' => $enrollments->map(fn ($enrollment) => $enrollment->course->title),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    protected function getOptions(): array
    {
        return [
            'plugins' => [
                'legend' => [
                    'display' => true,
                ],
            ],
            'scales' => [
                'y' => [
                    'min' => 0,
                    'max' => 100,
                    'ticks' => [
                        'callback' => '##function(value) { return value + "%"; }',
                    ],
                ],
            ],
        ];
    }
}
