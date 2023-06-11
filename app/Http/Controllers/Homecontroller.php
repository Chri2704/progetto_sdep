<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

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

        //passi per salvare immagine
        $file = $request->file('image');
        $extention = $file->getClientOriginalExtension();
        $filename = time().'.'.$extention;
        $file->move('images/db/',$filename);
        $data->image = $filename;

        $data->save(); //penso salvi il formato interno di $data

        return redirect()->back(); //alla fine della funzione ritorna nella stessa pagina (quindi di nuovo nella dashbpard)

    }
}

