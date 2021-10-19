<div class="slider-area">	
    <div class="slider-wrapper">
        @foreach ($sliders as $item)  
        <div class="single-slide" style="background-image: url({{ asset('img/slider/'.$item["image"]) }});">
            <div class="slider-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 col-md-7 col-sm-12 col-md-12">
                            <div class="text-content-wrapper">
                                <div class="text-content text-left">
                                     
                                    <h5>  
                                       {!! $titres[0]->titre !!}
                                    </h5>
                                    <h1>{{ $titres[0]->description }}</h1> 
                                    <p>{{ $item['description'] }}</p>
                                    <a class="banner-btn" href="gallery.html" data-text="read more"><span>{{$item['button'] }}</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
       
        @endforeach
    </div>
</div>