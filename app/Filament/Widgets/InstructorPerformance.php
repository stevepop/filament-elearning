<?php

namespace App\Filament\Widgets;

use App\Models\Instructor;
use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class InstructorPerformance extends BaseWidget
{
    protected static ?int $sort = 4;
    protected int | string | array $columnSpan = 'full';

    protected function getTableQuery(): Builder
    {
        return Instructor::query()
            ->withCount('courses')
            ->withSum('courses', 'enrollments_count')
            ->withAvg('courses', 'price')
            ->orderByDesc('courses_sum_enrollments_count')
            ->limit(10);
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('user.name')
                ->label('Instructor')
                ->searchable(),
            Tables\Columns\TextColumn::make('courses_count')
                ->label('Total Courses')
                ->sortable(),
            Tables\Columns\TextColumn::make('courses_sum_enrollments_count')
                ->label('Total Enrollments')
                ->sortable(),
            Tables\Columns\TextColumn::make('courses_avg_price')
                ->label('Avg. Course Price')
                ->money('usd')
                ->sortable(),
            Tables\Columns\TextColumn::make('specialization')
                ->searchable(),
        ];
    }

    protected function isTablePaginationEnabled(): bool
    {
        return false;
    }

    protected function getHeading(): string
    {
        return 'Top Performing Instructors';
    }
}
