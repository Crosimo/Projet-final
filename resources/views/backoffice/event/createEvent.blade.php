@extends('backoffice.indexBO')

@section('contentBO')
    <div class="home-section d-flex flex-column align-items-center ">
        <div class="container">
           
        <h1 class="text-center mt-3 d-flex align-items-center">Créer EVENT</h1>
        <br>
        <form action="{{route('event.store')}}" method="POST" enctype="multipart/form-data">
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
            <label for="exampleInputEmail1" class="form-label">titre</label>
            <input type="text" name="titre" class="form-control" id="exampleInputEmail1">
            <label for="exampleInputEmail1" class="form-label">description</label>
            <input type="text" name="description" class="form-control" id="exampleInputEmail1">
            <label for="exampleInputEmail1" class="form-label">date</label>
            <input type="date" name="data" class="form-control" id="exampleInputEmail1">
            <label for="exampleInputEmail1" class="form-label">heure</label>
            <input type="time" name="heure" class="form-control" id="exampleInputEmail1">
            </div>
            Prioritaire: <input type="checkbox" name="boolean" checked>
            <div>
                <button type="submit" class="btn btn-primary mt-4">Submit</button>
            </div>
        </form>
    </div>
    </div>
@endsection