<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // per fare il seed devo fare php artisan migrate:fresh --seed
        //\App\Models\User::factory(10)->create();
        $this->call(Admin::class);
        $this->call(Amico::class);
        //$this->call(TortDyb::class); //aggiunge il tortellino alla dybala
    }
}
