<?php

namespace App\Filament\Widgets;

use App\Models\Student;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\Log;

class StudentProgressChart extends ChartWidget
{
    protected static ?string $heading = 'Course Progress';
    protected int|string|array $columnSpan = 'full';

    public ?int $studentId = null;

    public function mount(): void
    {
        Log::info('Student ID set from widget mount', ['student_id' => $this->studentId]);
    }

    protected function getData(): array
    {
        if (!$this->studentId) {
            return [
                'datasets' => [],
                'labels' => [],
            ];
        }

        $student = Student::find($this->studentId);

        if (!$student) {
            return [
                'datasets' => [],
                'labels' => [],
            ];
        }

        $enrollments = $student->enrollments()
            ->with('course')
            ->orderBy('enrolled_at', 'desc')
            ->get();

        if ($enrollments->isEmpty()) {
            return [
                'datasets' => [],
                'labels' => [],
            ];
        }

        $data = $enrollments->map(fn ($enrollment) => abs($enrollment->progress ?? 0))->toArray();
        $colors = $enrollments->map(function ($enrollment) {
            $progress = abs($enrollment->progress ?? 0);
            if ($progress >= 70) {
                return 'rgba(59, 130, 246, 1.0)';
            } elseif ($progress >= 40) {
                return 'rgba(147, 197, 253, 1.0)';
            } else {
                return 'rgba(219, 234, 254, 1.0)';
            }
        })->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Course Progress',
                    'data' => $data,
                    'backgroundColor' => $colors,
                    'borderColor' => 'rgb(249, 115, 22)',  // Orange border
                    'borderWidth' => 1,
                    'borderRadius' => 4,
                ],
            ],
            'labels' => $enrollments->map(fn ($enrollment) => $enrollment->course->title ?? 'Unknown Course')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getOptions(): array
    {
        return [
            'indexAxis' => 'y',
            'scales' => [
                'x' => [
                    'beginAtZero' => true,
                    'max' => 100,
                    'ticks' => [
                        'callback' => "function(value) { return value + '%' }",
                    ],
                ],
                'y' => [
                    'grid' => [
                        'display' => false,
                    ],
                ],
            ],
            'plugins' => [
                'legend' => [
                    'display' => false,
                ],
            ],
            'responsive' => true,
            'maintainAspectRatio' => false,
            'barThickness' => 25,
        ];
    }
}










