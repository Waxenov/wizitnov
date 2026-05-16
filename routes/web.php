<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\TransportersController;
use App\Http\Controllers\StagesController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ReviewController;

Route::get('/', [FeedbackController::class, 'showComments'], function () {
    return view('welcome');
})->name('welcome');

Route::get('/create', function () {
    return view('create');
})->name('create');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/about/', function () {
    return view('about');
});

Route::get('/about/{path}', function ($path) {
    $path = str_replace(['../', '..\\'], '', $path);
    $file = base_path('about/' . $path);

    if (! file_exists($file)) {
        abort(404);
    }

    return response()->file($file);
})->where('path', 'fonts/.*|favicon\.ico|logo\.svg|logow\.png|men\.png');

Route::get('/orderscustomer', function () {
    return view('orderscustomer');
})->name('orderscustomer');

Route::get('/orderstransporter', function () {
    return view('orderstransporter');
})->name('orderstransporter');

Route::get('/inworkdemo', function () {
    return view('inworkdemo');
})->name('inworkdemo');

Route::get('/showdemo', function () {
    return view('showdemo');
})->name('showdemo');

Route::get('/trashdemo', function () {
    return view('trashdemo');
})->name('trashdemo');

Route::get('/transporters', [TransportersController::class, 'showTransporters'], function () {
    return view('transporters');
})->name('transporters');

Route::get('/profiledemo', function () {
    return view('profiledemo');
})->name('profiledemo');

Route::get('/tarifs', function () {
    return view('tarifs');
})->name('tarifs');

Route::get('/contacts', function () {
    return view('contacts');
})->name('contacts');

Route::get('/project', [StagesController::class, 'showStages'], function () {
    return view('project');
})->name('project');

Route::get('/mediator', function () {
    return view('mediator');
})->name('mediator');

Route::get('/terms', function () {
    return view('terms');
})->name('terms');

Route::get('/policy', function () {
    return view('policy');
})->name('policy');

/*
 * Маршруты для авторизованного пользователя
 */

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    //метод вывода профиля
    Route::get('/profile/{id}', [UsersController::class, 'profile'])->name('user.profile');

    //метод вывода заказа
    Route::get('/orders/{id}', [OrdersController::class, 'show'])->name('orders.show');

    Route::post('/profile/{id}/reviews', [ReviewController::class, 'storeReview'])->name('user.reviews.store');
});

//дополнительные маршруты в зависимости от роли пользователя
Route::middleware(['auth'])->group(function () {

    //метод вывода заказов
    Route::get('/orders', [OrdersController::class, 'showOrders'],)->name('orders');

    Route::get('/trash', [OrdersController::class, 'trashOrders'],)->name('trash');

    Route::get('/inwork', [OrdersController::class, 'workOrders'],)->name('inwork');

    Route::delete('/welcome/{id}/erase', [FeedbackController::class, 'erase'])->name('welcome.erase');

    Route::get('/settings', [UsersController::class, 'showUsers'],)->name('settings');
    Route::delete('/settings/{id}/delete', [UsersController::class, 'delete'])->name('settings.delete');
    Route::delete('/settings/{id}/remove', [UsersController::class, 'remove'])->name('settings.remove');
    Route::delete('/settings/{id}/clear', [UsersController::class, 'clear'])->name('settings.clear');
    Route::put('/settings/{id}/updateRole', [UsersController::class, 'updateRole'])->name('settings.updateRole');
    Route::put('/settings/{id}/updateStatus', [UsersController::class, 'updateStatus'])->name('settings.updateStatus');

    //метод смены статуса заказа
    Route::post('/trash/{id}/processing', [OrdersController::class, 'processing'])->name('trash.processing');

    Route::post('/orders/{id}/accepted', [OrdersController::class, 'accepted'])->name('orders.accepted');

    Route::post('/orders/{id}/payable', [OrdersController::class, 'payable'])->name('orders.payable');

    Route::post('/orders/{id}/departing', [OrdersController::class, 'departing'])->name('orders.departing');

    Route::post('/orders/{id}/delivered', [OrdersController::class, 'delivered'])->name('orders.delivered');

    Route::post('/orders/{id}/deleted', [OrdersController::class, 'deleted'])->name('orders.deleted');

    Route::delete('/trash/{id}', [OrdersController::class, 'destroy'])->name('trash.destroy');

    Route::post('/orders/{order}/offer', [OrdersController::class, 'createOffer'])->name('orders.createOffer');
    Route::patch('/orders/{order}/agreed', [OrdersController::class, 'agreedOffer'])->name('orders.agreedOffer');
});
