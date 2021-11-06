@extends('backoffice.indexBO')

@section('contentBO')
    <div class="home-section d-flex flex-column align-items-center">
        @if (session()->has('message'))
        <div class="alert alert-info" style="text-align: center">
            {{ session()->get('message') }}
        </div>
        @endif
        <div class="container">
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
                <label for="heureDébut" class="form-label">Date</label>
                <input type="date" name="heureDébut" class="form-control" id="heureDébut"
                >
                <label for="heureFin" class="form-label">Heure</label>
                <select class="form-select " id="heureFin" name="heureFin" aria-label="Default select example">
                                   
                        <option value = "08">8 A.M.</option>
                        <option value = "12">12 P.M.</option>
                        <option value = "15">15 P.M.</option>
                        <option value = "18">18 P.M.</option>     
                    
                </select>
                
                
                <label for="places" class="form-label">places</label>
                <input type="number" name="places" class="form-control" id="places" min="0" max="20">
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
                        <option value = "{{ $item->id }}">{{ $item->packageTitle }}</option>
                    @endforeach
                    
                </select>
    
                <label for="lestags" class="form-label ">Tags</label>
                  <select style="background-color: white" name="lestags[]"  id="tags" class="form-select " multiple aria-label="Default select example">
                      @foreach ($tag as $item)
                      <option value="{{ $item->id }}">{{ $item->nom }}</option>
                      @endforeach
                  </select>
                  <p>Hold down the Ctrl (windows) or Command (Mac) button to select multiple options.</p>
    
                  <label for="prioritaire" class="form-label">Prioritaire</label>
                  <input type="checkbox" name="prioritaire" >
                <div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                
            </form>
        </div>   
    </div>
@endsection