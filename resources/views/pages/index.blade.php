@extends('template/welcome')

@section('content')
    
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
       
        
		<!-- Header Area Start -->
        
		<!-- Header Area End -->
		<!-- Background Area Start -->
		@include('partials.slider')
		<!-- Background Area End -->
        <!-- About Start -->
       @include('partials.about')
        <!-- Welcome End -->
        <!-- Classes Start -->
        @include('partials.class')
        <!-- Class Area End -->
        <!-- Schedule Area Strat -->
        @include('partials.schedule')
        <!-- Schedule Area End -->
        <!-- Trainer Area Start -->
        @include('partials.trainer')
        <!-- Trainer Area End -->
        <!-- Gallery Area Start -->
        @include('partials.gallery')
        <!-- Gallery Area End -->
        <!-- Event Area Strat -->
        @include('partials.event')
        <!-- Event Area End -->
        <!-- Blog Area Start -->

        <!-- Event Area End -->
        <!-- Pricing Area Start -->
        @include('partials.pricing')
        <!-- Pricing Area End -->
        <!-- Client Area Strat -->
       @include('partials.client')
        <!-- Client Area End -->
        <!-- Start of Map Area -->
        
        <!-- End of Map Area -->
        <!-- Newsletter Area Start -->
       
        <!-- Newsletter Area End -->
        <!-- Footer Area Start -->
        
        <!-- Footer Area End -->


       @endsection
		
