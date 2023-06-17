<x-app-layout>
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
                <td>{{$prod['nome_prodotto']}} <br>
                    <button type="submit" class="btn btn-outline-info" name="modname" value="{{$prod['nome_prodotto']}}">
                        Modifica nome</button>
                </td>
                <td>{{$prod['created_at']}}</td>
                <td>{{$prod['descrizione']}}
                    <button type="submit" class="btn btn-outline-info" name="moddesc" value="{{$prod['descrizione']}}"
                        onclick="return prompt('Inserisci una nuova descrizione');">
                        Modifica descrizione</button>
                </td>
                <td>{{$prod['prezzo']}}€
                    <button type="submit" class="btn btn-outline-info" name="modprez" value="{{$prod['prezzo']}}">
                        Modifica prezzo</button>
                </td>
                <td>
                    <form action="{{url('deleteprod')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger" name="deleteprod" value="{{$prod['id']}}"
                            onclick="return confirm('Sicuro di eliminare prodotto, eliminerai pure tutti prodotti nei carrelli');">
                            Cancella</button>
                    </form>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</x-app-layout>