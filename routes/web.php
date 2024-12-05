<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ConfiguracionesController;
use App\Http\Controllers\Admin\ParametrosController;
use App\Http\Controllers\Admin\DetalleController;
use App\Http\Controllers\Admin\TiendaController;
use App\Http\Controllers\Admin\TiendapremioController;
use App\Http\Controllers\Admin\MatrizdiaController;
use App\Http\Controllers\Admin\MatriztiendaController;
use App\Http\Controllers\Admin\MatrizturnoController;
use App\Http\Controllers\Admin\PremiosController;
use App\Http\Controllers\Admin\KioscoController;
use App\Http\Controllers\Front\IndexController;
use App\Http\Controllers\Front\RuletaController;
use App\Http\Controllers\RolesPermissions\RoleController;
use App\Http\Controllers\RolesPermissions\PermissionController;
use App\Http\Controllers\RolesPermissions\UserController;
use App\Http\Controllers\Front\VerificacionController;

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('frontend.index');
// });


// Route::get('/', [indexController::class, 'index']);
Route::get('/', [IndexController::class, 'index'])
    ->middleware('check.tienda')
    ->name('home');

Route::view('/error-tienda', 'frontend.error-tienda')
    ->name('error.tienda');

Route::post('/verificar', [IndexController::class, 'verificar'])->name('verificar');

Route::get('/ruleta', [RuletaController::class, 'index'])->name('ruleta.index');
Route::get('/ruleta/ganador', [RuletaController::class, 'ganador'])->name('ruleta.ganador');
Route::get('/ruleta/sorry', [RuletaController::class, 'sorry'])->name('ruleta.sorry');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'role:superadmin|admin|user'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/configuraciones', [ConfiguracionesController::class, 'index'])->name('configuraciones');
    Route::get('/detalle/{id}/disabled', [DetalleController::class, 'disabled'])->name('detalle.disabled');
    Route::get('/detalle', [DetalleController::class, 'index'])->name('detalle');
    //?profile
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //?USERS
    Route::resource('parametros', ParametrosController::class);
    //? TIENDAS
    Route::get('/generar-qrs', [TiendaController::class, 'generarQrs'])->name('generar.qrs');
    Route::get('tienda/{id}/disabled', [TiendaController::class, 'disabled'])->name('tienda.disabled');
    Route::resource('tienda', TiendaController::class);
    Route::resource('tiendapremio', TiendapremioController::class);

    //? MATRIZ DIA
    Route::post('/matrizdia/{id}/update', [MatrizdiaController::class, 'update'])->name('matrizdia.update');
    Route::resource('matrizdia', MatrizdiaController::class);
    //? MATRIZ TIENDA
    Route::post('/matriztienda/{id}/update', [MatriztiendaController::class, 'update'])->name('matriztienda.update');
    Route::resource('matriztienda', MatriztiendaController::class);
    //? MATRIZ TURNO
    Route::post('/matrizturno/{id}/update', [MatrizturnoController::class, 'update'])->name('matrizturno.update');
    Route::resource('matrizturno', MatrizturnoController::class);
    //? MATRIZ PREMIOS
    Route::get('/premios/{id}/disabled', [PremiosController::class, 'disabled'])->name('premios.disabled');
    Route::post('/premios/store', [PremiosController::class, 'store'])->name('premios.store');
    Route::post('/premios/{id}/update', [PremiosController::class, 'update'])->name('premios.update');
    Route::resource('premios', PremiosController::class);
    //? MATRIZ PREMIOS POR TIENDA
    Route::get('/tiendapremio/{id}/disabled', [TiendapremioController::class, 'disabled'])->name('tiendapremio.disabled');
    Route::post('/tiendapremio/store', [TiendapremioController::class, 'store'])->name('tiendapremio.store');
    Route::post('/tiendapremio/{id}/update', [TiendapremioController::class, 'update'])->name('tiendapremio.update');
    Route::resource('tiendapremio', TiendapremioController::class);
    //! CArga MASIVA KIOSKO
    // routes/web.php
Route::get('/kiosco', [KioscoController::class, 'index'])->name('kiosco.index');
Route::post('/kiosco/import', [KioscoController::class, 'import'])->name('kiosco.import');
Route::get('/kiosco/download/{filename}', [KioscoController::class, 'download'])->name('kiosco.download');
Route::resource('kiosco', KioscoController::class);
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
