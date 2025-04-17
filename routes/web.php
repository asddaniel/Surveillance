<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SurveillanceController;
use App\Http\Controllers\PlacementController;
use App\Http\Controllers\CodeController;



Route::get('/', function () {
    return view('welcome');
});
Route::get("/home", [MainController::class, 'home'])->name("home");
Route::get("/promotion", [PromotionController::class, 'index'])->name("promotion.index");
Route::put("/promotion/{Promotion}", [PromotionController::class, "update"])->name("promotion.update");
Route::get("/promotion/{Promotion}", [PromotionController::class, "edit"])->name("promotion.edit");
Route::post("/promotion", [PromotionController::class, "store"])->name("promotion.store");
Route::get("/promotion/{Promotion}/delete", [PromotionController::class, "destroy"])->name("promotion.delete");

//students

Route::get("/students", [StudentController::class, 'index'])->name("student.index");
Route::put("/students/{Student}", [StudentController::class, "update"])->name("student.update");
Route::get("/students/{Student}", [StudentController::class, "edit"])->name("student.edit");
Route::post("/students", [StudentController::class, "store"])->name("student.store");
Route::get("/students/{Student}/delete", [StudentController::class, "destroy"])->name("student.delete");


Route::get("/surveillance", [SurveillanceController::class, 'index'])->name("surveillance.index");
Route::put("/surveillance/{Surveillance}", [SurveillanceController::class, "update"])->name("surveillance.update");
Route::get("/surveillance/{Surveillance}", [SurveillanceController::class, "edit"])->name("surveillance.edit");
Route::post("/surveillance", [SurveillanceController::class, "store"])->name("surveillance.store");
Route::get("/surveillance/{Surveillance}/delete", [SurveillanceController::class, "destroy"])->name("surveillance.delete");
Route::get("/surveillance/{Surveillance}/resolve", [SurveillanceController::class, "resolve"])->name("surveillance.resolve");



Route::get("/placement", [PlacementController::class, 'index'])->name("placement.index");
Route::put("/placement/{Placement}", [PlacementController::class, "update"])->name("placement.update");
Route::get("/placement/{Placement}", [PlacementController::class, "edit"])->name("placement.edit");
Route::post("/placement", [PlacementController::class, "store"])->name("placement.store");
Route::post("/placement/autogenerate", [PlacementController::class, "autoPlace"])->name("placement.autoplace");
Route::get("/placement/{Placement}/delete", [PlacementController::class, "destroy"])->name("placement.delete");

Route::get("/codes", [CodeController::class, 'index'])->name("code.index");
Route::put("/codes/{Code}", [CodeController::class, "update"])->name("code.update");
Route::get("/codes/{Code}/edit", [CodeController::class, "edit"])->name("code.edit");
Route::post("/codes", [CodeController::class, "store"])->name("code.store");
Route::get("/codes/{Code}/delete", [CodeController::class, "destroy"])->name("code.delete");





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
