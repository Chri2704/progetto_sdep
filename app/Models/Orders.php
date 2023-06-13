<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    public function utente(){
        return $this->belongsTo(User::class); //ogni ordine appartiene ad un utente
    }

    public function prodotto(){
        return $this->belongsTo(Product::class);
    }
}
