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
<h1 class="fs-1" style="text-align: center;">Catalogo prodotti disponibili</h1>
<br>
<table>
    @foreach($products as $product)
    <tr>
        <td>{{$product['nome_prodotto']}}</td>
        <td>{{$product['descrizione']}}</td>
        <td><img src="{{ asset('images/db/'.$product->image)}}" alt="Immagine" class="centerimg"></td>
    </tr>
    @endforeach
</table>