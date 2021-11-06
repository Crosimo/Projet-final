@extends('backoffice.indexBO')

@section('contentBO')


    <div class="home-section text-center">
        @if (session()->has('message'))
        <div class="alert alert-info" style="text-align: center">
            {{ session()->get('message') }}
        </div>
        @endif
        <h1 class="titresBO text-center">PARTIE TITRE</h1>

        <a href="/backoffice" class=" text-center w-100">
            <button class="banner-btn" type="submit">Retour backoffice</button>
        </a>

        <table class="table container">
            <thead>
                <tr>
                    <th class="text-center" scope="col">ID</th>

                    <th class="text-center" scope="col">titre</th>
                    <th class="text-center" scope="col">description</th>
                   
                    <th class="text-center" scope="col">Edit</th>
                    
                    <th class="text-center" scope="col">Destroy</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($titre as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>

                        <td> {{ $item->titre }}</td>
                        <td> {{ $item->description }}</td>
                        
                        
                        <td>
                            <a href="{{ route('titre.edit', $item->id) }}">
                                <button class="btn btn-primary" type="submit">
                                    EDIT
                                </button>
                            </a>
                        </td>
                        
                        <td>
                            <form action="{{ route('titre.destroy', $item->id) }}" method="post">
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
