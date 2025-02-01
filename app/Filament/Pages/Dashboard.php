<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\InstructorPerformance;
use App\Filament\Widgets\RecentEnrollments;
use App\Filament\Widgets\StatsOverview;
use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    protected function getHeaderWidgets(): array
    {
        return [
            StatsOverview::class,
        ];
    }

    protected function getFooterWidgets(): array
    {
        return [
            RecentEnrollments::class,
            InstructorPerformance::class,
        ];
    }
}


