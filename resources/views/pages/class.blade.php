@extends('template/welcome')
@section('content')
    

        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
        
		<!-- Header Area Start -->
		
		<!-- Header Area End -->
		<!-- Banner Area Start -->
		@include('partials.banner')
		<!-- Banner Area End -->
        <!-- Classes Start -->
        @include('partials.classe')
        <!-- Class Area End -->
        <!-- Schedule Area Strat -->
        @include('partials.schedule')
        <!-- Schedule Area End -->
        <!-- Pricing Area Start -->
        
        <!-- Pricing Area End -->
        <!-- Client Area Strat -->
        @include('partials.client')
        
        <!-- Client Area End -->
        <!-- Start of Map Area -->
        
        <!-- Footer Area End -->
       
		@endsection