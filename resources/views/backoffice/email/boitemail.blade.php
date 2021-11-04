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
                    <tr style="background-color: gray; color:white">  
                    
                    @endif 
                    <td>{{$item['id']}}</td>
                        <td>{{$item['email']}}</td>
                        <td>{{$item['name']}}</td>
                        <td>{{$item['message']}}</td>
                        <td>
                            <div class=" flex justify-content-around my-3" >
                                
                                <button type="button" class="btn btn-primary mr-2" data-bs-toggle="modal" id="myBtna" >
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

                    
              
              
              
                  
              
                  <div id="myModal" class="modal">
              
                      <!-- Modal content -->
                      <div class="modal-content">
                          <span class="close">&times;</span>
                          <section class="event-area pt-35 pb-50">
                              <div class="container">
                                  <div class="row">
                                      <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-xs-12" style="display: flex; align-items:center; flex-direction:column">
                                          <div class="section-title text-center mb-2">
                                              <h2>
                                                {{ $item['name'] }}
                                              </h2>
                                              
                                          </div>
                                          Message : <div class="p-2" style="border: 4px solid #5FC7AE; width: 100%; min-height: 5rem; margin-top: 1rem;">
                                            {{ $item['message'] }}
                                          </div>
                                          <a class="btn btn-warning mx-2 mt-2"  href="{{ route('email.show',$item['id']) }}" >Fermer</a>
                                      </div>
                                      
                                  </div>
                              </div>
                          </section>
                      </div>

                  </div>
  
  
                @endforeach
            </tbody>
        </table>
    </div>


    
    </section>
@endsection