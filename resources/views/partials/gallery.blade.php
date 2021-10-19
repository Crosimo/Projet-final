<section class="gallery-area pt-90 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-xs-12">
                <div class="test-content">
                    <div class="section-title text-center">
                        <h2>
                            
                           {!! $titres[5]->titre !!}
                        </h2>
                        <p>{{ $titres[5]->description }} </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="grid" style="position: relative; height: 390px;">
                @foreach ($gallerys as $item)
                <div class="col-md-4 col-sm-4 col-xs-12 grid-item cat1 cat3" style="position: absolute; left: 0%; top: 0px;">
                    <div class="portfolio-img single-img" >
                        <img   src="{{ asset('img/portfolio/'.$item->image) }}" alt="project">
                        <div class="gallery-icon">
                            <a class="image-popup" href="{{ asset('img/portfolio/'.$item->image) }}">
                                <i class="zmdi zmdi-zoom-in"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>    