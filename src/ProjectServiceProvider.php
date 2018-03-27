<?php

namespace Codeuz\Project;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use File;
use Auth;

class ProjectServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
    	// Database string length bugfix
    	Schema::defaultStringLength(191);
		
		// Set auth user into views
		view()->composer('*', function($view){
  			$view->with('user', Auth::user());
		});
		
		// Remove Laravel default files
		File::delete(base_path('app').'/User.php');
		File::deleteDirectory(base_path('public').'/css');
		File::deleteDirectory(base_path('public').'/js');
		
    	// Copy project files
        $this->publishes([
        	__DIR__.'/project/database' => base_path('database'),
        	__DIR__.'/project/config' => base_path('config'),
        	__DIR__.'/project/routes' => base_path('routes'),
        	__DIR__.'/project/app' => base_path('app'),
        	__DIR__.'/project/resources' => base_path('resources'),
			__DIR__.'/project/public' => base_path('public')
    	], 'project');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    	
    }
}
