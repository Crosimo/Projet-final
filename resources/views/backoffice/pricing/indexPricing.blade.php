@extends('backoffice.indexBO')

@section('contentBO')


    <div class="home-section text-center">

        <h1 class="titresBO text-center">PARTIE PRICING</h1>

        <a href="/backoffice" class=" text-center w-100">
            <button class="banner-btn" type="submit">Retour backoffice</button>
        </a>

        <table class="table container">
            <thead>
                <tr>
                    <th class="text-center" scope="col">ID</th>

                    <th class="text-center" scope="col">packageTitle</th>
                    <th class="text-center" scope="col">packagePrice</th>
                    <th class="text-center" scope="col">packageLink1</th>
                    <th class="text-center" scope="col">packageLink2</th>
                    <th class="text-center" scope="col">packageLink3</th>
                    <th class="text-center" scope="col">packageLink4</th>
                    <th class="text-center" scope="col">bouton</th>
                    <th class="text-center" scope="col">Edit</th>
                    <th class="text-center" scope="col">Show</th>
                    <th class="text-center" scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pricing as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>

                        <td> {{ $item->packageTitle }}</td>
                        <td> {{ $item->packagePrice }}</td>
                        <td> {{ $item->packageLink1 }}</td>
                        <td> {{ $item->packageLink2 }}</td>
                        <td> {{ $item->packageLink3 }}</td>
                        <td> {{ $item->packageLink4 }}</td>
                        <td> {{ $item->button }}</td>
                        <td>
                            <a href="{{ route('pricing.edit', $item->id) }}">
                                <button class="btn btn-primary" type="submit">
                                    EDIT
                                </button>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('pricing.show', $item->id) }}">
                                <button class="btn" style="background-color:#5FC7AE; color:white" type="submit">
                                    SHOW
                                </button>
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('pricing.destroy', $item->id) }}" method="post">
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
