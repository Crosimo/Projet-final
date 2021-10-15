@extends('backoffice.indexBO')

@section('contentBO')

       
        <form class=" d-flex flex-column home-section p-2" action="{{route('schedule.update', $schedule->id)}}" method="POST" enctype="multipart/form-data">
            
            <h1 class="text-center fs-4">
            Modifier la section</h1>
                <br>
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
            @method('PUT')
            nom: <input type="file" name="nom" value="{{$schedule->nom}}">
            instructeur: <input type="text" name="instructeur" value="{{$schedule->instructeur}}">
            heure: <input type="text" name="heure" value="{{$schedule->heure}}">
            <button class="banner-btn w-25 mt-2" type="submit">Submit</button>
        </form>
  

@endsection