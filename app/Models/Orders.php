<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $table = 'orders';

    public function utente(){
        return $this->belongsTo(User::class); //ogni ordine appartiene ad un utente
    }

    public function prodotto(){
        return $this->belongsTo(Product::class); //un prodotto può essere associato a molti ordine
    }
}
