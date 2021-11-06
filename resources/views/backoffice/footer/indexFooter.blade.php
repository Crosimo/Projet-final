@extends('backoffice.indexBO')

@section('contentBO')


    <div class="home-section text-center">
        @if (session()->has('message'))
        <div class="alert alert-info" style="text-align: center">
            {{ session()->get('message') }}
        </div>
        @endif
        <h1 class="titresBO text-center">PARTIE Footer</h1>

        <a href="/backoffice" class=" text-center w-100" >
            <button class="banner-btn" type="submit">Retour backoffice</button>
        </a>

        <table class="table container">
            <thead>
                <tr >
                    <th class="text-center" scope="col">ID</th>
                    
                    <th class="text-center" scope="col">titre</th>
                    <th class="text-center" scope="col">description</th>
                    <th class="text-center" scope="col">email</th>
                    <th class="text-center" scope="col">tel</th>
                    <th class="text-center" scope="col">adresse</th>
                    <th class="text-center" scope="col">tweets</th>
                    <th class="text-center" scope="col">tweetcontenu1</th>
                    <th class="text-center" scope="col">tweetcontenu2</th>
                    <th class="text-center" scope="col">getintouch</th>
                    <th class="text-center" scope="col">formElem1</th>
                    <th class="text-center" scope="col">formElem2</th>
                    <th class="text-center" scope="col">formElem3</th>
                    <th class="text-center" scope="col">Edit</th>                 
                    <th class="text-center" scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($footer as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        
                        <td> <img src="{{ asset("img/logo/".$item->image) }}" alt=""> </td>
                        <td>{{ $item->description }}</td>
                        <td> {{ $item->email }}</td>
                        <td> {{ $item->tel }}</td>
                        <td> {{ $item->adresse }}</td>
                        <td> {{ $item->tweets }}</td>
                        <td> {{ $item->tweetcontenu1 }}</td>
                        <td> {{ $item->tweetcontenu2 }}</td>
                        <td> {{ $item->getintouch }}</td>
                        <td> {{ $item->formElem1 }}</td>
                        <td> {{ $item->formElem2 }}</td>
                        <td> {{ $item->formElem3 }}</td>
                            <td>
                                <a href="{{ route('Footer.edit', $item->id) }}">
                                    <button class="btn btn-primary" type="submit">
                                        EDIT
                                    </button>
                                </a>

                            </td>                    
                        <td>
                            <form action="{{ route('Footer.destroy', $item->id) }}" method="post">
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
