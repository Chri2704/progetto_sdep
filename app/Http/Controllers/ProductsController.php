<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductsController extends Controller
{
    //
    function show(){ //permette di inviare i dati dal database alla view
        $products=Product::all();
        return view('home/index',compact('products'));
    }
}
