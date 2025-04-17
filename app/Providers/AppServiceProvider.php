<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Tricherie;
use App\Models\Placement;
use App\Models\Code;
use App\Models\Student;
use App\Models\Surveillance;
use App\Models\Promotion;
use Illuminate\Support\Facades\Route;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Route::bind("Promotion", function($value){
                return Promotion::where("id", $value)->firstOrFail();
        });

        Route::bind("Placement", function($value){
            return Placement::where("id", $value)->firstOrFail();
    });

        Route::bind("Student", function($value){
            return Student::where("id", $value)->firstOrFail();
        });

        Route::bind("Code", function($value){
            return Code::where("id", $value)->firstOrFail();
        });

        Route::bind("Surveillance", function($value){
            return Surveillance::where("id", $value)->firstOrFail();
        });

        Route::bind("Tricherie", function($value){
            return Tricherie::where("id", $value)->firstOrFail();
        });

    }
}
