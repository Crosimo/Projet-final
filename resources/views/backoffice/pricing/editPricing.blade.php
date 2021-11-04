@extends('backoffice.indexBO')

@section('contentBO')
<div class="home-section" style="background-color: white">

   




    <div class="pricing-area pt-95 pb-120 bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-xs-12">
                    <div class="section-title text-center">
            
                    </div>
                </div>
            </div>
            <div class="row flex justify-center">
                
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single-table text-center">
                        <div class="table-head">
                            <h2>{{ $pricing->packageTitle }}</h2>
                            <h1>{{ $pricing->packagePrice }}<span>/month</span></h1>
                        </div>
                        <div class="table-body">
                            <ul>
                                <li>{{ $pricing->packageLink1 }}</li>
                                <li>{{ $pricing->packageLink2 }}</li>
                                <li>{{ $pricing->packageLink3 }}</li>
                                <li>{{ $pricing->packageLink4 }}</li>
                            </ul>
                            @auth
                            <a href="{{ route('paiement', $pricing->id) }}">{{ $pricing->button }}</a>
                            @else
                            <a href="{{route('register', $pricing->id)}}">{{ $pricing->button }}</a>
                            @endauth
                            
                        </div>
                    </div>
                </div>
            
                
                
            </div>
        </div>
    </div>


       
        <form class=" d-flex flex-column p-2 container" action="{{route('pricing.update', $pricing->id)}}" method="POST" enctype="multipart/form-data">
            
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
            packageTitle: <input type="file" name="packageTitle" value="{{$pricing->packageTitle}}">
            packagePrice: <input type="text" name="packagePrice" value="{{$pricing->packagePrice}}">
            packageLink1: <input type="text" name="packageLink1" value="{{$pricing->packageLink1}}">
            packageLink2: <input type="text" name="packageLink2" value="{{$pricing->packageLink2}}">
            packageLink3: <input type="text" name="packageLink3" value="{{$pricing->packageLink3}}">
            packageLink4: <input type="text" name="packageLink4" value="{{$pricing->packageLink4}}">
            bouton: <input type="text" name="button" value="{{$pricing->button}}">
            <button class="banner-btn w-25 mt-2" type="submit">Submit</button>
        </form>
</div> 

@endsection