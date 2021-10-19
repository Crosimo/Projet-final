@extends('backoffice.indexBO')

@section('contentBO')
    <div class="home-section d-flex flex-column align-items-center">
        <h1 class="text-center mt-3 d-flex align-items-center">Créer CLASSE</h1>
        <br>
        <form action="{{route('classe.store')}}" method="POST" enctype="multipart/form-data">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            @csrf
            <div class="mb-3">
            <label for="image" class="form-label">image</label>
            <input type="file" name="image" class="form-control" id="image">
            <label for="nom" class="form-label">nom</label>
            <input type="text" name="nom" class="form-control" id="nom">
            <label for="heure" class="form-label">heure</label>
            <input type="datetime-local" name="heure" class="form-control" id="heure">
            
            </div>
            
            <label for="categorie" class="form-label ">Catégorie</label>
            <select class="form-select " id="categorie" name="categorie_id" aria-label="Default select example">
               
                @foreach ($categorie as $item)                   
                    <option value = "{{ $item->id }}">{{ $item->nom }}</option>
                @endforeach
                
            </select>

            <label for="trainer" class="form-label ">Instructeur</label>
            <select class="form-select" id="trainer" name="trainer_id" aria-label="Default select example">
               
                @foreach ($trainer as $item)                   
                    <option value = "{{ $item->id }}">{{ $item->nom }}</option>
                @endforeach
                
            </select>



            <label for="pricing" class="form-label ">Formule d'accès</label>
            <select class="form-select " id="pricing" name="pricing_id" aria-label="Default select example">
               
                @foreach ($pricing as $item)                   
                    <option value = "{{ $item->id }}">{{ $item->nom }}</option>
                @endforeach
                
            </select>

            <label for="lestags" class="form-label ">Tags</label>
              <select name="lestags[]"  id="tags" class="form-select " multiple aria-label="Default select example">
                  @foreach ($tag as $item)
                  <option value="{{ $item->id }}">{{ $item->nom }}</option>
                  @endforeach
              </select>
              <p>Hold down the Ctrl (windows) or Command (Mac) button to select multiple options.</p>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection