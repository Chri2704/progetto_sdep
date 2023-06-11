<x-app-layout>

<!-- form per aggiunta prodotti -->

<div style="padding-top: 3%; padding-Left:1%; padding-right:12%">
    <h2 class="fs-2">Prodotto:</h2><br>

    <form action="{{url('upload_post')}}" method="POST" enctype="multipart/form-data">

    <!-- token che genera campo nascosto di protezione nel form. Laravvel controlla corrispondenza token altrimenti respinge la richiesta -->
    @csrf 

            <div class="input-group mb-3">
                <label for="" class="input-group-text rounded">Nome</label>
                <input type="text" name="name" placeholder="Nome" class="form-control rounded" aria-label="Username">
            </div>
            <div class="input-group mb-3">
                <label for="" class="input-group-text rounded">prezzo</label>
                <input type="number" placeholder="x.xx €" class="form-control rounded"  style="width: 25%;" name="price">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Descrizione</label>
                <input type="text" class="form-control rounded" name="description" >
            </div>
            <div>
            <!-- si potrebbe aggiungere disponibilità ma capire come gestire -->
            <div class="mb-3">
                <label for="" class="form-label">Upload image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary bg-primary">Conferma </button>
            </div>

    </form>

</div>




</x-app-layout>
