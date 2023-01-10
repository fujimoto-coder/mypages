<?php

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

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\Admin\PagesController;
Route::controller(PagesController::class)->prefix('admin')->group(function() {
    Route::get('pages/create', 'add')->middleware('auth');
});

use App\Http\Controllers\Admin\ProfileController;
Route::controller(ProfileController::class)->prefix('admin')->name('admin.')->group(function () {
    Route::get('profile/create', 'add')->name('profile.add');
    Route::post('profile/create', 'create')->name('profile.create')->middleware('auth');
    Route::get('profile', 'index')->name('profile.index');
    Route::get('profile/edit', 'edit')->name('profile.edit')->middleware('auth');
    Route::post('profile/edit', 'update')->name('profile.update');
    Route::get('profile/delete', 'delete')->name('profile.delete');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
