@extends('backoffice.indexBO')

@section('contentBO')
<div class="home-section" style="background-color: white">
    <footer class="footer-area bg-gray">
        <div class="footer-widget-area bg-3 pt-98 pb-90 fix">
            <div class="container">
                <div class="row">  
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="single-footer-widget">
                            <a href="index.html"><img src="{{ asset("img/logo/".$footer->image) }}" alt="handstand"></a>
                            <p>{{ $footer->description }} </p>
                            <ul>
                                <li><i class="{{ $footer->logoEmail }}"></i> {{ $footer->email }}</li>
                                <li><i class="{{ $footer->logoTel }}"></i> {{ $footer->tel }}</li>
                                <li><i class="{{ $footer->logoAdresse }}"></i>{{ $footer->adresse }}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="single-footer-widget">
                            <h3>{{ $footer->tweets }}</h3>
                            <div class="single-twitt mb-10">
                                <div class="twitt-icon">
                                    <i class="{{ $footer->tweetIcon }}"></i>
                                </div>
                                <div class="twitt-content">
                                    <p>{{ $footer->tweetcontenu1 }}</p>
                               <a href="https://twitter.com/login/">https://twitter.com/login</a>
                                </div>
                            </div>
                            <div class="single-twitt">
                                <div class="twitt-icon">
                                    <i class="{{ $footer->tweetIcon }}"></i>
                                </div>
                                <div class="twitt-content">
                                    <p>{{ $footer->tweetcontenu2 }}</p>
                               <a href="https://twitter.com/login/">https://twitter.com/login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 hidden-sm col-xs-12">
                        <div class="single-footer-widget">
                            <h3>{{ $footer->getintouch }}</h3>
                            <form id="subscribe-form" action="{{ route('email.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="text" placeholder="Name" name="name">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" placeholder="Email" name="email">
                                    </div>
                                    <div class="col-sm-12">
                                        <textarea cols="30" rows="7" name="message" placeholder="subject"></textarea>
                                        <button type="submit">submit</button>
                                        {{-- <p class="subscribe-message"></p> --}}
                                    </div>
                                </div>
                            </form>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-text-area fix bg-coffee ptb-18">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="footer-text text-center">
                            <span>{{ $footer->copyright }} &copy; <a href="#">{{ $footer->copyrightEntreprise }}</a> {{ $footer->copyrightEntreprise }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    
        <form class="container" action="{{route('Footer.update', $footer->id)}}" method="POST" enctype="multipart/form-data">
            
            <h1 class="text-center fs-4 mt-2">
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
            image: <input type="file" name="image" value="{{$footer->image}}">
            description: <input type="text" name="description" value="{{$footer->description}}">
            email: <input type="email" name="email" value="{{$footer->email}}">
            logo email: <input type="email" name="logoEmail" value="{{$footer->logoEmail}}">
            tel: <input type="text" name="tel" value="{{$footer->tel}}">
            adresse: <input type="text" name="adresse" value="{{$footer->adresse}}">
            tweets: <input type="text" name="tweets" value="{{$footer->tweets}}">
            tweetcontenu1: <input type="text" name="tweetcontenu1" value="{{$footer->tweetcontenu1}}">
            tweetcontenu2: <input type="text" name="tweetcontenu2" value="{{$footer->tweetcontenu2}}">
            getintouch: <input type="text" name="getintouch" value="{{$footer->getintouch}}">
            formElem1: <input type="text" name="formElem1" value="{{$footer->formElem1}}">
            formElem2: <input type="text" name="formElem2" value="{{$footer->formElem2}}">
            formElem3: <input type="text" name="formElem3" value="{{$footer->formElem3}}">
            <button class="banner-btn w-25 mt-2" type="submit">Submit</button>
        </form>
  
</div>
@endsection