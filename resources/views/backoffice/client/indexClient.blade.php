@extends('backoffice.indexBO')

@section('contentBO')


    <div class="home-section text-center">

        <h1 class="titresBO text-center">PARTIE CLIENT</h1>

        <a href="/backoffice" class=" text-center w-100" >
            <button class="banner-btn" type="submit">Retour backoffice</button>
        </a>

        <table class="table container">
            <thead>
                <tr >
                    <th class="text-center" scope="col">ID</th>
                    <th class="text-center" scope="col">image</th>
                    <th class="text-center" scope="col">titre</th>
                    <th class="text-center" scope="col">description</th>
                    <th class="text-center" scope="col">logo</th>
                   
                        <th class="text-center" scope="col">Edit</th>

                        <th  class="text-center"scope="col">Show</th>
                   
                    <th class="text-center" scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($client as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td> <img src="{{ asset($item->image) }}" alt=""></td>
                        <td> {{ $item->titre }}</td>
                        <td>{{ $item->description }}</td>
                        <td> <i class="{{ $item->logo }}"></i></td>

                        
                            <td>

                                <a href="{{ route('client.edit', $item->id) }}">
                                    <button class="btn btn-primary" type="submit">
                                        EDIT
                                    </button>
                                </a>

                            </td>

                            <td>
                                <a href="{{ route('client.show', $item->id) }}">
                                    <button class="btn" style="background-color:#5FC7AE; color:white" type="submit">
                                        SHOW
                                    </button>
                                </a>
                            </td>
                      
                        <td>
                            <form action="{{ route('client.destroy', $item->id) }}" method="post">
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
