@extends('backoffice.indexBO')

@section('contentBO')
<div class="home-section">

    
        <form class=" d-flex flex-column  p-2" action="{{route('titre.update', $titre->id)}}" method="POST" enctype="multipart/form-data">
            <div class="container">
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
            titre: <input type="text" name="titre" value="{{$titre->titre}}">
            description: <input type="text" name="description" value="{{$titre->description}}">
            <div>
                <button class="banner-btn w-25 mt-4 block" type="submit">Submit</button>
            </div>
            
        </div>
        </form>
    
       
</div>   
  

@endsection