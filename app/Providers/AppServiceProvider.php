<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\MediaGallery;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      Schema::defaultStringLength(191);

      view()->composer('*', function ($view) 
      {
        $view->with('logo', MediaGallery::select('value')->where('name','logo')->first()->value);
        $view->with('adminLogo', MediaGallery::select('value')->where('name','admin_logo')->first()->value);

        $view->with('favicon', MediaGallery::select('value')->where('name','favicon')->first()->value);
    });
  }
}
