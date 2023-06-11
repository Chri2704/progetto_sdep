<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductsController extends Controller
{
    function showCatalogo(){ //permette di inviare i dati dal database alla view
        $products=Product::all();
        return view('catalogo',compact('products'));
    }
}
