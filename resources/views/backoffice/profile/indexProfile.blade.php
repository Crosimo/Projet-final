@extends('template/welcome')

@section('content')
   

    
    
    <div  style="background-color: #F1F1F1">
       
        <div class="container" >
            <div class="row text-center">
                <div class="col">
                    @php
                        $name = Auth::user()->name
                    @endphp
                    <div style="display: flex; justify-content:space-evenly; align-items:center; margin:1rem">
                       
                        <img class=" img-thumbnail" style="height: 35rem; width: 25rem" src="{{ asset("img/profile/".Auth::user()->image) }}"
                        alt="Ceci est une image quali">
                        <h1>Bienvenue {{ $name }}</h1>
                    </div>
                    <form style=" margin-left:0; padding:2rem; width:100%;background-color: #5FC7AE; " method="POST" action="{{ route('logout') }}">
        
                        @csrf
                        <x-dropdown-link style="width: 100%; padding-left: 0 !important;" :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                            <i class='bx bx-log-out' ></i>
                            <span class="links_name" style="color: white; font-size:2rem; border:3px solid white; padding: 0.5rem;font-weight:bolder">Log Out</span>
                        </x-dropdown-link>
                      </form>
                        @php
                           $id = Auth::user()->id;
                        @endphp
                    <form action="{{ route('updateProfil', $id ) }}" style="background-color: #5FC7AE; padding: 2rem" method="post" enctype="multipart/form-data">
                        <input style=" margin:auto; width: max-content;margin-top: 1rem; " type="file" name="image" value="{{Auth::user()->image}}">
                        @method('PUT')
                        @csrf
                        <button class="default-btn" style="background-color: white; color:#666666;"  type="submit">Changez photo de profile svp</button>
                    </form>
                </div>
            </div>
            
   
        
    
        @if(Auth::user()->role_id == 1)
        <table class="table table-secondary table-striped" style="margin-top:20px; border:5px solid white">
            <h1 style="text-align: center; margin-top: 2rem">Vos inscription</h1>
        <thead>
            <tr>
                <th scope="col">Nom de la classe</th>
                <th scope="col">Heure Début</th>
                <th scope="col">Heure Fin</th>
                <th scope="col">Se désinscrire</th>
            </tr>
        </thead>
        <tbody>
           
            @foreach ($classe as $item)
                
            @if ($item->users->contains(Auth::user()->id))
                
            
                <tr>
                    <td>{{ $item->nom }}</td>
                    <td>{{ $item->heureDébut }}</td>
                    <td>{{ $item->heureFin }}</td>
                   
                        
                   
                    <td><a class="btn btn-danger" href="{{ route('classe.desinscription', $item->id) }}">Se désinscrire</a></td>
                </tr>
            @endif 
            
            @endforeach
            
        </tbody>
        </table>
        @endif 
        
    @if(Auth::user()->role_id == 2  || Auth::user()->role_id == 3 )
    <div>
        <h1 style="text-align: center; margin-top: 2rem">Vos Cours</h1>
        <a class="btn btn-info" href="{{ route('classe.create') }}">Créer</a>
    </div>  
    <table class="table table-primary table-striped" style="margin-top:20px; border:5px solid white" >
        <thead>
            <tr>
                <th scope="col">Nom de la classe</th>
                <th scope="col">Heure Début</th>
                <th scope="col">Heure Fin</th>
                <th scope="col">Supprimer</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($classe as $item)
           
            
            @if (Auth::user()->trainers[0]->id == $item->trainer_id)
            <tr>
                <td>{{ $item->nom }}</td>
                <td>{{ $item->heureDébut }}</td>
                <td>{{ $item->heureFin }}</td>
                
                <td><form action="{{ route('classe.destroy', $item->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger text-black" type="submit">Supprimer</button>
                </form></td>
            </tr>   
            @endif
                
            @endforeach
        </tbody>
    </table>
    
    @endif
   
</div>
</div> 
<div class="container" >
    <div class="row" style="display: flex; justify-content:center; align-items:center">
        <div class="col-6">
            <img class="float-center" style="margin: 2rem" src="{{ asset('img/profile/covid.png') }}" alt="">
        </div>
        <div class="col-6 d-flex align-items-center justify-content-center">
            <h1 style="text-align: center"> N'oubliez pas votre <hr> Covid safe ticket </h1>
        </div>
    </div>
        
</div>
       



    
    
{{--     
//update profil, se désinscrire, etc..     --}}








    {{-- Classes auxquelles on est inscrit pour random, ainsi que certaines charactéristiques, la formule etc.., bouton pour se désabonner ?, classes que l'on manage pour les <trainers>
    <managers class=""></managers>
    Possibilité de choisir des classes à faire pour les trainers et manager. --}}
@endsection
