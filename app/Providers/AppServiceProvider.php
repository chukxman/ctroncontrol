<?php

namespace App\Providers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use App\Models\Device;
use App\Models\User;


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
       
        // $user_id = Auth::user()->id;
        // $arr['devices'] = Device::where('user_id', Auth::user()->id)->orderBy('id','asc')->get();
        // return view::share('devicedata',$arr);

        view()->composer('layouts.main', function ($view) {
        $result = DB::table('devices')->where('user_id', Auth::user()->id)->orderBy('id','asc')->get();
        return view::share('devicedata', $result);
        });
        //Working nav for now
        // $result = Device::where('user_id', 'Auth::user()->id')->get();
        // return view::share('devicedata', $result);
      
    }
}
