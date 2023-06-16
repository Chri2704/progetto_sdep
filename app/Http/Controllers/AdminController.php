<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    function list(){
        $users = User::all();
        return view('admin/userslist',compact('users'));
    }
    function deleteUser(Request $request){
        DB::table('orders')->where('user_id',$request->deleteuser)->delete();
        DB::table('users')->where('id',$request->deleteuser)->delete();
        return redirect()->back()->with('alert', 'Eliminato con successo!'); //torno nella stessa pagina con alert
    }
    function modProdView(){
        $prods = Product::all();
        return view('admin/modprod',compact('prods'));
    }
    function deleteProd(Request $request){
        DB::table('orders')->where('product_id',$request->deleteuser)->delete();
        DB::table('products')->where('id',$request->deleteuser)->delete();
        return redirect()->back()->with('alert', 'Eliminato con successo!'); //torno nella stessa pagina con alert
    }
}
