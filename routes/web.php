<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\FrontController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [FrontController::class,'index'])->name('index');
Route::get('/agent/{id}', [FrontController::class,'agentList'])->name('front-agent');
Route::get('/agent/detail/{id}', [FrontController::class,'agent'])->name('frontend-agent');
Route::get('/package/{id}', [FrontController::class,'package'])->name('frontend-package');
Route::get('/city', [FrontController::class,'kota'])->name('frontend-city');

Route::prefix('admin')
     ->group(function(){
          Route::prefix('city')
          ->group(function(){
               Route::get('/', [CityController::class,'index'])->name('city');
               Route::get('/create', [CityController::class,'form'])->name('city-create');
               Route::post('/city', [CityController::class,'store'])->name('city-store');
               Route::get('/{city}/edit', [CityController::class,'form'])->name('city-edit');
               Route::post('/{city}/update', [CityController::class,'store'])->name('city-update');
               Route::get('/{city}/delete', [CityController::class,'destroy'])->name('city-delete');
          });

          Route::prefix('place')
          ->group(function(){
               Route::get('/', [PlaceController::class,'index'])->name('place');
               Route::get('/create', [PlaceController::class,'form'])->name('place-create');
               Route::post('/city', [PlaceController::class,'store'])->name('place-store');
               Route::get('/{place}/edit', [PlaceController::class,'form'])->name('place-edit');
               Route::post('/{place}/update', [PlaceController::class,'store'])->name('place-update');
               Route::get('/{place}/delete', [PlaceController::class,'destroy'])->name('place-delete');
          });

          Route::prefix('agent')
          ->group(function(){
               Route::get('/', [AgentController::class,'index'])->name('agent');
               Route::get('/create', [AgentController::class,'form'])->name('agent-create');
               Route::post('/city', [AgentController::class,'store'])->name('agent-store');
               Route::get('/{agent}/edit', [AgentController::class,'form'])->name('agent-edit');
               Route::post('/{agent}/update', [AgentController::class,'store'])->name('agent-update');
               Route::get('/{agent}/delete', [AgentController::class,'destroy'])->name('agent-delete');
               Route::get('/{agent}/package', [AgentController::class,'package'])->name('agent-package');
               Route::get('/{id}/package/create', [AgentController::class,'packageForm'])->name('agent-package-create');
               Route::post('/{id}/package/store', [AgentController::class,'packageStore'])->name('agent-package-store');
               Route::get('/{id}/package/edit/{package}', [AgentController::class,'packageForm'])->name('agent-package-edit');
               Route::post('/{id}/package/update/{package}', [AgentController::class,'packageStore'])->name('agent-package-update');
               Route::get('/{package}/package/destroy', [AgentController::class,'packageDestroy'])->name('agent-package-delete');
          });
});
