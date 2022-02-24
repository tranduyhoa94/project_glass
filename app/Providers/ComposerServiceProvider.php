<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer([
            'home.includes.header',
            'home.includes.footer',
            'home.contact.form',
            'home.includes.silder'
        ],
            'App\View\Components\CategoryComposer' // composer class name
        );

        View::composer([
            'home.build.build-finish'
        ],
            'App\View\Components\BuildSuccess'
        );
    }
}
