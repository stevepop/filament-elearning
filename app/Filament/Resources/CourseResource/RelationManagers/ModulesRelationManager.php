<?php

namespace App\Filament\Resources\CourseResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class ModulesRelationManager extends RelationManager
{
    protected static string $relationship = 'modules';

    protected static ?string $recordTitleAttribute = 'title';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('type')
                    ->options([
                        'video' => 'Video',
                        'pdf' => 'PDF Document',
                        'quiz' => 'Quiz',
                    ])
                    ->required(),
                Forms\Components\RichEditor::make('content')
                    ->required(),
                Forms\Components\TextInput::make('order')
                    ->integer()
                    ->default(fn ($livewire) => $livewire->ownerRecord->modules()->count() + 1)
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'video' => 'primary',
                        'pdf' => 'success',
                        'quiz' => 'warning',
                    }),
                Tables\Columns\TextColumn::make('order'),
            ])
            ->defaultSort('order', 'asc')
            ->reorderable('order');
    }
}
