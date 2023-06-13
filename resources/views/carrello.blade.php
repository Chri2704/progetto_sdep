<x-guest-layout>
</x-guest-layout>
<h1 class="fs-1" style="text-align: center;">Carrello</h1> 
<!-- permette di stampare gli ordini e relative informazioni al prodotto,
dati passati tramite Homecontroller, a differenza di catalogo li stampo con -> invece che [] -->

@php
         $totale = 0; 
    @endphp


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
                <button type="button" class="btn btn-outline-danger" name="{{$order->id}}">Cancella</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<label class="input-group-text rounded">

<!--  Stampa il totale aggiornato -->

    @php
        echo "Totale: $totale €"; 
    @endphp
</label>
<button type="button" class="btn btn-outline-success">Acquista</button>