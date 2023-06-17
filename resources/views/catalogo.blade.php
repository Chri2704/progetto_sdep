<x-guest-layout>
</x-guest-layout>
<!-- stile per visualizzazione di admin non utente! -->
<style>
.center {
    text-align: center;
}

.centerimg {
    display: block;
    width: 200px;
    height: 200px;
}
</style>
@if (session('alert'))
<div class="alert alert-success">
    <p class="center">{{ session('alert') }}</p>
</div>
@endif
<h1 class="fs-1" style="text-align: center;">Catalogo prodotti disponibili</h1>
<br>
<div class="row float-center" style="margin-left: 5%; margin-right: 5%;">
    <!-- permette di stampare i prodotti passati dal controller con un for -->
    @foreach($products as $product)
    <!-- form che passa i dati al controller Homecontroller tramite post -->
    <div class="col-4 ">
        <div class="coloreDiv">
            <form action="{{url('new_order')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- serve per passare id del prodotto alla query nel controller -->
                <input type="hidden" name="product_id" value="{{ $product['id']}}">
                <br>
                <img src="{{ asset('images/db/'.$product->image)}}" alt="Immagine" class="centerimg float-left"
                    style="margin-left: 10px; border-radius: 5px">
                <label for="" class="boldi fs-4" style="margin-left: 10px;">
                    {{$product['nome_prodotto']}}
                </label>

                <br>
                <label for="" style="margin-left: 10px;">{{$product['descrizione']}}</label>

                <br>

                <label for="" class="fs-3" style="margin-left: 10px;">
                    € {{$product['prezzo']}}
                </label>
                <div class="row center">
                    <div class="col-md-3">
                        <select name="quantity" class="form-select ">
                            <option value="1" selected>1</option>
                            <!-- for che va fino a 10 per il numero prodotti -->
                            @for ($i=2 ; $i<=10 ; $i++) <option value="{{$i}}">{{$i}}</option>
                                @endfor
                        </select>
                    </div>
                    <!-- controlla se utente è loggato, se si permette ordine senno login -->
                    <div class="col-md-6 float-right">
                    @if (Route::has('login'))
                    @auth
                        <button type="submit" class="btn btn-primary bg-primary">Acquista</button>
                        @else
                        <a class="btn btn-success" href="{{route('login')}}">Login per acquistare</a>
                        @endauth
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endforeach
</div>