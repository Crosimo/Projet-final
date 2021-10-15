@extends('backoffice.indexBO')

@section('contentBO')


    <div class="home-section text-center">

        <h1 class="titresBO text-center">PARTIE HEADER</h1>

        <a href="/backoffice" class=" text-center w-100">
            <button class="banner-btn" type="submit">Retour backoffice</button>
        </a>

        <table class="table container">
            <thead>
                <tr>
                    <th class="text-center" scope="col">ID</th>

                    <th class="text-center" scope="col">image</th>
                    <th class="text-center" scope="col">titre1</th>
                    <th class="text-center" scope="col">titre2</th>
                    <th class="text-center" scope="col">titre3</th>
                    <th class="text-center" scope="col">titre4</th>
                    <th class="text-center" scope="col">titre5</th>
                    <th class="text-center" scope="col">Edit</th>
                    <th class="text-center" scope="col">Show</th>
                    <th class="text-center" scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($gallery as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>

                        <td> {{ $item->image }}</td>
                        <td> {{ $item->titre1 }}</td>
                        <td> {{ $item->titre2 }}</td>
                        <td> {{ $item->titre3 }}</td>
                        <td> {{ $item->titre4 }}</td>
                        <td> {{ $item->titre5 }}</td>
                        <td>

                            <a href="{{ route('gallery.edit', $item->id) }}">
                                <button class="btn btn-primary" type="submit">
                                    EDIT
                                </button>
                            </a>

                        </td>

                        <td>
                            <a href="{{ route('gallery.show', $item->id) }}">
                                <button class="btn" style="background-color:#5FC7AE; color:white" type="submit">
                                    SHOW
                                </button>
                            </a>
                        </td>

                        <td>
                            <form action="{{ route('gallery.destroy', $item->id) }}" method="post">
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
