<x-app-layout>
 <table border="1"> 
    @foreach($products as $product)
    <tr>
        <td>{{$product['nome_prodotto']}}</td>
        <td>{{$product['descrizione']}}</td>
        <td>{{$product['prezzo']}}</td>
        <td>{{$product['disponibili']}}</td>
        <td><img src="{{ asset('images/db/'.$product->image)}}" alt="Immagine" width="250px" height="250px"></td>
    </tr>
    @endforeach
</table>
</x-app-layout>