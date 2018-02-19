<?php

namespace App\Providers;

use App\User;
use App\Auth\User_caregiver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class user_caregiverprovider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      $this->app['auth']->extend('custom',function()
      {
         return new user_caregiverprovider(new User);
      });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
