<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Orders;
use Illuminate\Support\Facades\DB; //serve per query modifica
use Illuminate\Support\Facades\Auth; //serve per mail utente
class Homecontroller extends Controller //classe home controller
{
    public function index(){  //la funzione ritornerà il file home.index.php che verrà usata come home page
        return view('home.index');
    }

    public function upload(Request $request){

        $data = new Product; //data oggetto di tipo product 
        $data->nome_prodotto = $request->name; // nel nome prodotto di product inserisco ciò che mando con la POST dell'input del form
        $data->prezzo = $request->price;
        $data->descrizione = $request->description;
        //quantità disponibile
        $data->disponibili = $request->dispo;
        //passi per salvare immagine
        $file = $request->file('image');
        $extention = $file->getClientOriginalExtension();
        $filename = time().'.'.$extention;
        $file->move('images/db/',$filename);
        $data->image = $filename;

        $data->save(); //penso salvi il formato interno di $data

        return redirect()->back(); //alla fine della funzione ritorna nella stessa pagina (quindi di nuovo nella dashbpard)

    }
    function new_order(Request $request){
        $order = new Orders; //oggetto ordine
        $order->product_id = $request-> product_id; //in questo modo posso prendere l'input che ha name = product_id e lo metto dentro l'oggetto order
        $order->user_id = auth()->id(); //in questo modo passo l'id senza fare request
        $order->quantity = $request->quantity; //quantità prodotti ordinati
        $order->save(); //salvo i dati dentro orders

        return redirect()->back()->with('alert', 'Inserito nel carrello!'); //torno nella stessa pagina

    }
    public function contatti(){
        return view('contatti');
    }
    function menu(){
        return view('menu');
    }
    function showCarrello(){ //permette di inviare i dati dal database alla view
        //utilizzo DB perchè utilizzando il modello Orders la join non mi permette di utilizzare
        //4 parametri ma soltanto 2!
        $orders = DB::table('orders')
        ->join('products','orders.product_id',"=",'products.id') //join che permette di prendere dati prodotto
        ->select('orders.*','descrizione','nome_prodotto','prezzo','image','disponibili')
        ->where('user_id',auth()->id()) //prendo soltanto gli ordini dell utente che è loggato atm
        ->get(); //prende risultato query
        //return $orders;
        return view('carrello',compact('orders')); //invia i dati a carrello.blade.php tramite $orders
    }
    function deleteCarrello(Request $request){
        // fa il drop della riga della tabella orders, dove ordine id è uguale a quello selezionato
        // dall'utente nel carrello
        $deleted = DB::table('orders')->where('id',$request->delete)->delete();
        return redirect()->back()->with('alert', 'Eliminato con successo!'); //torno nella stessa pagina con alert
    }
    function shopCarrello(){
        //elimina tutti gli ordini dell'user e manda alet
        $deleted = DB::table('orders')->where('user_id',auth()->id())->delete();
        return redirect()->back() //prende anche la mail dell utente
        ->with('alert2', 'I tuoi prodotti sono stati acquistati, per maggiori info consultare la mail: '.Auth::user()->email); 
    }
}

