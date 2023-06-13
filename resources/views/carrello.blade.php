<x-guest-layout>
</x-guest-layout>
<!-- permette di stampare gli ordini e relative informazioni al prodotto,
dati passati tramite Homecontroller, a differenza di catalogo li stampo con -> invece che [] -->
<table class="table">
    <thead>
        <tr>
            <th scope="col">Id ordine</th>
            <th scope="col">Immagine</th>
            <th scope="col">Id prodotto</th>
            <th scope="col">Prodotto</th>
            <th scope="col">Descrizione</th>
            <th scope="col">Quantità</th>
            <th scope="col">Prezzo unitario</th>
            <th scope="col">Totale</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
        <tr>
            <th scope="row">{{$order->id}}</th>
            <td><img src="{{ asset('images/db/'.$order->image)}}" alt="Immagine" class="centerimg"></td>
            <td>{{$order->product_id}}</td>
            <td>{{$order->nome_prodotto}}</td>
            <td>{{$order->descrizione}}</td>
            <td>{{$order->quantity}}</td>
            <td>{{$order->prezzo}}</td>
            <td>{{$order->prezzo * $order->quantity}}</td>
            <td><button type="button" class="btn btn-outline-danger">Cancella</button></td>
        </tr>
        @endforeach
    </tbody>
</table>
<label class="input-group-text rounded">
    Totale: 
    @foreach ($orders as $order)

    @endforeach
</label>
<button type="button" class="btn btn-outline-success">Success</button>