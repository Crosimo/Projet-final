<section class="class-area fix bg-gray pb-100 pt-95">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-xs-12">
                <div class="section-title text-center">
                    <h2>{!! ($titres[2])->titre !!}</h2>
                    <p> {{ $titres[2]->description }}</p>
                </div>  
            </div>
        </div>
        <div class="row"> 
            
            @foreach ($classes as $item)
            
            
            {{-- width="407" style="height: 207px" --}}
            <div class="col-md-4 col-sm-6 col-xs-12">     
                <div class="single-class">
                    <div class="single-img">
                        <a href="class.html"><img   src="{{ asset('img/classe/'.$item->image) }}" alt="class"></a>
                        <div class="gallery-icon">
                            <a class="image-popup" href="{{ asset('img/classe/'.$item->image) }}">
                                <i class="zmdi zmdi-zoom-in"></i>
                            </a>   
                        </div>
                    </div>
                    @if ($item->prioritaire == true)
                    <div class="single-content" style="background-color:green"> 
                    @elseif($item->places-(count($item->users)) == 0) 
                    <div class="single-content" style="background-color:grey">
                    @elseif($item->places -(count($item->users)) <= 3 ) 
                    <div class="single-content" style="background-color:red">
                    @elseif($item->places -(count($item->users)) <=5)
                    <div class="single-content" style="background-color:orange">
                    @else
                    <div class="single-content">
                    @endif
                        <h3><a href="{{ route('classe.shower', $item->id) }}">{{ $item->nom }}</a></h3>
                        <ul>
                            <li><i class="zmdi zmdi-face"></i>{{ $item->trainer->nom }}</li>
                            <li><i class="zmdi zmdi-alarm"></i>{{ substr($item->heureDébut,11, 2) }}-{{ substr($item->heureFin,11, 2) }}A.M.</li>
                        </ul>
                    </div>
                    
                </div>
            </div>
            
            @endforeach
            
            {{-- <div class="col-md-4 col-sm-6 col-xs-12">     
                <div class="single-class">
                    <div class="single-img">
                        <a href="class.html"><img src="img/class/2.jpg" alt="class"></a>
                        <div class="gallery-icon">
                            <a class="image-popup" href="img/class/2.jpg">
                                <i class="zmdi zmdi-zoom-in"></i>
                            </a>   
                        </div>
                    </div>
                    <div class="single-content">
                        <h3><a href="class.html">yoga for climbers</a></h3>
                        <ul>
                            <li><i class="zmdi zmdi-face"></i>Sathi Bhuiyan</li>
                            <li><i class="zmdi zmdi-alarm"></i>10.00Am-05:00Pm</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4 hidden-sm col-xs-12">     
                <div class="single-class">
                    <div class="single-img">
                        <a href="class.html"><img src="img/class/3.jpg" alt="class"></a>
                        <div class="gallery-icon">
                            <a class="image-popup" href="img/class/3.jpg">
                                <i class="zmdi zmdi-zoom-in"></i>
                            </a>   
                        </div>
                    </div>
                    <div class="single-content">
                        <h3><a href="class.html">yoga for climbers</a></h3>
                        <ul>
                            <li><i class="zmdi zmdi-face"></i>Sathi Bhuiyan</li>
                            <li><i class="zmdi zmdi-alarm"></i>10.00Am-05:00Pm</li>
                        </ul>
                    </div>
                </div>
            </div>  --}}
        </div>
        <div class="row">
            {{-- <div class="col-xs-12 text-center">
                <a class="banner-btn mt-55" href="class.html" data-text="view all classes"><span>view all classes</span></a>
            </div> --}}
        </div>
    </div>
</section>






{{-- -----Version foireuse précédente------- --}}

{{-- 

<section class="class-area fix bg-gray pb-100 pt-95">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-xs-12">
                <div class="section-title text-center">
                    <h2>  
                        
                    <p>  </p>
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
                   
                   
                    @if ($item->prioritaire == true)
                    <div class="single-content" style="background-color:green"> 
                    @elseif((count($item->users)) <= 3 ) 
                    <div class="single-content" style="background-color:orange">
                    @elseif((count($item->users)) <= 5 ) 
                    <div class="single-content" style="background-color:red">
                    @elseif((count($item->users)) <= 0)
                    <div class="single-content" style="background-color:grey">
                    @else
                    <div class="single-content">
                    @endif
                        <h3><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="{{"#staticBackdrop".$item->id}}">
                            {{ $item->nom }}
                          </button></h3>
                        <ul>
                            <li><i class="zmdi zmdi-face"></i>{{ $item->trainer->nom }}</li>
                            <li><i class="zmdi zmdi-alarm"></i>{{ $item->heureDébut }}</li>
                        </ul>
                    </div>
                </div>
            </div>


           

            <div class="modal" id="{{"staticBackdrop".$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" style=" !important">
                <div class="modal-dialog text-center" style="max-width:35% !important; height: 50rem !important;">
                  <div class="modal-content h-100" >  
                    <div class="single-class">
                        <div class="single-img">
                            
                            </div>
                        </div>
                        <div class="single-content">
                        <h3>{{ $item->nom }}</h3>
                        <h2>Catégorie: {{ $item->categorie->nom }}</h2>
                            <ul>
                                <li><i class="zmdi zmdi-face"></i>{{ $item->trainer->nom }}</li>
                                <li><i class="zmdi zmdi-alarm"></i>{{ $item->heure }}</li>  
                            </ul>
                            <ul>
                                @foreach ($item->tags as $tag)
                                <li><i class="zmdi zmdi-alarm"></i>{{ $tag->nom }}</li>
                                @endforeach
                            </ul>
                            
                            @auth
                            <a href="{{ route('inscription', $item->id) }}">S'inscrire</a>
                            @else
                            <a href="{{ route('login') }}">S'inscrire</a>
                            @endauth
                           
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Understood</button>
                        </div>
                    </div>
                   
                  </div>
                </div>
              </div>

           
            @endforeach
              
        <div class="row">
            <div class="col-xs-12 text-center">
                <a class="banner-btn mt-55" href="class.html" data-text="view all classes"><span>view all classes</span></a>
            </div>
        </div>
    </div>
</section>

{{-- <script>

    // Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script> --}}