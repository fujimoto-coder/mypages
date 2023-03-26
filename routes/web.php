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
Route::controller(PagesController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('pages/create', 'add')->name('pages.add');
    Route::post('pages/create', 'create')->name('pages.create');
    Route::get('pages', 'index')->name('pages.index');
    Route::get('pages/edit', 'edit')->name('pages.edit');
    Route::post('pages/edit', 'update')->name('pages.update');
    Route::get('pages/delete', 'delete')->name('pages.delete');
});

use App\Http\Controllers\Admin\ProfileController;
Route::controller(ProfileController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('profile/create', 'add')->name('profile.add');
    Route::post('profile/create', 'create')->name('profile.create');
    Route::get('profile', 'index')->name('profile.index');
    Route::get('profile/edit', 'edit')->name('profile.edit');
    Route::post('profile/edit', 'update')->name('profile.update');
    Route::get('profile/delete', 'delete')->name('profile.delete');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\PagesController as PublicPagesController;
Route::controller(PublicPagesController::class)->name('pages.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('show_music', 'show_music')->name('show_music');
    Route::get('/', 'index')->name('index');
    Route::get('show_artist', 'show_artist')->name('show_artist');
    Route::get('/', 'index')->name('index');
    Route::get('show_instrument', 'show_instrument')->name('show_instrument');
    Route::get('/', 'index')->name('index');
    Route::get('show_live', 'show_live')->name('show_live');
    Route::get('/', 'index')->name('index');
    Route::get('show_lesson', 'show_lesson')->name('show_lesson');
    Route::get('/', 'index')->name('index');
    Route::get('show_bar', 'show_bar')->name('show_bar');
    Route::get('/', 'index')->name('index');
    Route::get('show_operation', 'show_operation')->name('show_operation');
    Route::get('/', 'index')->name('index');
});


   
