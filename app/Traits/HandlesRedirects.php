<?php

namespace App\Traits;

trait HandlesRedirects
{
    public function getRedirectRoute()
    {
        if (auth()->user()->hasRole('admin')) {
            return route('filament.admin.pages.dashboard');
        }

        return route('student.dashboard');
    }
}
