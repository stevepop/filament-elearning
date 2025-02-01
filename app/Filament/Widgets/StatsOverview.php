<?php

namespace App\Filament\Widgets;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Student;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends StatsOverviewWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total Students', Student::count())
                ->description('Total registered students')
                ->descriptionIcon('heroicon-s-user-group')
                ->chart([7, 12, 16, 18, 22, 27, 30])
                ->color('success'),

            Card::make('Active Courses', Course::where('is_published', true)->count())
                ->description('Published courses')
                ->descriptionIcon('heroicon-s-academic-cap')
                ->chart([10, 12, 12, 13, 15, 17, 18])
                ->color('primary'),

            Card::make('Total Revenue', '$' . number_format(Enrollment::sum('amount'), 2))
                ->description('From all enrollments')
                ->descriptionIcon('heroicon-s-currency-dollar')
                ->chart([15000, 18000, 22000, 25000, 27000, 30000, 35000])
                ->color('warning'),
        ];
    }
}
