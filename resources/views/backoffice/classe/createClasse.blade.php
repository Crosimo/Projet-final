@extends('backoffice.indexBO')

@section('contentBO')
    <div class="home-section d-flex flex-column align-items-center">
        <h1 class="text-center mt-3 d-flex align-items-center">Créer CLASSE</h1>
        <br>
        <form action="{{route('classe.store')}}" method="POST" enctype="multipart/form-data">
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
            <label for="exampleInputEmail1" class="form-label">image</label>
            <input type="file" name="image" class="form-control" id="exampleInputEmail1">
            <label for="exampleInputEmail1" class="form-label">nom</label>
            <input type="file" name="nom" class="form-control" id="exampleInputEmail1">
            <label for="exampleInputEmail1" class="form-label">instructeur</label>
            <input type="text" name="instructeur" class="form-control" id="exampleInputEmail1">
            <label for="exampleInputEmail1" class="form-label">heure</label>
            <input type="text" name="heure" class="form-control" id="exampleInputEmail1">
            </div>
            {{ dd($classe[0]->trainer->id) }}
            <select class="form-select" name="trainer_id" aria-label="Default select example">
               
                @foreach ($classe as $item)
                    
                    {{-- @foreach ($item->trainer as $qui)
                    
                    <option value="{{ $qui->id }}">{{ $qui->nom  }}</option>
                    @endforeach --}}
                @endforeach
                
              </select>
              <select class="form-select" multiple aria-label="Default select example">
                <option selected>Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection