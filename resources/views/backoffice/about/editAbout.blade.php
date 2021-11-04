@extends('backoffice.indexBO')

@section('contentBO')
<div class="home-section" >

    
<section class="about-area pt-95 pb-100" style="border: 5px solid white;">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="about-content">
                     <h2>
                         
                        
                        {{-- {!! ($titres[1])->titre !!} --}}
                         
                         
                    </h2>
                     {{-- <p class="m-0">{{ $titres[1]->description }}</p> --}}
                     <p>{{ $about->content }} </p>
                     <a class="banner-btn" href="about-us.html" data-text="read more"><span>read more</span></a>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="about-video active">
                     <div class="game">
                         <a href="#"><img style="width:550px; height:322px"src="{{ asset('img/about/'.$about->image) }}" alt="about"></a>
                     </div> 
                     <div class="video-icon video-hover">
                         <a class="video-popup" href="{{ $about->vidéo }}">
                             <i class="{{ $about->logo }}"></i>
                         </a>
                     </div>
                </div>
            </div>
        </div>
    </div>
 </section>
       
        <form class=" d-flex flex-column p-2" action="{{route('about.update', $about->id)}}" method="POST" enctype="multipart/form-data">
            
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
            image: <input type="file" name="image" value="{{$about->image}}">
            content: <input type="text" name="content" value="{{$about->content}}">
            vidéo: <input type="text" name="vidéo" value="{{$about->vidéo}}">
            logo: <input type="text" name="logo" value="{{$about->logo}}">
            <button class="banner-btn w-25 mt-2" type="submit">Submit</button>
        </form>
  

    </div>

        


@endsection