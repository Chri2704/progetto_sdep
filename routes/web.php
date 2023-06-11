<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\Homecontroller; //route Home controller

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

route::get('/', [Homecontroller::class, 'index']); //in questo modo nell' / verrà richiamato nel controller home controller la funzione index
Route::get('/',[ProductsController::class,'show']); //per passare i dati alla view dal controller
route::post('/upload_post', [Homecontroller::class, 'upload']); 

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
