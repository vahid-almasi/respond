<?php

namespace Vahid\Respond;

use Illuminate\Support\ServiceProvider;

class RespondServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {

        if (class_exists('\App')) {
            $lang = \App::getLocale();
        } else {
            $lang = /** @scrutinizer ignore-call */
                app('translator')->getLocale();
        }

        $this->publishes([
            __DIR__ . '/../errors/lang/' . $lang . '.php' => config_path($lang . '.php'),
        ]);

    }


    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {

        $this->registerMessages();

    }

    private function registerMessages()
    {

        $this->app->bind('Vahid\Respond\Messages', function () {

            return new Messages();

        });

    }

}
