<?php

namespace App\Providers;
use App\Models\Chat;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function boot(): void
{
    View::composer('layouts.admin', function ($view) {
        $unreadChats = Chat::where('sender', 'user')
            ->where('is_read', false)
            ->count();

        $view->with('unreadChats', $unreadChats);
    });
}
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }
}
