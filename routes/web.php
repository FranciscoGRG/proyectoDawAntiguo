<?php

use App\Http\Controllers\RouteController;
use App\Http\Controllers\OfferController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Offer_CategoryController;
use App\Http\Controllers\Admin\Route_CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CommentController;

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

/* Route::get('/', function () {
    return view('routes.index');
}); */

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

/* Aqui se crean todas las rutas que son administradas por los controladores y sus funciones */

Route::get('/', [RouteController::class, 'index'])->name('route.index');

Route::get('route/your-routes', [RouteController::class, 'index2'])->name('route.index2');

Route::get('offer/your-offers', [OfferController::class, 'index2'])->name('offer.index2');

Route::resource('route', RouteController::class)->names('route');

Route::resource('offer', OfferController::class)->names('offer');

Route::resource('offer_categories', Offer_CategoryController::class)->except('show')->names('offer_categories');

Route::resource('route_categories', Route_CategoryController::class)->except('show')->names('route_categories');

Route::resource('users', UserController::class)->names('admin.users');

Route::get('category/{category}', [RouteController::class, 'category'])->name('route.category');

Route::post('comment/store/{route}', [CommentController::class, 'store'])->name('comment.store');

Route::delete('comment/destroy/{comment}/{route}', [CommentController::class, 'destroy'])->name('comment.destroy');

Route::put('comment/update/{comment}/{route}', [CommentController::class, 'update'])->name('comment.update');

Route::get('comment/edit/{route}/{comment}', [CommentController::class, 'edit'])->name('comment.edit');

Route::get('category/offer/{category}', [OfferController::class, 'category'])->name('offer.category');