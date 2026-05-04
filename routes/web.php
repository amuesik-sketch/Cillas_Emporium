<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CillasController;

/*
|--------------------------------------------------------------------------
| Main Pages
|--------------------------------------------------------------------------
*/

Route::get('/', [CillasController::class, 'index'])->name('index');
Route::get('/about', [CillasController::class, 'about'])->name('about');
Route::get('/products', [CillasController::class, 'products'])->name('products');
Route::get('/features', [CillasController::class, 'features'])->name('features');
Route::get('/how_to_use', [CillasController::class, 'how_to_use'])->name('how_to_use');
Route::get('/testimonials', [CillasController::class, 'testimonials'])->name('testimonials');
Route::get('/blogs', [CillasController::class, 'blogs'])->name('blogs');
Route::get('/contacts', [CillasController::class, 'contacts'])->name('contacts');
Route::post('/contacts', [CillasController::class, 'storeContact'])->name('contacts.store');
Route::get('/404', [CillasController::class, 'notfound'])->name('404');

/*
|--------------------------------------------------------------------------
| Checkout & Orders
|--------------------------------------------------------------------------
*/

Route::get('/checkout', [CillasController::class, 'checkout'])->name('checkout');
Route::post('/checkout', [CillasController::class, 'processCheckout'])->name('checkout.process');
Route::post('/billings', [CillasController::class, 'storeBillings'])->name('billings.store');

Route::get('/track-order', [CillasController::class, 'trackOrderForm'])->name('track.form');
Route::post('/track-order', [CillasController::class, 'trackOrder'])->name('track.order');
Route::get('/order/{order_number}', [CillasController::class, 'orderDetails'])->name('order.details');

/*
|--------------------------------------------------------------------------
| Cart Routes
|--------------------------------------------------------------------------
*/

Route::post('/cart/add', [CillasController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CillasController::class, 'cart'])->name('cart');

Route::delete('/cart/remove/{id}', [CillasController::class, 'removeFromCart'])
    ->name('cart.remove');

Route::post('/cart/increase/{id}', [CillasController::class, 'increase'])->name('cart.increase');
Route::post('/cart/decrease/{id}', [CillasController::class, 'decrease'])->name('cart.decrease');

/* Safety fallback */
Route::post('/cart', fn () => redirect()->route('cart'));

/*
|--------------------------------------------------------------------------
| Appointments
|--------------------------------------------------------------------------
*/

/* NAILS */
Route::get('/appointments/nails', [CillasController::class, 'nails'])
    ->name('appointments.nails');

Route::post('/appointments/nails', [CillasController::class, 'storeNail'])
    ->name('nails.store');

/* MAKEUP */
Route::get('/appointments/makeup', function () {
    return view('appointments.makeup');
})->name('appointments.makeup');

/* PEDICURE */
Route::get('/appointments/pedicure', function () {
    return view('appointments.pedicure');
})->name('appointments.pedicure');

Route::post('/appointments/pedicure', [CillasController::class, 'storePedicure'])
    ->name('pedicure.appointment');

/* LASHES */
Route::get('/appointments/lashes', [CillasController::class, 'lashes'])
    ->name('appointments.lashes');

Route::post('/appointments/lashes', [CillasController::class, 'storeLashAppointment'])
    ->name('lash.appointment');
// View appointment
Route::get('/appointments/nails/view/{reference}',
    [CillasController::class, 'viewNail']
)->name('nails.view');

// Edit form
Route::get('/appointments/nails/edit/{reference}',
    [CillasController::class, 'editNail']
)->name('nails.edit');

// Update appointment
Route::put('/appointments/nails/update/{reference}',
    [CillasController::class, 'updateNail']
)->name('nails.update');

// Delete appointment
Route::delete('/appointments/nails/delete/{reference}',
    [CillasController::class, 'deleteNail']
)->name('nails.delete');
/* MAKEUP */
Route::get('/appointments/makeup', fn () => view('appointments.makeup'))
    ->name('appointments.makeup');

Route::post('/appointments/makeup', [CillasController::class, 'storeMakeup'])
    ->name('makeup.store');

Route::get('/appointments/makeup/view/{reference}', [CillasController::class, 'viewMakeup'])
    ->name('makeup.view');

Route::get('/appointments/makeup/edit/{reference}', [CillasController::class, 'editMakeup'])
    ->name('makeup.edit');

Route::put('/appointments/makeup/update/{reference}', [CillasController::class, 'updateMakeup'])
    ->name('makeup.update');

Route::delete('/appointments/makeup/delete/{reference}', [CillasController::class, 'deleteMakeup'])
    ->name('makeup.delete');
/* PEDICURE */
Route::get('/appointments/pedicure',
    [CillasController::class, 'pedicure']
)->name('appointments.pedicure');

Route::post('/appointments/pedicure',
    [CillasController::class, 'storePedicure']
)->name('pedicure.appointment');

Route::get('/appointments/pedicure/view/{reference}',
    [CillasController::class, 'viewPedicure']
)->name('pedicure.view');

Route::get('/appointments/pedicure/edit/{reference}',
    [CillasController::class, 'editPedicure']
)->name('pedicure.edit');

Route::put('/appointments/pedicure/update/{reference}',
    [CillasController::class, 'updatePedicure']
)->name('pedicure.update');

Route::delete('/appointments/pedicure/delete/{reference}',
    [CillasController::class, 'deletePedicure']
)->name('pedicure.delete');

Route::get('/order/{order_number}', [CillasController::class, 'show'])->name('order.details');
