@extends('backoffice.indexBO')

@section('contentBO')

       
        <form class=" d-flex flex-column home-section p-2" action="{{route('pricing.update', $pricing->id)}}" method="POST" enctype="multipart/form-data">
            
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
            packageTitle: <input type="file" name="packageTitle" value="{{$pricing->packageTitle}}">
            packagePrice: <input type="text" name="packagePrice" value="{{$pricing->packagePrice}}">
            packageLink1: <input type="text" name="packageLink1" value="{{$pricing->packageLink1}}">
            packageLink2: <input type="text" name="packageLink2" value="{{$pricing->packageLink2}}">
            packageLink3: <input type="text" name="packageLink3" value="{{$pricing->packageLink3}}">
            packageLink4: <input type="text" name="packageLink4" value="{{$pricing->packageLink4}}">
            bouton: <input type="text" name="button" value="{{$pricing->button}}">
            <button class="banner-btn w-25 mt-2" type="submit">Submit</button>
        </form>
  

@endsection