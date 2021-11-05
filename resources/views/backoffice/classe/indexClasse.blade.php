@extends('backoffice.indexBO')

@section('contentBO')


    <div class="home-section text-center " >
        <div>
            <h1 class="titresBO text-center">PARTIE Class</h1>

            <a href="/backoffice" class=" text-center w-100">
                <button class="banner-btn" type="submit">Retour backoffice</button>
            </a>
    
            <table class="table container " >
                
                <thead>
                    <tr>
                        <th class="text-center" scope="col">ID</th>
                        <th class="text-center" scope="col">image</th>
                        <th class="text-center" scope="col">nom</th>
                        <th class="text-center" scope="col">instructeur</th>
                        <th class="text-center" scope="col">heure de départ</th>
                        <th class="text-center" scope="col">heure de fin</th>
                        <th class="text-center" scope="col">catégorie</th>
                        <th class="text-center" scope="col">formule d'accès</th>
                        <th class="text-center" scope="col">tags</th>
                        <th class="text-center" scope="col">prioritaire</th>
                        
                        <th class="text-center" scope="col">Create</th>
                        <th class="text-center" scope="col">Edit</th>
                        
    
                        <th class="text-center" scope="col">Show</th>
    
                        <th class="text-center" scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($classe as $item)
                        
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td> <img src="{{ asset('img/classe/' . $item->image) }}" alt=""></td>
                            <td> {{ $item->nom }}</td>
                            <td>{{ $item->trainer->nom }}</td>
                            
                            <td> {{ $item->heureDébut }}</td>
                            <td> {{ $item->heureFin }}</td>
                            <td> {{ $item->categorie->nom }}</td>
                            <td> {{ $item->pricing->packageTitle }}</td>
                            <td> 
                            @foreach ($item->tags as $tag)
                            {{ $tag->nom }} /
                            @endforeach </td>
                            <td> {{ $item->prioritaire }}</td>
                            <td>
                                <a href="{{ route('classe.create') }}">
                                    <button class="btn btn-info" type="submit">
                                        Create
                                    </button>
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('classe.edit', $item->id) }}">
                                    <button class="btn btn-primary" type="submit">
                                        EDIT
                                    </button>
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('classe.show', $item->id) }}">
                                    <button class="btn" style="background-color:#5FC7AE; color:white" type="submit">
                                        SHOW
                                    </button>
                                </a>
                            </td>
    
                            <td>
                                <form action="{{ route('about.destroy', $item->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">DELETE</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </div>



@endsection
