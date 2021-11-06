@extends('template/welcome')

@section('content')


    <!--[if lt IE 8]>
                <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
            <![endif]-->


    <!-- Header Area Start -->
    
    <!-- Header Area End -->
    <!-- Banner Area Start -->
    @include('partials.banner')
    @include('partials.about')
   
    <section class="event-area pt-95 pb-100 bg-gray">
   
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-xs-12">
                    <div class="section-title text-center">
                        <h2>  
                               {!! $titres[6]->titre !!}
                            </h2>
                        <p>{{ $titres[6]->description }} </p>
                    </div>
                    @foreach ($events as $event)
                        
                   
                    <div class="event-wrapper" style="width: 770px; height: 237px" >
                        <div class="event-content text-center">
                            <h3>{{ $event->titre }}</h3>
                            <p>{{ $event->description }} </p>
                            <h4>{{ $event->data}}</h4>
                            <h5>{{ $event->heure }}</h5>
                        </div>  
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div style="text-align: center; margin-top:1rem; background-color:none">
            {{ $events->links('vendor.pagination.custom') }}   
        </div>
    
        
    </section>

    <!-- Banner Area End -->
    <!-- About Start -->
    
    <!-- About End -->
    <!-- Event Area Strat -->
    
    <!-- Event Area End -->
    <!-- Client Area Strat -->
    @include('partials.client')
    <!-- Client Area End -->
    <!-- Start of Map Area -->
    
    <!-- Footer Area End -->

@endsection
