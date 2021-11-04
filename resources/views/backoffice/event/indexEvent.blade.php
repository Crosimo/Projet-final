@extends('backoffice.indexBO')

@section('contentBO')


    <div class="home-section text-center">

        <h1 class="titresBO text-center">PARTIE EVENT</h1>

        <a href="/backoffice" class=" text-center w-100">
            <button class="banner-btn" type="submit">Retour backoffice</button>
        </a>

        <table class="table container">
            <thead>
                <tr>
                    <th class="text-center" scope="col">ID</th>

                    <th class="text-center" scope="col">titre</th>
                    <th class="text-center" scope="col">description</th>
                    <th class="text-center" scope="col">data</th>
                    <th class="text-center" scope="col">heure</th>
                    <th class="text-center" scope="col">Create</th>
                    <th class="text-center" scope="col">Edit</th>

                    <th class="text-center" scope="col">Show</th>

                    <th class="text-center" scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($event as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>

                        <td> {{ $item->titre }}</td>
                        <td>{{ $item->description }}</td>
                        <td> {{ $item->data }}</td>
                        <td> {{ $item->heure }}</td>

                        <td><a href="{{ route('event.create') }}">
                                <button class="btn btn-success" type="submit">
                                    Create
                                </button>
                            </a></td>
                        <td>

                            <a href="{{ route('event.edit', $item->id) }}">
                                <button class="btn btn-primary" type="submit">
                                    EDIT
                                </button>
                            </a>

                        </td>

                        <td>
                            <a href="{{ route('event.show', $item->id) }}">
                                <button class="btn" style="background-color:#5FC7AE; color:white" type="submit">
                                    SHOW
                                </button>
                            </a>
                        </td>

                        <td>
                            <form action="{{ route('event.destroy', $item->id) }}" method="post">
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
