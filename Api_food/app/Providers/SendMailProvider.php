<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SendMailProvider extends ServiceProvider{

    public function register()
    {
        $this->app->bind('SendMail', 'App\Services\SendMail');
    }
}
