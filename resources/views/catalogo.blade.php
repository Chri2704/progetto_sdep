<x-guest-layout>
</x-guest-layout>
<!-- stile per visualizzazione di admin non utente! -->
<style> 
.center{
  text-align: center;
}
.centerimg{
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 200px;
    height: 200px;
}
</style>
<h1 class="fs-1" style="text-align: center;">Catalogo prodotti disponibili</h1>
<br>
<div class="center">
    @foreach($products as $product)
        {{$product['nome_prodotto']}} 
        {{$product['descrizione']}} 
        <img src="{{ asset('images/db/'.$product->image)}}" alt="Immagine" class="centerimg"> 
        
        <button>Acquista</button>
    @endforeach
</div>