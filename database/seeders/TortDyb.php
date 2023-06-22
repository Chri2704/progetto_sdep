<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class TortDyb extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     //genera tutti i prodotti nel database, sono in totale 10
    public function run()
    {
        Product::create([
            'nome_prodotto' => 'Tortellini alla Dybala',
            'descrizione' => 'Pacco da 500g, leggendari tortellini di Paulo Dybala',
            'prezzo' => 20,
            'image' => 'tort_dybala.jpg'
        ]);
        Product::create([
            'nome_prodotto' => 'Tortellini Barilla',
            'descrizione' => 'Pacco da 250g, collaborazione con barilla ad un prezzo wow',
            'prezzo' => 12.10,
            'image' => 'tort_barilla.jpg'
        ]);
        Product::create([
            'nome_prodotto' => 'Tortellini Bing Chilling',
            'descrizione' => 'Dalla ricetta del maestro John Xina, grande chef cinese',
            'prezzo' => 15,
            'image' => 'cina.jpg'
        ]);
        Product::create([
            'nome_prodotto' => 'Tortellini Parma',
            'descrizione' => 'Con prosciutto di Parma DOP',
            'prezzo' => 17,
            'image' => 'parma.jpg'
        ]);
        Product::create([
            'nome_prodotto' => 'Tortellini Rana ricotta',
            'descrizione' => 'Collaborazione con mio amico Rana, speciali alla ricotta',
            'prezzo' => 14.22,
            'image' => 'ricotta.jpg'
        ]);
        Product::create([
            'nome_prodotto' => 'Tortellini Gluten free',
            'descrizione' => 'Pensiamo proprio a tutto, per i nostri amici celiaci',
            'prezzo' => 11,
            'image' => 'gluten.jpg'
        ]);
    }
}
