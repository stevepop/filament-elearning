<?php

namespace App\Filament\Widgets;

use App\Models\Enrollment;
use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class RecentEnrollments extends BaseWidget
{
    protected static ?int $sort = 3;
    protected int | string | array $columnSpan = 'full';

    protected function getTableQuery(): Builder
    {
        return Enrollment::query()
            ->with(['student.user', 'course'])
            ->latest('enrolled_at')
            ->limit(5);
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('student.user.name')
                ->label('Student')
                ->searchable(),
            Tables\Columns\TextColumn::make('course.title')
                ->label('Course')
                ->searchable(),
            Tables\Columns\TextColumn::make('amount')
                ->money('usd'),
            Tables\Columns\TextColumn::make('enrolled_at')
                ->dateTime()
                ->sortable(),
            Tables\Columns\TextColumn::make('progress')
                ->badge()
                ->color(fn ($state): string => match (true) {
                    $state >= 80 => 'success',
                    $state >= 50 => 'warning',
                    default => 'danger',
                })
                ->suffix('%'),
        ];
    }

    protected function isTablePaginationEnabled(): bool
    {
        return false;
    }

    protected function getHeading(): string
    {
        return 'Recent Enrollments';
    }
}
