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
    <form action="{{url('new_order')}}" method="POST" enctype="multipart/form-data">
    <br> <h2 name="product_id">{{$product['nome_prodotto']}}</h2>
        {{$product['descrizione']}} 
        <img src="{{ asset('images/db/'.$product->image)}}" alt="Immagine" class="centerimg">
        <button type="submit" class="btn btn-primary bg-primary">Acquista</button>
    </form>
    @endforeach
</div>