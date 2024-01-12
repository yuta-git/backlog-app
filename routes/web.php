<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;


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

Route::prefix('projects')
    ->middleware(['auth'])
    ->controller(ProjectController::class)
    ->name('projects.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::prefix('/{id}')
            ->group(function () {
                Route::get('/tasks', 'show')->name('show');
                Route::get('/edit', 'edit')->name('edit');
                Route::post('', 'update')->name('update');
                Route::post('/destroy', 'destroy')->name('destroy');
            });
    });

Route::prefix('projects/{project_id}/tasks')
    ->middleware(['auth'])
    ->controller(TaskController::class)
    ->name('tasks.')
    ->group(function () {
        Route::get('create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::prefix('/{task_id}')
            ->group(function () {
                Route::get('/sub-tasks', 'show')->name('show');
                Route::get('/edit', 'edit')->name('edit');
                Route::post('', 'update')->name('update');
                Route::post('/destroy', 'destroy')->name('destroy');
            });
    });

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
