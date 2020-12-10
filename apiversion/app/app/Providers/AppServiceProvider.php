<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Message;
use Illuminate\Support\Facades\Schema;
use Auth;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       // if (Schema::hasTable('messages')) {
       //       $messages = Message::where('from',Auth::user()->id)->get();

       //      view()->share('messages', $messages);
       //  }
    }
}
