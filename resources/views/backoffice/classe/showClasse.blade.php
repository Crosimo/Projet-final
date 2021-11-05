@extends('backoffice.indexBO')

@section('contentBO')

<div class="home-section">
    <section class="class-area fix bg-gray pb-100 pt-95">
        <div class="container">
            
            <div class="row flex justify-center"> 
               
               
                
                
                {{-- width="407" style="height: 207px" --}}
                <div class="col-md-4 col-sm-6 col-xs-12 mb-1">     
                    <div class="single-class">
                        <div class="single-img">
                            <a href="class.html"><img   src="{{ asset('img/classe/'.$classe->image) }}" alt="class"></a>
                            <div class="gallery-icon">
                                <a class="image-popup" href="{{ asset('img/classe/'.$classe->image) }}">
                                    <i class="zmdi zmdi-zoom-in"></i>
                                </a>   
                            </div>
                        </div>
                        @if ($classe->prioritaire == true)
                        <div class="single-content" style="background-color:rgba(0, 177, 106, 0.9)"> 
                        @elseif($classe->places-(count($classe->users)) == 0) 
                        <div class="single-content" style="background-color:rgba(149, 165, 166, 1)">
                        @elseif($classe->places -(count($classe->users)) <= 3 ) 
                        <div class="single-content" style="background-color:rgba(207, 0, 15, 0.90)">
                        @elseif($classe->places -(count($classe->users)) <=5)
                        <div class="single-content" style="background-color:rgba(248, 148, 6, 0.9)">
                        @else
                        <div class="single-content">
                        @endif
                            <h3><a href="{{ route('classe.shower', $classe->id) }}">{{ $classe->nom }}</a></h3>
                            <ul>
                                <li><i class="zmdi zmdi-face"></i>{{ $classe->trainer->nom }}</li>
                                <li><i class="zmdi zmdi-alarm"></i>{{ substr($classe->heureDébut,11, 2) }}-{{ substr($classe->heureFin,11, 2) }}A.M.</li>
                                
                            </ul>
                            <div class="m-8 p-2" style="display: flex; justify-content:space-evenly;">
                                <a class="btn btn-primary" href="{{ route('classe.edit', $classe->id) }}">Edit</a>
                                <form action="{{ route('classe.destroy', $classe->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">DELETE</button>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
                
               
                
               
            </div>
            <div class="row">
                
            </div>
        </div>
    </section>
</div>


















{{-- <div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <form class=" d-flex flex-column p-2" action="{{route('classe.update', $classe->id)}}" method="POST" enctype="multipart/form-data">
           
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
        </form>
    </div> --}}

</div>






@endsection
  