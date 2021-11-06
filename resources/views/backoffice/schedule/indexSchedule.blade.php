@extends('backoffice.indexBO')

@section('contentBO')
    <div class="home-section text-center">
        @if (session()->has('message'))
        <div class="alert alert-info" style="text-align: center">
            {{ session()->get('message') }}
        </div>
        @endif
        <h1 class="titresBO text-center">PARTIE PRICING</h1>

        <a href="/backoffice" class=" text-center w-100">
            <button class="banner-btn" type="submit">Retour backoffice</button>
        </a>

        <table class="table container">
            <thead>
                <tr>
                    <th class="text-center" scope="col">ID</th>

                    <th class="text-center" scope="col">nom</th>
                    <th class="text-center" scope="col">instructeur</th>
                    <th class="text-center" scope="col">heure</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($schedule as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>

                        <td> {{ $item->nom }}</td>
                        <td> {{ $item->instructeur }}</td>
                        <td> {{ $item->heure }}</td>
                        <td>
                            <a href="{{ route('schedule.edit', $item->id) }}">
                                <button class="btn btn-primary" type="submit">
                                    EDIT
                                </button>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('schedule.show', $item->id) }}">
                                <button class="btn" style="background-color:#5FC7AE; color:white" type="submit">
                                    SHOW
                                </button>
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('schedule.destroy', $item->id) }}" method="post">
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
