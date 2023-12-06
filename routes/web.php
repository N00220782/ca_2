<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\ShowController as AdminShowController;
use App\Http\Controllers\User\ShowController as UserShowController;
use App\Http\Controllers\Admin\ArtistController as AdminArtistController;
use App\Http\Controllers\User\ArtistController as UserArtistController;
use App\Http\Controllers\Admin\VenueController as AdminVenueController;
use App\Http\Controllers\User\VenueController as UserVenueController;

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



Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //Route::resource('venues', VenueController::class);
    //Route::resource('shows', ShowController::class);
    //Route::resource('artists', ArtistController::class);


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/home', [HomeController::class, 'index'])->name('home.index');

Route::get('/shows', [UserShowController::class, 'index'])->middleware(['auth', 'role:user,admin'])->name('shows.index');
Route::get('/shows/{show}', [UserShowController::class, 'show'])->middleware(['auth', 'role:user,admin'])->name('shows.show');

Route::resource('/admin/shows', AdminShowController::class)->middleware(['auth', 'role:admin'])->names('admin.shows');
Route::post('admin/shows/{show}', [AdminShowController::class, 'update'])->middleware(['auth', 'role:admin'])->name('shows.update');
Route::delete('admin/shows/{show}', [AdminShowController::class, 'destroy'])->middleware(['auth', 'role:admin'])->name('shows.destroy');

Route::get('/artists', [UserArtistController::class, 'index'])->middleware(['auth', 'role:user,admin'])->name('artists.index');
Route::get('/artists/{artist}', [UserArtistController::class, 'show'])->middleware(['auth', 'role:user,admin'])->name('artists.show');

Route::resource('/admin/artists', AdminArtistController::class)->middleware(['auth', 'role:admin'])->names('admin.artists');
Route::post('admin/artists/{artist}', [AdminArtistController::class, 'update'])->middleware(['auth', 'role:admin'])->name('artists.update');
Route::delete('admin/artists/{artist}', [AdminArtistController::class, 'destroy'])->middleware(['auth', 'role:admin'])->name('artists.destroy');

Route::get('/venues', [UserVenueController::class, 'index'])->middleware(['auth', 'role:user,admin'])->name('venues.index');
Route::get('/venues/{venue}', [UserVenueController::class, 'show'])->middleware(['auth', 'role:user,admin'])->name('venues.show');

Route::resource('/admin/venues', AdminVenueController::class)->middleware(['auth', 'role:admin'])->names('admin.venues');
Route::post('admin/venues/{venue}', [AdminVenueController::class, 'update'])->middleware(['auth', 'role:admin'])->name('venues.update');
Route::delete('admin/venues/{venue}', [AdminVenueController::class, 'destroy'])->middleware(['auth', 'role:admin'])->name('venues.destroy');

require __DIR__.'/auth.php';