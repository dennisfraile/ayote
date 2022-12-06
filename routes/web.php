<?php

use App\Http\Controllers\EnlacePagoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Models\User;
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
    return view('dashboard');
})->name('home');
Route::resource('/enlacepago', EnlacePagoController::class)->names('enlacepago');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('/users', UserController::class)->middleware('can:admin.user.index')->names('users');
    Route::resource('/roles', RoleController::class)->middleware('can:admin.role.index')->names('roles');
    Route::get('/transacciones', function () {
        return view('transacciones');
    })->middleware('can:user.transaccion.dashboard')->name('transacciones');
    
});
