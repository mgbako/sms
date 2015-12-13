<?php
namespace Scholr\Providers;

use Illuminate\Support\ServiceProvider;
use Scholr\Student;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('partials.studentDashboard', function($view) {
            $view->with('student', Student::where('id', \Auth::user()->student_id)->first());
        });

        view()->composer('partials.profileDashboard', function($view) {
            $view->with('student', Student::where('id', \Auth::user()->student_id)->first());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    
    public function register()
    {
        if ($this->app->environment() == 'local') {
            $this->app->register('Laracasts\Generators\GeneratorsServiceProvider');
        }
    }
}
