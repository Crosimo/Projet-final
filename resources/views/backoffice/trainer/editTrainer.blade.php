@extends('backoffice.indexBO')

@section('contentBO')

    <div class="home-section">
        <div class="container">



            <div class="trainer-area pt-30 pb-40 ">
                <div class="container">
                    <div class="row flex justify-center">
                        


                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="single-trainer text-center">
                                <img src="{{ asset('img/trainer/' . $trainer->image) }}" alt="trainer">
                                <div class="trainer-hover">
                                    <h3>{{ $trainer['nom'] }}</h3>
                                    <ul>
                                        <li><a href="{{ $trainer->facebookLien }}"><i
                                                    class="{{ $trainer->facebook }}"></i></a></li>
                                        <li><a href="{{ $trainer->twitterLien }}"><i
                                                    class="{{ $trainer->twitter }}"></i></a></li>
                                        <li><a href="{{ $trainer->instagramLien }}"><i
                                                    class="{{ $trainer->instagram }}"></i></a></li>
                                        <li><a href="{{ $trainer->pinterestLien }}"><i
                                                    class="{{ $trainer->pinterest }}"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>










            <form class=" d-flex flex-column  p-2" action="{{ route('trainer.update', $trainer->id) }}" method="POST"
                enctype="multipart/form-data">

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
                image: <input type="file" name="image" value="{{ $trainer->image }}">
                nom: <input type="text" name="nom" value="{{ $trainer->nom }}">
                facebookLien: <input type="text" name="facebookLien" value="{{ $trainer->facebookLien }}">
                instagramLien: <input type="text" name="instagramLien" value="{{ $trainer->instagramLien }}">
                twitterLien: <input type="text" name="twitterLien" value="{{ $trainer->twitterLien }}">
                pinterestLien: <input type="text" name="pinterestLien" value="{{ $trainer->pinterestLien }}">
                <select class="form-select"  id="trainer" name="role_id" aria-label="Default select example">    
                    <option value = "2">LeadTrainer</option>
                    <option  value = "3">Trainer</option>
            
            </select>
                <button class="banner-btn w-25 mt-2" type="submit">Submit</button>
            </form>
        </div>
    </div>



@endsection
