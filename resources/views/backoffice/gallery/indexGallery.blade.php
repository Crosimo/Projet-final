@extends('backoffice.indexBO')

@section('contentBO')


    <div class="home-section text-center">

        <h1 class="titresBO text-center">PARTIE GALLERIE</h1>

        <a href="/backoffice" class=" text-center w-100" >
            <button class="banner-btn" type="submit">Retour backoffice</button>
        </a>

        <table class="table container" style="width: 60%">
            <thead>
                <tr >
                    <th class="text-center" scope="col">ID</th>
                    
                    <th class="text-center" scope="col">image</th>
                    <th class="text-center" scope="col">Create</th>
                    <th class="text-center" scope="col">Edit</th>
                   
                    <th class="text-center" scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($gallery as $item)
                    <tr >
                        
                        <th style="text-align: center" scope="row">{{ $item->id }}</th>
                        
                        <td > <img style="margin:auto" height="75" width="100" src="{{ asset("img/portfolio/".$item->image) }}" alt=""></td>
                        <td>
                            <a href="{{ route('gallery.create') }}">
                                <button class="btn btn-info" type="submit">
                                    CREATE
                                </button>
                            </a>
                        </td>
                        <td>

                            <form  action="{{route('gallery.update', $item->id)}}" method="POST" enctype="multipart/form-data">                             
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
                                Edit image: <input type="file" name="image" value="{{$item->image}}">
                                <button class="banner-btn w-25 mt-2" type="submit">Submit</button>
                            </form>

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
