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

Route::resource('/shows', UserShowController::class)
    ->middleware(['auth', 'role:user,admin'])
    ->names('user.shows')
    ->only(['index', 'show']);

Route::resource('/admin/shows', AdminShowController::class)->middleware(['auth', 'role:admin'])->names('admin.shows');

Route::resource('/artists', UserArtistController::class)
    ->middleware(['auth', 'role:user,admin'])
    ->names('user.artists')
    ->only(['index', 'show']);

Route::resource('/admin/artists', AdminArtistController::class)->middleware(['auth', 'role:admin'])->names('admin.artists');

Route::resource('/venues', UserVenueController::class)
    ->middleware(['auth', 'role:user,admin'])
    ->names('user.venues')
    ->only(['index', 'show']);

Route::resource('/admin/venues', AdminVenueController::class)->middleware(['auth', 'role:admin'])->names('admin.venues');

require __DIR__.'/auth.php';