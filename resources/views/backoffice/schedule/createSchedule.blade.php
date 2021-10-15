@extends('backoffice.indexBO')

@section('contentBO')
    <div class="home-section d-flex flex-column align-items-center">
        <h1 class="text-center mt-3 d-flex align-items-center">Créer SCHEDULE</h1>
        <br>
        <form action="{{route('schedule.store')}}" method="POST" enctype="multipart/form-data">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            @csrf
            <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">nom</label>
            <input type="text" name="nom" class="form-control" id="exampleInputEmail1">
            <label for="exampleInputEmail1" class="form-label">instructeur</label>
            <input type="text" name="instructeur" class="form-control" id="exampleInputEmail1">
            <label for="exampleInputEmail1" class="form-label">heure</label>
            <input type="text" name="heure" class="form-control" id="exampleInputEmail1">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection