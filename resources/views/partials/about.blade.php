<section class="about-area pt-95 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="about-content">
                     <h2>
                         
                        
                        {!! ($titres[1])->titre !!}
                         
                         
                    </h2>
                     <p class="m-0">{{ $titres[1]->description }}</p>
                     <p>{{ $abouts->content }} </p>
                     <a class="banner-btn" href="about-us.html" data-text="read more"><span>read more</span></a>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="about-video active">
                     <div class="game">
                         <a href="#"><img style="width:550px; height:322px"src="{{ asset('img/about/'.$abouts->image) }}" alt="about"></a>
                     </div> 
                     <div class="video-icon video-hover">
                         <a class="video-popup" href="{{ $abouts->vidéo }}">
                             <i class="{{ $abouts->logo }}"></i>
                         </a>
                     </div>
                </div>
            </div>
        </div>
    </div>
 </section>