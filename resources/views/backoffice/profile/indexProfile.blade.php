@extends('template/welcome')

@section('content')

    <div >
        <div class="container">
            <div class="row text-center">
                <div class="col">
                    <h1>Bienvenue {{ Auth::user()->name }}</h1>
                    <img class=" img-thumbnail" src="{{ asset('img/portfolio/gal.jpg') }}"
                        alt="Ceci est une image quali">
                        @php
                           $id = Auth::user()->id;
                        @endphp
                    <form action="{{ route('updateProfil', $id ) }}" style="background-color: #5FC7AE; padding: 2rem" method="post" enctype="multipart/form-data">
                        <input style=" margin:auto; width: max-content;margin-top: 1rem; " type="file" name="image" value="{{Auth::user()->image}}">
                        @method('PUT')
                        @csrf
                        <button class="btn btn-warning mb-4" type="submit">Changez photo de profile svp</button>
                    </form>
                </div>
            </div>
    
    @if (Auth::user()->role_id == 1 )
        <table class="table table-secondary table-striped">
        <thead>
            <tr>
                 <th scope="col">Nom de la classe</th>
                <th scope="col">Heure Début</th>
                <th scope="col">Heure Fin</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($classe as $item)
                <tr>
                    <td>{{ $item->nom }}</td>
                    <td>{{ $item->heureDébut }}</td>
                    <td>{{ $item->heureFin }}</td>
                </tr>
            @endforeach
        </tbody>
        </table>
    @elseif(Auth::user()->role_id == 2  || Auth::user()->role_id == 3 )
        
    <table class="table table-primary table-striped">
        <thead>
            <tr>
                <th scope="col">Nom de la classe</th>
                <th scope="col">Heure Début</th>
                <th scope="col">Heure Fin</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($classe as $item)
            @if ($classe->trainer_id == Auth::user()->id)
            <tr>
                <td>{{ $item->nom }}</td>
                <td>{{ $item->heureDébut }}</td>
                <td>{{ $item->heureFin }}</td>
            </tr>   
            @endif
                
            @endforeach
        </tbody>
    </table>
    @else


    @endif
        <img style="margin-bottom: 2rem" src="{{ asset('img/profile/covid-safety.jpg') }}" alt="">    
</div>

</div> 
    
    
{{--     
//update profil, se désinscrire, etc..     --}}








    {{-- Classes auxquelles on est inscrit pour random, ainsi que certaines charactéristiques, la formule etc.., bouton pour se désabonner ?, classes que l'on manage pour les <trainers>
    <managers class=""></managers>
    Possibilité de choisir des classes à faire pour les trainers et manager. --}}
@endsection
