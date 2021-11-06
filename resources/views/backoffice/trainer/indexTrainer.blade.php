@extends('backoffice.indexBO')

@section('contentBO')


    <div class="home-section text-center">
        @if (session()->has('message'))
        <div class="alert alert-info" style="text-align: center">
            {{ session()->get('message') }}
        </div>
        @endif
        <h1 class="titresBO text-center">PARTIE TRAINER</h1>

        <a href="/backoffice" class=" text-center w-100">
            <button class="banner-btn" type="submit">Retour backoffice</button>
        </a>

        <table class="table container">
            <thead>
                <tr>
                    <th class="text-center" scope="col">ID</th>

                    <th class="text-center" scope="col">image</th>
                    <th class="text-center" scope="col">nom</th>
                    <th class="text-center" scope="col">Lien Facebook</th>
                    <th class="text-center" scope="col">Lien Instagram</th>
                    <th class="text-center" scope="col">Lien Pinterest</th>
                    <th class="text-center" scope="col">Lien Twitter</th>
                    <th class="text-center" scope="col">Create</th>
                    <th class="text-center" scope="col">Edit</th>
                    <th class="text-center" scope="col">Show</th>
                    <th class="text-center" scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($trainer as $item)
                    <tr>
                        <th style="text-align: center" scope="row">{{ $item->id }}</th>
                        <td> <img style="margin:auto; "  src="{{ asset('img/trainer/'. $item->image)  }}" alt=""> </td>
                        <td> {{ $item->nom }}</td>
                        <td> {{ $item->facebookLien }}</td>
                        <td> {{ $item->instagramLien }}</td>
                        <td> {{ $item->pinterestLien }}</td>
                        <td> {{ $item->twitterLien }}</td>
                        <td> 
                            <a href="{{ route('trainer.create', $item->id) }}">
                                <button class="btn btn-info" type="submit">
                                    CREATE
                                </button>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('trainer.edit', $item->id) }}">
                                <button class="btn btn-primary" type="submit">
                                    EDIT
                                </button>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('trainer.show', $item->id) }}">
                                <button class="btn" style="background-color:#5FC7AE; color:white" type="submit">
                                    SHOW
                                </button>
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('trainer.destroy', $item->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">DELETE</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
@endsection
