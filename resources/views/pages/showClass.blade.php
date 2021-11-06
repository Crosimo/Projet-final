<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Home Page || Handstand</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin="" />
    <!-- All css here -->
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/shortcode/shortcodes.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <script src="{{ asset('js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>
<body>
    

@include('partials.header')


    <section class="class-area fix bg-gray pb-100 pt-95">
        <div class="container">
            
            <div class="row" style="display: flex; justify-content:center"> 
                <div class="col-md-4 col-sm-6 col-xs-12">     
                    <div class="single-class">
                        <div class="single-img">
                            <a href="class.html"><img   src="{{ asset('img/classe/'.$classe->image) }}" alt="class"></a>
                            <div class="gallery-icon">
                                <a class="image-popup" href="{{ asset('img/classe/'.$classe->image) }}">
                                    <i class="zmdi zmdi-zoom-in"></i>
                                </a>   
                            </div>
                        </div>
                        @if ($classe->prioritaire == true)
                        <div class="single-content" style="background-color:green"> 
                        @elseif($classe->places-(count($classe->users)) == 0) 
                        <div class="single-content" style="background-color:grey">
                        @elseif($classe->places -(count($classe->users)) <= 3 ) 
                        <div class="single-content" style="background-color:red">
                        @elseif($classe->places -(count($classe->users)) <=5)
                        <div class="single-content" style="background-color:orange">
                        @else
                        <div class="single-content">
                        @endif
                            <h3><a href="{{ route('classe.shower', $classe->id) }}">{{ $classe->nom }}</a></h3>
                            <ul>
                                <li><i class="zmdi zmdi-face"></i>{{ $classe->trainer->nom }}</li>
                                <li><i class="zmdi zmdi-alarm"></i>{{ substr($classe->heureDébut,11, 2) }}-{{ substr($classe->heureFin,11, 2) }}A.M.</li>
                                <li><i class="zmdi zmdi-album"></i> {{ $classe->categorie->nom }}</li>
                                <ul style="padding: 0">
                                    @foreach ($classe->tags as $tag)
                                    <li><i class="zmdi zmdi-case"></i>{{ $tag->nom }}</li>
                                    @endforeach
                                </ul>
                                <div  style="padding: 1rem; ">
                                    @auth
                                    <a class="btn btn-primary" href="{{ route('inscription', $classe->id) }}">S'inscrire</a>
                                    @else
                                    <a href="{{ route('login') }}">S'inscrire</a>
                                    @endauth
                                </div>
                               
                            </ul>
                        </div>
                        
                    </div>
                </div>
                
               
                
            </div>
            
        </div>
    </section>
   
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>
<script src="{{ asset('js/vendor/jquery-1.12.4.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/jquery.meanmenu.js') }}"></script>
<script src="{{ asset('js/ajax-mail.js') }}"></script>
<script src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('js/slick.min.js') }}"></script>
<script src="{{ asset('js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('js/jquery.magnific-popup.js') }}"></script>
<script src="{{ asset('js/plugins.js') }}"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSLSFRa0DyBj9VGzT7GM6SFbSMcG0YNBM"></script>
<script>

</body>
</html>
    

