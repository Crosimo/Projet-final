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
            <div class="col-md-4 col-sm-6 col-xs-12 mb-1">     
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
                    <div class="single-content" style="background-color:rgba(207, 0, 15, 0.95)">
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
            
           
        </div>
        <div class="row">
            
        </div>
    </div>
</section>







