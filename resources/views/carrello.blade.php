<x-guest-layout>
</x-guest-layout>
<style>
.centerr {
  margin: auto;
  width: 50%;  
  text-align: center;
  padding: 10px;
}
</style>
<p class="fs-1" style="text-align: center;">Carrello</p>
<!-- permette di stampare gli ordini e relative informazioni al prodotto,
dati passati tramite Homecontroller, a differenza di catalogo li stampo con -> invece che [] -->

@php
$totale = 0;
@endphp

@if (Route::has('login'))
@auth
<table class="table">
    <thead>
        <tr>
            <th scope="col" style="text-align: center;">Id ordine</th>
            <th scope="col">Immagine</th>
            <th scope="col" style="text-align: center;">Id prodotto</th>
            <th scope="col">Prodotto</th>
            <th scope="col">Descrizione</th>
            <th scope="col">Quantità</th>
            <th scope="col" style="text-align: center;">Prezzo unitario</th>
            <th scope="col">Totale</th>
        </tr>
    </thead>
    <tbody>
    <form action="{{url('delete')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @foreach ($orders as $order)
        <tr>
            <th scope="row">#{{$order->id}}</th>
            <td><img src="{{ asset('images/db/'.$order->image)}}" alt="Immagine" class="centerimg"></td>
            <td>#{{$order->product_id}}</td>
            <td>{{$order->nome_prodotto}}</td>
            <td>{{$order->descrizione}}</td>
            <td style="text-align: center;">{{$order->quantity}}</td>
            <td style="text-align: center;">{{$order->prezzo}}€</td>
            <td style="text-align: center;">
                @php
                $subtotal = $order->prezzo * $order->quantity; // Calcola il subtotal per l'ordine corrente
                $totale += $subtotal; // Aggiorna il totale sommando il subtotal all'importo totale precedente
                @endphp
                {{$subtotal}}
                €</td>
            <td>
                <button type="submit" class="btn btn-outline-danger" name="delete" value="{{$order->id}}">Cancella</button>
            </td>
        </tr>
        @endforeach
    </form>
    </tbody>
</table>
<label class="input-group-text rounded">

    <!--  Stampa il totale aggiornato -->

    @php
    echo "Totale: $totale €";
    @endphp
</label>
<button type="button" class="btn btn-outline-success">Acquista</button>

@else
<p class="fs-2 centerr" >Non hai effettauto il log-in per accedere al tuo carrello</p>
@endauth
@endif