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
    @include('partials.event')
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
