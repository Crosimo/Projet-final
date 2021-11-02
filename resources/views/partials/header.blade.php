<header class="top">
    <div class="header-area ptb-18 header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-xs-12">
                    <div class="logo">
                        <a href="index.html"><img src="{{ "img/logo/".$headers->image }}" alt="COFFEE" /></a>
                    </div>
                </div>
                <div class="col-md-7 col-xs-12">
                    <div class="content-wrapper">
                        <!-- Main Menu Start -->
                        <div class="main-menu text-center">
                            <nav>
                                <ul>
                                    <li><a href="index.html">{{ $headers->titre1 }}</a></li>
                                    <li><a href="/about-us">{{ $headers->titre2 }}</a></li>
                                    <li><a href="menu.html">{{ $headers->titre3 }}</a></li>
                                    <li><a href="reservation.html">{{ $headers->titre4 }}</a></li>
                                    <li><a href="contact.html">{{ $headers->titre5 }}</a></li>
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
</header>