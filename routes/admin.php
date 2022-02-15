<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CmsController;
use App\Http\Controllers\Admin\ConfigurationController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PasswordController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SeoController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\VisitorController;
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

Route::get('', function () {
    return redirect()->route('customer.index');
});
Route::resource('cms', CmsController::class)->parameter('cms', 'cms');
Route::resource('profile', ProfileController::class)->parameter('profile', 'user');
Route::resource('change-password', PasswordController::class)->parameter('change-password', 'user');
Route::get('configuration/{slug}', [ConfigurationController::class, 'index'])->name('configuration.index');
Route::post('configuration/store', [ConfigurationController::class, 'store'])->name('configuration.store');
Route::resource('visitor', VisitorController::class);
Route::resource('customer', CustomerController::class);
Route::resource('category', CategoryController::class);
Route::get('{masterCategory}/category', [CategoryController::class, 'getCategoryList'])->name('master.category');
Route::post('category/order', [CategoryController::class, 'order']);
Route::resource('post', PostController::class);
Route::resource('page', PageController::class);
Route::resource('slide', SlideController::class);
Route::post('slide/order', [SlideController::class, 'order']);
Route::post('image/destroy', [ImageController::class, 'destroy']);
Route::resource('seo', SeoController::class);

Route::get('dropzone', function () {
    return view('admin.sample.dropzone');
});
