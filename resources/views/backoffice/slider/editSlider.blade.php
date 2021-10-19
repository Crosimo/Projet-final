@extends('backoffice.indexBO')

@section('contentBO')

       
        <form class=" d-flex flex-column home-section p-2" action="{{route('slider.update', $slider->id)}}" method="POST" enctype="multipart/form-data">
            
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
            image: <input type="file" name="image" value="{{$slider->image}}">
            description: <input type="text" name="description" value="{{$slider->description}}">
            button: <input type="text" name="button" value="{{$slider->button}}">
            <input type="checkbox" name="boolean">
            <button class="banner-btn w-25 mt-2" type="submit">Submit</button>
        </form>
  

@endsection