<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //mostra tutti gli utenti e passa tramite il compact del json
    function list(){
        $users = User::all();
        return view('admin/userslist',compact('users'));
    }
    //funzione che elimina utente e fa on-cascade delle tabelle
    function deleteUser(Request $request){
        DB::table('orders')->where('user_id',$request->deleteuser)->delete();
        DB::table('users')->where('id',$request->deleteuser)->delete();
        return redirect()->back()->with('alert', 'Eliminato con successo!'); //torno nella stessa pagina con alert
    }
    //rende il ruolo admin ad 1
    function promoteUser(Request $request){
        DB::table('users')->where('id',$request->promoteuser)->update(['admin' => 1]);
        return redirect()->back()->with('alert', 'Aggiornato con successo!'); //torno nella stessa pagina con alert
    }
    // invia tutti i prodotti alla pagina
    function modProdView(){
        $prods = Product::all();
        return view('admin/modprod',compact('prods'));
    }
    // fa una update della riga sul database in questione, è presente un if per vedere se è stata
    // modificato pure l'immagine del prodotto
    function updateProd(Request $request){
        if ($request->file('image' != null)){
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('images/db/',$filename);
            DB::table('products')->where('id',$request->updateprod)->update(['nome_prodotto' => $request->nome,
            'descrizione' => $request->desc, 'prezzo' => $request->prezzo, 'image' => $filename]);
        }
        else{
            DB::table('products')->where('id',$request->updateprod)->update(['nome_prodotto' => $request->nome,
            'descrizione' => $request->desc, 'prezzo' => $request->prezzo]);
        }
        return redirect()->back()->with('alert2', 'Aggiornato con successo!'); //torno nella stessa pagina con alert
    }
    //delete del prodotto on-cascade
    function deleteProd(Request $request){
        DB::table('orders')->where('product_id',$request->deleteprod)->delete();
        DB::table('products')->where('id',$request->deleteprod)->delete();
        return redirect()->back()->with('alert', 'Eliminato con successo!'); //torno nella stessa pagina con alert
    }
}
