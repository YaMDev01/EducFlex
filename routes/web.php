<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

Route::resource('/classe', App\Http\Controllers\ClasseController::class)->except(['show']);
Route::resource('/school_year', App\Http\Controllers\SchoolYearController::class)->except(['show']);
Route::resource('/nationalite', App\Http\Controllers\GestionNationalityController::class)->except(['show']);
Route::resource('/coefficient', App\Http\Controllers\CoefficientController::class)->except(['show']);
Route::resource('/matiere', App\Http\Controllers\DisciplineController::class)->except(['show']);
Route::resource('/scolarite', App\Http\Controllers\SchoolingController::class)->except(['show']);
Route::resource('/level', App\Http\Controllers\LevelController::class)->except(['create','store','show','edit','update','destroy']);
Route::resource('/cycle', App\Http\Controllers\CycleController::class)->except(['create','store','show','edit','destroy']);
Route::resource('/serie', App\Http\Controllers\SerieController::class)->except(['show']);
Route::resource('/school', App\Http\Controllers\GestionSchoolController::class)->except(['show','destroy']);
Route::resource('/licence', App\Http\Controllers\GestionLicenceController::class)->except(['show','destroy']);