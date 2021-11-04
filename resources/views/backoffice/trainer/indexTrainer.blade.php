@extends('backoffice.indexBO')

@section('contentBO')


    <div class="home-section text-center">

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
                    <th class="text-center" scope="col">Edit</th>
                    <th class="text-center" scope="col">Show</th>
                    <th class="text-center" scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($trainer as $item)
                    <tr>
                        <th style="text-align: center" scope="row">{{ $item->id }}</th>
                        <td> <img style="margin:auto" width="100" height="75" src="{{ asset('img/trainer/'. $item->image)  }}" alt=""> </td>
                        <td> {{ $item->nom }}</td>
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
