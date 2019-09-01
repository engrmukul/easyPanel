<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\oldMenuController;
use App\Http\Controllers\ModuleController;
use Config;
class MyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //View::share('menus', MenuController::menuList());
        //View::share('modules', ModuleController::getModuleList());
        //View::share('selected_module', 1);
        //$module_id=Session::get('selected_module');
        $userconfig = Config::get('constants.users_options');
	$bgclass = $userconfig['bgclass'];
        View::share('bgclass', $bgclass);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
