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
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <form action="{{url('deleteuser')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @foreach ($users as $user)
                <tr>
                    <th scope="row">{{$user['id']}}</th>
                    <td>{{$user['name']}}</td>
                    <td>{{$user['email']}}</td>
                    <td>{{$user['password']}}</td>
                    <td>{{$user['created_at']}}</td>
                    <td>
                        @if (!$user['admin'])
                        <button type="submit" class="btn btn-outline-danger" name="deleteuser"
                            value="{{$user['id']}}" 
                            onclick="return confirm('Sicuro di eliminare utente, eliminerai pure tutti i suoi ordini nel carrello');">
                            Cancella</button>
                        @endif
                    </td>
                </tr>
                @endforeach
            </form>
        </tbody>
    </table>
</x-app-layout>