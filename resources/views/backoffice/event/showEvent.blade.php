@extends('backoffice.indexBO')

@section('contentBO')




    <div class="home-section">
        <a href="/backoffice" class=" text-center w-100" >
            <button class="banner-btn" type="submit">Retour backoffice</button>
        </a>
        <section class="event-area pt-95 pb-100" style="border: 5px solid white;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-xs-12">
                        <div class="section-title text-center">
                            <h2>
                                {!! $titres[6]->titre !!}
                            </h2>
                            <p>{{ $titres[6]->description }} </p>
                        </div>
                        <div class="event-wrapper">
                            <div class="event-content text-center">
                                <h3>{{ $event->titre }}</h3>
                                <p>{{ $event->description }} </p>
                                <h4>{{ $event->data }}</h4>
                                <h5>{{ $event->heure }}</h5>
                                <div class="m-8" style="display: flex; justify-content:center;">
                                    <button type="button" style="margin-right:1rem" class="btn btn-primary" id="myBtna">
                                        Edit
                                    </button>
                                    <form action="{{ route('event.destroy', $event->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">DELETE</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>





    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <section class="event-area pt-35 pb-50">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-xs-12" style="display: flex; align-items:center; flex-direction:column">
                            <div class="section-title text-center">
                                <h2>
                                    {!! $titres[6]->titre !!}
                                </h2>
                                <p>{{ $titres[6]->description }} </p>
                            </div>
                            <div class="event-wrapper">
                                <div class="event-content text-center">
                                    <form class=" p-2" style="width: max-content; height:max-content"
                                        action="{{ route('event.update', $event->id) }}" method="POST"
                                        enctype="multipart/form-data">
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
                                        <h3>titre: <input type="text" name="titre" value="{{ $event->titre }}"></h3>
                                        <h3>description: <input type="text" name="description"
                                                value="{{ $event->description }}"></h3>
                                        <h3>data: <input type="text" name="data" value="{{ $event->data }}"></h3>
                                        <h3> heure: <input type="text" name="heure" value="{{ $event->heure }}"></h3>
                                        <button class="banner-btn w-15 mt-2" type="submit">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </div>




@endsection
