<x-app-layout>

<!-- form per aggiunta prodotti -->
<br>
<h1 class="fs-1" style="text-align: center;">Area per inserimento di un nuovo prodotto</h1> 
<div style="padding-top: 3%; padding-Left:1%; padding-right:12%">
    <h2 class="fs-2">Prodotto:</h2><br>

    <form action="{{url('upload_post')}}" method="POST" enctype="multipart/form-data">

    <!-- token che genera campo nascosto di protezione nel form. Laravvel controlla corrispondenza token altrimenti respinge la richiesta -->
    @csrf 

            <div class="input-group mb-3">
                <label class="input-group-text rounded">*Nome: </label>
                <input type="text" name="name" placeholder="Nome" class="form-control rounded" aria-label="Username" required>
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text rounded">*Prezzo: </label>
                <input type="number" placeholder="x.xx €" class="form-control rounded"  style="width: 25%;" name="price" required>
            </div>
            <!-- <div class="input-group mb-3">
                <label class="input-group-text rounded">*Disponibilità: </label>
                <input type="number" class="form-control rounded"  style="width: 25%;" name="dispo" required>
            </div> -->
            <div class="mb-3">
                <label class="form-label">*Descrizione: </label>
                <input type="text" class="form-control rounded" name="description" required>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">*Inserisci immagine</label>
                <input type="file" name="image" class="form-control" required>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary bg-primary">Conferma</button>
                <h3 style="text-align: right;">*campi obbligatori</h3>
            </div>

    </form>
</div>
</x-app-layout>
