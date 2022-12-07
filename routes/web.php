<?php

use App\Http\Controllers\PlantController;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [PlantController::class, 'index'])->name('plant.index');
Route::get('/create', [PlantController::class, 'create'])->name('plant.create');
Route::post('/create', [PlantController::class, 'store'])->name('plant.store');
Route::get('/edit-plant/{plant:id}', [PlantController::class, 'edit'])->name('plant.edit');
Route::put('/edit-plant/{plant:id}', [PlantController::class, 'update'])->name('plant.update');
Route::delete('/delete-plant/{plant:id}', [PlantController::class, 'destroy'])->name('plant.destroy');