@extends('backoffice.indexBO')

@section('contentBO')

       
        <form class=" d-flex flex-column home-section  p-2" action="{{route('classe.update', $classe->id)}}" method="POST" enctype="multipart/form-data">
           
            <h1 class="text-center fs-4">
            Modifier la section</h1>
                <br>
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
            @method('PUT')
            
            Image: <input type="file" name="image" class="form-control" id="image" value="{{ $classe->image }}">
            
            Intitulé du cours: <input type="text" name="nom" class="form-control" id="nom" value="{{ $classe->nom }}">
            
            Horaire de début:<input type="datetime-local" name="heureDébut" class="form-control" id="heureDébut" {{ $classe->heureDébut }}>
            </div>
            
            Horaire de fin:<input type="datetime-local" name="heureFin" class="form-control" id="heureFin" {{ $classe->heureFin }}>
            </div>
            
            Places: <input type="number" name="places" class="form-control" id="places" min="0" max="20">


            <label for="pricing" class="form-label ">Formule d'accès</label>
            <select class="form-select " id="pricing" name="pricing_id" aria-label="Default select example">
               
                @foreach ($pricing as $item)                   
                    <option value = "{{ $item->id }}">{{ $item->packageTitle }}</option>
                @endforeach
                
            </select>

            Catégorie<select class="form-select " id="categorie" name="categorie_id" aria-label="Default select example">
               
                @foreach ($categorie as $item)
                    @if ($item->categorie_id == $classe->categorie_id)
                        <option selected value = "{{ $item->id }}">{{ $item->nom }}</option>
                    @else
                        <option value = "{{ $item->id }}">{{ $item->nom }}</option>
                    @endif                      
                @endforeach
                
            </select>

            
            Instructeur:<select class="form-select" id="trainer" name="trainer_id" aria-label="Default select example">
               
                @foreach ($trainer as $item)
                    @if ($item->trainer_id == $classe->trainer_id)
                        <option selected value = "{{ $item->id }}">{{ $item->nom }}</option>
                    @else
                        <option value = "{{ $item->id }}">{{ $item->nom }}</option>
                    @endif                   
                    
                @endforeach
                
            </select>

                
              Tags:<select name="lestags[]"  id="tags" class="form-select " multiple aria-label="Default select example">
                
                  @foreach ($tag as $item)
                     
                    @if (in_array($item, $classe->tags->toArray()) )
                         <option selected value="{{ $item->id }}">{{ $item->nom }}</option>
                    @else
                        <option value="{{ $item->id }}">{{ $item->nom }}</option>
                    @endif 
                  
                  @endforeach
              </select>
              <p>Hold down the Ctrl (windows) or Command (Mac) button to select multiple options.</p>

              <label for="prioritaire" class="form-label">Prioritaire</label>
              <input type="checkbox" name="prioritaire" >
              <div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            
        </form>
        
  



        


@endsection