@extends('backoffice.indexBO')

@section('contentBO')
<div class="home-section" style="background-color: white">
       <div class="container">

        <header class="top" style="background-color: #F1F1F1">
            <div class="header-area ptb-18 header-sticky">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2 col-xs-12">
                            <div class="logo">
                                <a href="index.html"><img src="{{ asset("img/logo/".$header->image) }}" alt="COFFEE" /></a>
                            </div>
                        </div>
                       
                        <div class="col-md-7 col-xs-12">
                            <div class="content-wrapper">
                                <!-- Main Menu Start -->
                                <div class="main-menu text-center">
                                    <nav>
                                        <ul>
                                            <li><a href="/">{{ $header->titre1 }}</a></li>
                                            <li><a href="{{ route('abouter') }}">{{ $header->titre2 }}</a></li>
                                            <li><a href="{{ route('classer') }}">{{ $header->titre3 }}</a></li>
                                            <li><a href="{{ route('galleryer') }}">{{ $header->titre4 }}</a></li>
                                            <li><a href="{{ route('contacter') }}">{{ $header->titre5 }}</a></li>
                                            @auth
                                            <li><a href="/profil">Profil</a></li>
                                            @endauth
                                            {{-- Boîte mail --}}
                                            
                                        </ul>
                                    </nav>
                                </div>
                                <div class="mobile-menu hidden-lg hidden-md"></div>
                                <!-- Main Menu End -->
                            </div>
                        </div>
                        <div class="col-md-3 hidden-sm hidden-xs">
                            <div class="header-contact text-right">
                            @if (Auth::check())
                            <form     method="POST" action="{{ route('logout') }}">
                                {{-- class="banner-btn" --}}
                                @csrf
                                <x-dropdown-link style="width: 100%; padding-left: 0 !important;" :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    <span class="links_name styliseur" >Log Out</span>
                                </x-dropdown-link>
                            </form>
                            {{-- <a class="banner-btn" data-text="contact" href="contact.html"><span>contact</span></a> --}}
                            @else
                            
                            <a href="{{ route('login') }}" class="banner-btn"  >Log in</a>
                            {{-- <a href="{{ route('register') }}" class="banner-btn" >Register</a>   --}}
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>





       
        <form class=" d-flex flex-column p-2" action="{{route('header.update', $header->id)}}" method="POST" enctype="multipart/form-data">
            
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
            image: <input type="file" name="image" value="{{$header->image}}">
            titre1: <input type="text" name="titre1" value="{{$header->titre1}}">
            titre2: <input type="text" name="titre2" value="{{$header->titre2}}">
            titre3: <input type="text" name="titre3" value="{{$header->titre3}}">
            titre4: <input type="text" name="titre4" value="{{$header->titre4}}">
            titre5: <input type="text" name="titre5" value="{{$header->titre5}}">
            <button class="banner-btn w-25 mt-2" type="submit">Submit</button>
        </form>
    </div>
</div>
@endsection