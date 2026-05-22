<?php

namespace App\Providers;

use App\Models\Student;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('layouts.admin', function ($view) {
            $view->with('adminNavCounts', [
                'waiting' => Student::where('status_verifikasi', Student::STATUS_MENUNGGU_BERKAS)
                    ->whereNotNull('submitted_at')
                    ->count(),
            ]);
        });
    }
}
