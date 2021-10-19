@extends('backoffice.indexBO')

@section('contentBO')
    <div class="home-section d-flex flex-column align-items-center">
        <h1 class="text-center mt-3 d-flex align-items-center">Créer SLIDER</h1>
        <br>
        <form action="{{route('slider.store')}}" method="POST" enctype="multipart/form-data">
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
            <label for="exampleInputEmail1" class="form-label">description</label>
            <input type="text" name="description" class="form-control" id="exampleInputEmail1">
            <label for="exampleInputEmail1" class="form-label">button</label>
            <input type="text" name="button" class="form-control" id="exampleInputEmail1">
            </div>
            <input type="checkbox" name="boolean" checked>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection