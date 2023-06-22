<x-guest-layout>
</x-guest-layout>
<style>
.centerr {
    margin: auto;
    text-align: center;
    padding: 10px;
}

.centerimg {
    display: block;
    width: 200px;
    height: 200px;
}
</style>
<p class="fs-1" style="text-align: center;">Carrello</p>
<!-- permette di stampare gli ordini e relative informazioni al prodotto,
dati passati tramite Homecontroller, a differenza di catalogo li stampo con -> invece che [] -->
@if (session('alert'))
<div class="alert alert-danger">
    <p style="text-align: center;" class="fs-4">{{ session('alert') }}</p>
</div>
@endif
@if (session('alert2'))
<div class="alert alert-primary">
    <p style="text-align: center;" class="fs-4">{{ session('alert2') }}</p>
</div>
@endif
@php
$totale = 0;
@endphp

@if (Route::has('login'))
@auth
@if (!$orders->isEmpty())
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
            <th scope="col" style="text-align: center;">Totale prod</th>
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
                    <button type="submit" class="btn btn-outline-danger" name="delete"
                        value="{{$order->id}}">Cancella</button>
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
    <form action="{{url('shop')}}" method="POST" enctype="multipart/form-data" style="padding-left: 10px;">
    @csrf
    <button type="submit" class="btn btn-outline-success">Acquista</button>
</form>
</label>
@else
<p class="fs-2 centerr">Il tuo carrello è vuoto!</p>
@endif
@else
<p class="fs-2 centerr">Non hai effettauto il log-in per accedere al tuo carrello</p>
@endauth
@endif