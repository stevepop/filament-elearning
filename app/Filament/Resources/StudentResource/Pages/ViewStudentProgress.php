<?php

namespace App\Filament\Resources\StudentResource\Pages;

use Filament\Resources\Pages\Page;
use App\Filament\Resources\StudentResource;


class ViewStudentProgress extends Page
{
    protected static string $resource = StudentResource::class;

    protected static string $view = 'filament.resources.students.pages.view-student-progress';
}

