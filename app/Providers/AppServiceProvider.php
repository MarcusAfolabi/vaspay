<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
   
    public function register(): void
    {
        //
    }

   
    public function boot(): void
    {
        Validator::extend('allowed_domain', function ($attribute, $value, $parameters, $validator) {
            $allowedDomains = ['gmail.com', 'yahoo.com', 'ymail.com', 'outlook.com'];

            foreach ($allowedDomains as $domain) {
                if (str_ends_with($value, '@' . $domain)) {
                    return true;
                }
            }
            return false;
        });
        Validator::replacer('allowed_domain', function ($message, $attribute, $rule, $parameters) {
            return str_replace(':attribute', $attribute, 'Your email is incorrect');
        });

    }
}
