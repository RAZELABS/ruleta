<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\CotizacionesController;
use App\Http\Controllers\Admin\ConfiguracionesController;
use App\Http\Controllers\Admin\ParametrosController;
use App\Http\Controllers\Admin\DetalleController;
use App\Http\Controllers\Admin\TiendaController;
use App\Http\Controllers\Admin\MatrizdiaController;
use App\Http\Controllers\Admin\MatriztiendaController;
use App\Http\Controllers\Admin\MatrizturnoController;

use App\Http\Controllers\RolesPermissions\RoleController;
use App\Http\Controllers\RolesPermissions\PermissionController;
use App\Http\Controllers\RolesPermissions\UserController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend.index');
});



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'role:superadmin|admin|user'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/configuraciones', [ConfiguracionesController::class, 'index'])->name('configuraciones');
    Route::get('/detalle', [DetalleController::class, 'index'])->name('detalle');
    //?profile
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //?USERS
    Route::resource('parametros', ParametrosController::class);
    Route::resource('tienda', TiendaController::class);
    Route::resource('matrizdia', MatrizdiaController::class);
    Route::resource('matriztienda', MatriztiendaController::class);
    Route::resource('matrizturno', MatrizturnoController::class);

});
Route::middleware(['auth', 'role:superadmin|admin|user'])->group(function () {
     //?ROLES
     Route::get('permissions/{permissionId}/delete', [PermissionController::class, 'destroy']);
     Route::resource('permissions', PermissionController::class);

     Route::get('roles/{roleId}/delete', [RoleController::class, 'destroy']);
     Route::get('roles/{roleId}/give-permissions', [RoleController::class, 'addPermissionToRole']);
     Route::put('roles/{roleId}/give-permissions', [RoleController::class, 'givePermissionToRole']);
     Route::resource('roles', RoleController::class);

     Route::get('users/{userId}/delete', [UserController::class, 'destroy']);
     Route::resource('users', UserController::class);
});


require __DIR__ . '/auth.php';
