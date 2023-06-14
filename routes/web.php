<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\Homecontroller; //route Home controller
use Laravel\Fortify\RoutePath;

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

route::get('/menu',[Homecontroller::class,'menu']);

route::post('/upload_post', [Homecontroller::class, 'upload']); 

route::post('/new_order',[Homecontroller::class,'new_order']);

route::get('contatti', [Homecontroller::class, 'contatti']);

Route::get('/carrello',[Homecontroller::class,'showCarrello']);

route::post('/delete', [Homecontroller::class,'deleteCarrello']);

Route::get('/catalogo',[ProductsController::class,'showCatalogo']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

