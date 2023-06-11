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
    public function run()
    {
        Product::create([
            'nome_prodotto' => 'Tortellini alla Dybala',
            'descrizione' => 'Pacco da 500g, leggendari tortellini di Pauolo Dybala',
            'prezzo' => 20,
            'disponibili' => 100,
        ]);
    }
}
