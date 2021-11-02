@extends('backoffice.indexBO')

@section('contentBO')
<section class="home-section">
    
<div class="text">Boite Mail</div>
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

        <div class="text">Mails</div>
        
        <a href="{{route('email.index')}}" class="btn btn-success">All</a>
        <a href="{{route('Lu')}}" class="btn btn-primary">Lu</a>
        <a href="{{route('NonLu')}}" class="btn btn-danger">Non Lu</a>
        
 
            
        
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Adresse Mail</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Message</th>
                </tr>
            </thead>


            <tbody>

                
                @foreach ($email as $item)
                @if ($item['lu']==0)
                
                <tr >
                    
                        
                    @else
                    <tr style="background-color: gray">  
                    
                    @endif 
                    <td>{{$item['id']}}</td>
                        <td>{{$item['email']}}</td>
                        <td>{{$item['name']}}</td>
                        <td>{{$item['message']}}</td>
                        
                        <td>
                            <div class="d-flex justify-content-around my-3">
                                
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="{{"#staticBackdrop".$item['id']}}">
                                    Lire
                                  </button>
                                <form action="{{ route('email.destroy', $item['id']) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger text-black" type="submit">Supprimer</button>
                                </form>
                            </div>
                        </td>
                    </tr>

                  <!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="">
    Launch static backdrop modal
  </button> --}}
  
  <!-- Modal -->
  <div class="modal" id="{{"staticBackdrop".$item['id']}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" style="height:35rem">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">{{ $item['name'] }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          {{ $item['message'] }}
        </div>
        <div class="modal-footer">
            <a class="btn btn-warning mx-2"  href="{{ route('email.show',$item['id']) }}" >Fermer</a>
          <button type="button" class="btn btn-primary">Understood</button>
        </div>
      </div>
    </div>
  </div>
                @endforeach
            </tbody>
        </table>
    </div>


    
    </section>
@endsection