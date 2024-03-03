<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DatabarangController;
use App\Http\Controllers\DataPeminjamanController;
use App\Http\Controllers\ServisController;
use App\Http\Controllers\RuangController;

Route::post('/ruang', [RuangController::class, 'store']);



Route::post('/servis', [ServisController::class, 'store']);
Route::get('/servis', [ServisController::class, 'index']);




Route::post('/peminjaman', [DataPeminjamanController::class, 'store']);

Route::post('/databarang', [DatabarangController::class, 'store']);
Route::put('/databarang/{databarang}', [DatabarangController::class, 'update']);
Route::delete('/databarang/{databarang}', [DatabarangController::class, 'destroy']);

// Route untuk menampilkan profil pengguna
Route::post('/profile/create',[ProfileController::class,'store']);
Route::get('/profiles/{id}', [ProfileController::class,'show']);
Route::put('/profiles/{id}', [ProfileController::class,'update']);


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * route "/register"
 * @method "POST"
 */
Route::post('/register', App\Http\Controllers\Api\RegisterController::class)->name('register');

/**
 * route "/login"
 * @method "POST"
 */
Route::post('/login', App\Http\Controllers\Api\LoginController::class)->name('login');

/**
 * route "/logout"
 * @method "POST
 */
Route::group(['middleware' => 'auth:api'],function(){
    Route::post('/logout', \App\Http\Controllers\Api\LogoutController::class)->name('logout');

});