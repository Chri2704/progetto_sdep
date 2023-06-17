<?php

use App\Http\Controllers\AdminController;
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

route::post('/upload_post', [Homecontroller::class, 'upload']); 

route::post('/new_order',[Homecontroller::class,'new_order']);

route::get('contatti', [Homecontroller::class, 'contatti']);

Route::get('/carrello',[Homecontroller::class,'showCarrello']);

route::post('/delete', [Homecontroller::class,'deleteCarrello']);

route::post('/deleteuser', [AdminController::class,'deleteUser']);

route::post('/deleteprod', [AdminController::class,'deleteProd']);

route::post('shop',[Homecontroller::class,'shopCarrello']);

Route::get('/catalogo',[ProductsController::class,'showCatalogo']);

//controlli per instradare solo gli admin in certe aree
Route::group(['middleware' => ['auth','admin']], function(){
    Route::get('/dashboard',function(){
        return view('dashboard');
    })->name('dashboard');
    Route::get('/admin/newprod',function(){
        return view('admin/newprod');
    })->name('admin/newprod');
    Route::get('/admin/userslist',[AdminController::class,'list'])->name('admin/userslist');
    Route::get('/admin/modprod',[AdminController::class,'modProdView'])->name('admin/modprod');
    Route::get('/admin/orders',function(){
        return view('admin/orders');
    })->name('admin/orders');
});