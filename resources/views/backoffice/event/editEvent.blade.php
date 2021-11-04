@extends('backoffice.indexBO')

@section('contentBO')
<div class="home-section" style="background-color: white">
    
<section class=" pt-95 pb-100 bg-gray">
   
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-xs-12">
                <div class="section-title text-center">   
                </div>
                <div class="event-wrapper">
                    <div class="event-content text-center">
                        <h3>{{ $event->titre }}</h3>
                        <p>{{ $event->description }} </p>
                        <h4>{{ $event->data }}</h4>
                        <h5>{{ $event->heure }}</h5>
                    </div>  
                </div>
            </div>
        </div>
    </div>
   
    
</section>

       
        <form class=" d-flex flex-column  p-2" action="{{route('event.update', $event->id)}}" method="POST" enctype="multipart/form-data">
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
            titre: <input type="text" name="titre" value="{{$event->titre}}">
            description: <input type="text" name="description" value="{{$event->description}}">
            data: <input type="text" name="data" value="{{$event->data}}">
            heure: <input type="text" name="heure" value="{{$event->heure}}">
            event Prioritaire: <input type="checkbox" name="boolean" >
            <div>
                <button class="banner-btn w-25 mt-4 block" type="submit">Submit</button>
            </div>
        </div>
        </form>
    
    </div>
@endsection