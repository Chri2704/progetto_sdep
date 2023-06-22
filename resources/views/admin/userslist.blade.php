<x-app-layout>
    @if (session('alert'))
    <div class="alert alert-danger">
        <p style="text-align: center;" class="fs-4">{{ session('alert') }}</p>
    </div>
    @endif
    <table class="table table-light table-striped">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Data creazione</th>
                <th scope="col">Admin</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>

            @foreach ($users as $user)
            <tr>
                <th scope="row">{{$user['id']}}</th>
                <td>{{$user['name']}}</td>
                <td>{{$user['email']}}</td>
                <td>{{$user['password']}}</td>
                <td>{{$user['created_at']}}</td>
                <td>@if ($user['admin'])
                    Si
                    @else
                    No
                    @endif
                </td>
                <td>
                    <!-- se id corrente non è admin stampo i bottoni per la promozione e cancellazione-->
                    @if (!$user['admin'])
                    <form action="{{url('deleteuser')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger" name="deleteuser" value="{{$user['id']}}"
                            onclick="return confirm('Sicuro di eliminare utente, eliminerai pure tutti i suoi ordini nel carrello');">
                            Cancella</button>
                    </form>
                    @endif
                </td>
                <td>
                @if (!$user['admin'])
                    <form action="{{url('promoteuser')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <button type="submit" class="btn btn-outline-warning" name="promoteuser" value="{{$user['id']}}"
                            onclick="return confirm('Sicuro di promuovere utente ad amministratore?');">
                            Promuovi</button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</x-app-layout>