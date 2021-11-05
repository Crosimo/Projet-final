@extends('backoffice.indexBO')

@section('contentBO')
    <div class="home-section">



        <section class="client-area pt-95 pb-50">
            <div class="container">
               
                <div class="row"> 
                    <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="testimonial-owl">
                                
                                <div class="col-xs-12">
                                    <div class="single-testimonial">
                                        <i class="{{ $client->logo }}"></i>
                                        <p>{{ $client->description }} </p>
                                        <img src="{{ asset($client->image) }}" alt="signature">
                                        <h6>{{ $client->titre }}</h6>
                                    </div>    
                                </div> 
                                
                            </div> 
                        </div>   
                    </div>
                </div>
            </div>
        </section>






        <form class=" d-flex flex-column p-2" action="{{route('client.update', $client->id)}}" method="POST" enctype="multipart/form-data">
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
                    image: <input type="file" name="image" value="{{$client->image}}">
                    titre: <input type="text" name="titre" value="{{$client->titre}}">
                    description: <input type="text" name="description" value="{{$client->description}}">
                    logo: <input type="text" name="logo" value="{{$client->logo}}">
                    <button class="banner-btn w-25 mt-2" type="submit">Submit</button>
                </form>
            </div>
    </div>
       
       
            

@endsection