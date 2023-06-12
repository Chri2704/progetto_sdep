<x-guest-layout>
</x-guest-layout>
<!-- stile per visualizzazione di admin non utente! -->
<style> 
table {
    border-collapse: collapse;
    width: 100%;
}

th,
td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #DDD;
    text-align: center;
}
.centerimg{
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 50%;
}
</style>
<table>
    <tr>
        <td>Nome prodotto</td>
        <td>Descrizione</td>
        <td>Prezzo</td>
        <td>Disponibilità</td>
        <td>Immagine</td>
    </tr>
    @foreach($products as $product)
    <tr>
        <td>{{$product['nome_prodotto']}}</td>
        <td>{{$product['descrizione']}}</td>
        <td>{{$product['prezzo']}}</td>
        <td>{{$product['disponibili']}}</td>
        <td><img src="{{ asset('images/db/'.$product->image)}}" alt="Immagine" class="centerimg"></td>
    </tr>
    @endforeach
</table>