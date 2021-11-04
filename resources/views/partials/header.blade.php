<header class="top">
    <div class="header-area ptb-18 header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-xs-12">
                    <div class="logo">
                        <a href="index.html"><img src="{{ asset("img/logo/".$headers->image) }}" alt="COFFEE" /></a>
                    </div>
                </div>
                <div class="col-md-8 col-xs-12">
                    <div class="content-wrapper">
                        <!-- Main Menu Start -->
                        <div class="main-menu text-center">
                            <nav>
                                <ul>
                                    <li><a href="/">{{ $headers->titre1 }}</a></li>
                                    <li><a href="{{ route('abouter') }}">{{ $headers->titre2 }}</a></li>
                                    <li><a href="{{ route('classer') }}">{{ $headers->titre3 }}</a></li>
                                    <li><a href="{{ route('galleryer') }}">{{ $headers->titre4 }}</a></li>
                                    <li><a href="{{ route('contacter') }}">{{ $headers->titre5 }}</a></li>
                                    @auth
                                    <li><a href="/profil">Profil</a></li>
                                    <li><a href="/backoffice">backoffice</a></li>
                                    @endauth
                                    {{-- Boîte mail --}}
                                    
                                </ul>
                            </nav>
                        </div>
                        <div class="mobile-menu hidden-lg hidden-md"></div>
                        <!-- Main Menu End -->
                    </div>
                </div>
                <div class="col-md-2 hidden-sm hidden-xs">
                    <div class="header-contact text-right">
                    @if (!Auth::check())
                    
                    {{-- <a class="banner-btn" data-text="contact" href="contact.html"><span>contact</span></a> --}}
                    
                    <a href="{{ route('login') }}" class="banner-btn"  >Log in</a>
                    {{-- <a href="{{ route('register') }}" class="banner-btn" >Register</a>   --}}
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>