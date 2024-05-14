<?php

namespace App\Providers;

use App\Contracts\IGenerateFilenameService;
use App\Contracts\IGenerateIdService;
use App\Contracts\IGenerateOTPService;
use App\Contracts\ISendOTPEmailService;
use App\Services\GenerateFilenameService;
use App\Services\GenerateIdService;
use App\Services\GenerateOTPService;
use App\Services\SendOTPEmailService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IGenerateIdService::class, GenerateIdService::class);
        $this->app->bind(IGenerateFilenameService::class, GenerateFilenameService::class);
        $this->app->bind(ISendOTPEmailService::class, SendOTPEmailService::class);
        $this->app->bind(IGenerateOTPService::class, GenerateOTPService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
