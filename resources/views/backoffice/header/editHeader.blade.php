@extends('backoffice.indexBO')

@section('contentBO')

       
        <form class=" d-flex flex-column home-section p-2" action="{{route('header.update', $header->id)}}" method="POST" enctype="multipart/form-data">
            
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
            image: <input type="file" name="image" value="{{$header->image}}">
            titre1: <input type="text" name="titre1" value="{{$header->titre1}}">
            titre2: <input type="text" name="titre2" value="{{$header->titre2}}">
            titre3: <input type="text" name="titre3" value="{{$header->titre3}}">
            titre4: <input type="text" name="titre4" value="{{$header->titre4}}">
            titre5: <input type="text" name="titre5" value="{{$header->titre5}}">
            <button class="banner-btn w-25 mt-2" type="submit">Submit</button>
        </form>
  

@endsection