<x-app-layout>
    <script>
    function modProd(x) {
        let nome = document.getElementById("nome");
        let i_nome = document.getElementById("i_nome");
        i_nome.style.display = "block";
        nome.style.display = "none";
    }
    </script>
    <style>
    .centerimg {
        display: block;
        width: 200px;
        height: 200px;
    }
    </style>
    @if (session('alert'))
    <div class="alert alert-danger">
        <p style="text-align: center;" class="fs-4">{{ session('alert') }}</p>
    </div>
    @endif
    <table class="table table-light table-striped">
        <thead>
            <tr>
                <th scope="col" style="text-align: center;">Id prodotto</th>
                <th scope="col">Immagine</th>
                <th scope="col">Prodotto</th>
                <th scope="col" style="text-align: center;">Data inserimento</th>
                <th scope="col" style="text-align: center;">Descrizione</th>
                <th scope="col">Prezzo</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>

            @foreach ($prods as $prod)
            <tr>
                <th scope="row">{{$prod['id']}}</th>
                <td><img src="{{ asset('images/db/'.$prod->image)}}" alt="Immagine" class="centerimg"></td>
                <td>
                    <p id="nome">{{$prod['nome_prodotto']}}</p>
                    <p> <input type="text" value="{{$prod['nome_prodotto']}}" class="form-control rounded" id="i_nome" style="display: none;"> </p>
                </td>
                <td>{{$prod['created_at']}}
                </td>
                <td>{{$prod['descrizione']}}
                </td>
                <td>{{$prod['prezzo']}}€
                </td>
                <td>
                    <form action="{{url('deleteprod')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger" name="deleteprod" value="{{$prod['id']}}"
                            onclick="return confirm('Sicuro di eliminare prodotto, eliminerai pure tutti prodotti nei carrelli');">
                            Cancella</button>
                    </form><br>
                    <!-- <form action="{{url('modprod')}}" method="POST" enctype="multipart/form-data"> -->
                    @csrf
                    <button class="btn btn-outline-info" name="modprod" value="{{$prod['id']}}" onclick="modProd()">
                        Modifica</button>
                    <!-- </form> -->
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>