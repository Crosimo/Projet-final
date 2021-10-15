@extends('backoffice.indexBO')

@section('contentBO')

       
        <form class=" d-flex flex-column home-section p-2" action="{{route('footer.update', $footer->id)}}" method="POST" enctype="multipart/form-data">
            
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
            titre: <input type="text" name="titre" value="{{$footer->titre}}">
            description: <input type="text" name="description" value="{{$footer->description}}">
            email: <input type="email" name="email" value="{{$footer->email}}">
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
  

@endsection