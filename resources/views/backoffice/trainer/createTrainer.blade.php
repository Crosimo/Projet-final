@extends('backoffice.indexBO')

@section('contentBO')
    <div class="home-section d-flex flex-column align-items-center">
        <div class="container">
            <h1 class="text-center mt-3 d-flex align-items-center">Créer Trainer</h1>
            <br>
            <form action="{{route('trainer.store')}}" method="POST" enctype="multipart/form-data">
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
                <input type="text" name="nom" class="form-control" id="exampleInputEmail1">
                <label for="exampleInputEmail1" class="form-label">facebookLien</label>
                <input type="text" name="facebookLien" class="form-control" id="exampleInputEmail1">
                <label for="exampleInputEmail1" class="form-label">instagramLien</label>
                <input type="text" name="instagramLien" class="form-control" id="exampleInputEmail1">
                <label for="exampleInputEmail1" class="form-label">twitterLien</label>
                <input type="text" name="twitterLien" class="form-control" id="exampleInputEmail1">
                <label for="exampleInputEmail1" class="form-label">pinterestLien</label>
                <input type="text" name="pinterestLien" class="form-control" id="exampleInputEmail1">
                <label for="user" class="form-label ">User</label>
                <select class="form-select " id="user" name="user" aria-label="Default select example">    
                        @foreach ($users as $item)
                        <option value = "{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                
                </select>
                <label for="categorie" class="form-label ">Catégorie</label>
                <select class="form-select " id="trainer" name="role_id" aria-label="Default select example">    
                        <option value = "2">LeadTrainer</option>
                        <option value = "3">Trainer</option>
                
                </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        
    </div>
@endsection