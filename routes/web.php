<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [DashboardController::class, 'indexLight'])->name('homepage');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth', 'verified'])
->prefix('admin')
->name('admin.')
->group(function () {
    Route::get('/profile', [DashboardController::class, 'index'])->name('home.index');
    Route::get('/portfolio/create', [DashboardController::class, 'create'])->name('portfolio.create');
    Route::get("/portfolio/{project}", [DashboardController::class, "show"])->name("portfolio.show");
    Route::post("/portfolio", [DashboardController::class, "store"])->name("portfolio.store");
    Route::patch('/profile', [DashboardController::class, 'update'])->name('admin.update');
    Route::get("/portfolio/{project}/edit", [DashboardController::class, "edit"])->name("portfolio.edit");
    Route::put("/portfolio/{project}", [DashboardController::class, "update"])->name("portfolio.update");
    Route::delete('/delete/{project}', [DashboardController::class, 'destroy'])->name('portfolio.destroy');
    Route::delete('/portfolio', [DashboardController::class, 'logout'])->name('admin.logout');
});

require __DIR__.'/auth.php';
