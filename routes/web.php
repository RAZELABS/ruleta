<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RolesPermissions\PermissionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend.index');
});
Route::get('/aboutus', function () {
    return view('frontend.aboutus');
});
Route::get('/services', function () {
    return view('frontend.services');
});
Route::get('/portfolio', function () {
    return view('frontend.portfolio');
});
Route::get('/contact', function () {
    return view('frontend.contact');
});



Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('permissions', PermissionController::class);

Route::middleware(['auth', 'role:superadmin|admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    //?profile
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //?USERS
    Route::resource('users', UserController::class);
    //? COTIZACIONES
    Route::resource('cotizaciones', \App\Http\Controllers\Admin\CotizacionesController::class);
    // Route::resource('banners', \App\Http\Controllers\Admin\BannerController::class);
    // Route::resource('testimonials', \App\Http\Controllers\Admin\TestimonialController::class);
    // Route::resource('galleries', \App\Http\Controllers\Admin\GalleryController::class);

    // Ruta para editar el footer (asumiendo que solo hay una configuración)
    // Route::get('footer/edit', [\App\Http\Controllers\Admin\FooterController::class, 'edit'])->name('footer.edit');
    // Route::put('footer', [\App\Http\Controllers\Admin\FooterController::class, 'update'])->name('footer.update');
});



require __DIR__ . '/auth.php';
