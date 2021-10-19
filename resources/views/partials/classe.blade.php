<section class="class-area fix bg-gray pb-100 pt-95">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-xs-12">
                <div class="section-title text-center">
                    <h2>  
                        {!! ($titres[2])->titre !!}
                    <p> {{ $titres[2]->description }} </p>
                </div>  
            </div>
        </div>
        <div class="row"> 
            
            @foreach ($classes as $item)
            <div class="col-md-4 col-sm-6 col-xs-12">     
                <div class="single-class">
                    <div class="single-img">
                        <a href="class.html"><img src="{{ asset('img/class/'.$item->image) }}" alt="class"></a>
                        <div class="gallery-icon">
                            <a class="image-popup" href="{{ asset('img/class/'.$item->image) }}">
                                <i class="zmdi zmdi-zoom-in"></i>
                            </a>   
                        </div>
                    </div>
                    <div class="single-content">
                        <h3><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="{{"#staticBackdrop".$item->id}}">
                            {{ $item->nom }}
                          </button></h3>
                        <ul>
                            <li><i class="zmdi zmdi-face"></i>{{ $item->instructeur }}</li>
                            <li><i class="zmdi zmdi-alarm"></i>{{ $item->heure }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            


            
            
            {{-- -----Modal------ --}}

           

            <div class="modal" id="{{"staticBackdrop".$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="top:15% !important">
                <div class="modal-dialog text-center" style="max-width:35% !important; height: 50rem !important;">
                  <div class="modal-content h-100" >  
                    <div class="single-class">
                        <div class="single-img">
                            <a href="class.html"><img class="w-100" src="{{ asset('img/class/'.$item->image) }}" alt="class"></a>
                            <div class="gallery-icon">
                                <a class="image-popup" href="{{ asset('img/class/'.$item->image) }}">
                                    <i class="zmdi zmdi-zoom-in"></i>
                                </a>   
                            </div>
                        </div>
                        <div class="single-content">
                        <h3>{{ $item->nom }}</h3>
                        <h2>Catégorie: {{ $item->categorie->nom }}</h2>
                            <ul>
                                <li><i class="zmdi zmdi-face"></i>{{ $item->instructeur }}</li>
                                <li><i class="zmdi zmdi-alarm"></i>{{ $item->heure }}</li>  
                            </ul>
                            <ul>
                                @foreach ($item->tags as $tag)
                                <li><i class="zmdi zmdi-alarm"></i>{{ $tag->nom }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Understood</button>
                        </div>
                    </div>
                   
                  </div>
                </div>
              </div>
{{-- -------Modal---------- --}}
           
            @endforeach
              
              <!-- Modal -->
              





        <div class="row">
            <div class="col-xs-12 text-center">
                <a class="banner-btn mt-55" href="class.html" data-text="view all classes"><span>view all classes</span></a>
            </div>
        </div>
    </div>
</section>

