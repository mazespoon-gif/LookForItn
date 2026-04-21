<?php

namespace App\Providers;

use App\Mail\CustomMessageMail;
use Carbon\CarbonImmutable;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //$this->app->usePublicPath(realpath(base_path('../public')));
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->configureDefaults();
        $this->configureVerificationEmail();
    }

    /**
     * Configure default behaviors for production-ready applications.
     */
    protected function configureDefaults(): void
    {
        Date::use(CarbonImmutable::class);

        DB::prohibitDestructiveCommands(app()->isProduction());

        Password::defaults(
            fn(): ?Password => app()->isProduction()
                ? Password::min(5)
                    // ->mixedCase()
                    ->letters()
                    ->numbers()
                    // ->symbols()
                    ->uncompromised()
                : null,
        );
    }

    protected function configureVerificationEmail(): void
    {
        VerifyEmail::toMailUsing(function ($notifiable) {
            $verificationUrl = URL::temporarySignedRoute(
                "verification.verify",
                CarbonImmutable::now()->addMinutes(60),
                [
                    "id" => $notifiable->getKey(),
                    "hash" => sha1($notifiable->getEmailForVerification()),
                ],
            );

            return new CustomMessageMail(
                $verificationUrl,
                $notifiable->getEmailForVerification(),
            )->to($notifiable->getEmailForVerification());
        });
    }
}
