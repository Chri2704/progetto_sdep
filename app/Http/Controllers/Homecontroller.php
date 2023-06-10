<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Homecontroller extends Controller //classe home controller
{
    public function index(){  //la funzione ritornerà il file home.index.php che verrà usata come home page
        return view('home.index');
    }
}
