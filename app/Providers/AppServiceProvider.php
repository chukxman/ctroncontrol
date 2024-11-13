<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use App\Models\Device;
use App\Models\User;
use App\Models\Eventlog;
use App\Models\File;
use Carbon\Carbon;
use DateTime;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\URL;

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

        Paginator::useBootstrap();

        // $user_id = Auth::user()->id;
        // $arr['devices'] = Device::where('user_id', Auth::user()->id)->orderBy('id','asc')->get();
        // return view::share('devicedata',$arr);


        view()->composer('layouts.auth', function ($view) {
            $file = File::all()->last();
            return view::share('file', $file);
        });

        view()->composer(['layouts.auth','user.eventlog'], function ($view) {
            $device = Device::where('user_id', Auth::user()->id);
            return view::share('devices', $device);
        });

        
        view()->composer('eventlog', function ($view) {
            $device = Device::where('user_id', Auth::user()->id);
            return view::share('devices', $device);
        });

        view()->composer(['admin.index', 'admin.admineditlist', 'admin.admindeletelist', 'admin.users.index'], function ($view) {
            $result = User::paginate(10);
            return view::share('users', $result);
        });

        view()->composer('admin.index', function ($view) {
            $users = User::where('parent_id', Auth::user()->id)->orderBy('id', 'asc')->get();
            return view::share('engineersdata', $users);
        });

        view()->composer('user.edit', function ($view) {
            $users = User::where('parent_id', Auth::user()->id)->orderBy('id', 'asc')->get();
            return view::share('engineerslist', $users);
        });

        view()->composer('user.editdevice', function ($view) {
            $users = User::where('parent_id', Auth::user()->id)->orderBy('id', 'asc')->get();
            return view::share('engineerslist', $users);
        });
        
        view()->composer(['admin.users.index', 'admin.users.deleteuserslist'], function ($view) {
            $devices = Device::all();
            return view::share('devices', $devices);
        });

        view()->composer('user.index', function ($view) {
            $subusers = User::where('parent_id', Auth::user()->id)->orderby('id', 'asc')->get();
            return view::share('subusers', $subusers);
        });

        view()->composer('user.subuser.index', function ($view) {
            $devices = Device::where('user_id', Auth::user()->id)->orderby('id', 'asc')->get();
            return view::share('devices', $devices);
        });

        //For the edit menu
        view()->composer('user.editlist', function ($view) {
            $subusers = User::where('parent_id', Auth::user()->id)->orderby('id', 'asc')->get();
            return view::share('subusers', $subusers);
        });

        //For delete Menu
        view()->composer('user.deletelist', function ($view) {
            $subusers = User::where('parent_id', Auth::user()->id)->orderby('id', 'asc')->get();
            return view::share('subusers', $subusers);
        });

        //For Delete Subusers
        view()->composer('user.subuser.subuserslist', function ($view) {
            $devices = Device::where('user_id', Auth::user()->id)->orderby('id', 'asc')->get();
            return view::share('devices', $devices);
        });

        view()->composer('layouts.auth', function ($view) {

            $eventlog = Eventlog::all();
            return view::share('eventlog', $eventlog);
        });





        // view()->composer('user.show', function ($view) {
        //     $device = Device::where('user_id', Auth::user()->id);
        // })

        // Working nav for now
        // $result = Device::where('user_id', Auth::user()->id)->get();
        // return view::share('devices', $result);
    }
}
