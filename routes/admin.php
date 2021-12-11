<?php

use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Route::get('/', function() {
    print('I am an admin');
});

//Country Routes
Route::get('country', [CountryController::class, 'index'])->name('country.index');
Route::get('country/create', [CountryController::class, 'create'])->name('country.create');
Route::post('country', [CountryController::class, 'store'])->name('country.store');
Route::get('country/{country}', [CountryController::class, 'show'])->name('country.show');
Route::get('country/edit/{country}', [CountryController::class, 'edit'])->name('country.edit');
Route::put('country/{country}', [CountryController::class, 'update'])->name('country.update');
Route::post('country/{country}', [CountryController::class, 'destroy'])->name('country.destroy');

//State Routes
Route::get('state', [StateController::class, 'index'])->name('state.index');
Route::get('state/create', [StateController::class, 'create'])->name('state.create');
Route::post('state', [StateController::class, 'store'])->name('state.store');
Route::get('state/{state}', [StateController::class, 'show'])->name('state.show');
Route::get('state/edit/{state}', [StateController::class, 'edit'])->name('state.edit');
Route::put('state/{state}', [StateController::class, 'update'])->name('state.update');
Route::post('state/{state}', [StateController::class, 'destroy'])->name('state.destroy');
Route::post('/dataAjax', [StateController::class, 'dataAjax'])->name('dataAjax');

//City Routes
Route::get('city', [CityController::class, 'index'])->name('city.index');
Route::get('city/create', [CityController::class, 'create'])->name('city.create');
Route::post('city', [CityController::class, 'store'])->name('city.store');
Route::get('city/{city}', [CityController::class, 'show'])->name('city.show');
Route::get('city/edit/{city}', [CityController::class, 'edit'])->name('city.edit');
Route::put('city/{city}', [CityController::class, 'update'])->name('city.update');
Route::post('city/{city}', [CityController::class, 'destroy'])->name('city.destroy');
Route::post('/dataAjax', [CityController::class, 'dataAjax'])->name('dataAjax');

//Area Routes
Route::get('area', [AreaController::class, 'index'])->name('area.index');
Route::get('area/create', [AreaController::class, 'create'])->name('area.create');
Route::post('area', [AreaController::class, 'store'])->name('area.store');
Route::get('area/{area}', [AreaController::class, 'show'])->name('area.show');
Route::get('area/edit/{area}', [AreaController::class, 'edit'])->name('area.edit');
Route::put('area/{area}', [AreaController::class, 'update'])->name('area.update');
Route::post('area/{area}', [AreaController::class, 'destroy'])->name('area.destroy');


//Language Routes
Route::get('language', [LanguageController::class, 'index'])->name('language.index');
Route::get('language/create', [LanguageController::class, 'create'])->name('language.create');
Route::post('language', [LanguageController::class, 'store'])->name('language.store');
Route::get('language/{language}', [LanguageController::class, 'show'])->name('language.show');
Route::get('language/edit/{language}', [LanguageController::class, 'edit'])->name('language.edit');
Route::put('language/{language}', [LanguageController::class, 'update'])->name('language.update');
Route::post('language/{language}', [LanguageController::class, 'destroy'])->name('language.destroy');

