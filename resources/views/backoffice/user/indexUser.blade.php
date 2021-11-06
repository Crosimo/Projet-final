@extends('backoffice.indexBO')

@section('contentBO')


    <div class="home-section text-center">
        @if (session()->has('message'))
        <div class="alert alert-info" style="text-align: center">
            {{ session()->get('message') }}
        </div>
        @endif
        <h1 class="titresBO text-center">PARTIE SLIDER</h1>

        <a href="/backoffice" class=" text-center w-100">
            <button class="banner-btn" type="submit">Retour backoffice</button>
        </a>

        <table class="table container">
            <thead>
                <tr>
                    <th class="text-center" scope="col">ID</th>

                    <th class="text-center" scope="col">Nom</th>
                    <th class="text-center" scope="col">image</th>
                    <th class="text-center" scope="col">email</th>
                    <th class="text-center" scope="col">package</th>
                    <th class="text-center" scope="col">Destroy</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>

                        <td> {{ $item->name }}</td>
                        <td> {{asset('img/profile/'.$item->image ) }}</td>
                        <td> {{ $item->email }}</td>
                        <td> {{ $item->pricing->nom }}</td>
                        
                        <td>
                            <form action="{{ route('user.destroy', $item->id) }}" method="post">
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
