<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        VerifyEmail::toMailUsing(function($notifiable, $url){
            return (new MailMessage)
                ->subject('Verificación de correo electrónico')
                ->line('Ya está casi lista tu cuenta, solo debes presionar el enlace que se encuentra a continuación')
                ->action('Confirmar correo electrónico', $url)
                ->line('Si no creaste esta cuenta con nosotros puedes ignorar este mensaje.');
        });
    }
}
