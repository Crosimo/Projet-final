@extends('backoffice.indexBO')

@section('contentBO')

       
        <form class=" d-flex flex-column home-section p-2" action="{{route('client.update', $client->id)}}" method="POST" enctype="multipart/form-data">
            
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
            image: <input type="file" name="image" value="{{$client->image}}">
            description: <input type="text" name="description" value="{{$client->description}}">
            logo: <input type="text" name="logo" value="{{$client->logo}}">
            image: <input type="text" name="image" value="{{$client->image}}">
            <button class="banner-btn w-25 mt-2" type="submit">Submit</button>
        </form>
  

@endsection