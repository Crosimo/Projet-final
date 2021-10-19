<section class="client-area pt-95 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-xs-12">
                <div class="section-title text-center">
                    <h2>{!! ($titres[8])->titre !!}</h2>
                    <p>{{ $titres[8]->description}} </p>
                </div>
            </div>
        </div>
        <div class="row"> 
            <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="testimonial-owl">
                        @foreach ($clients as $item)
                        <div class="col-xs-12">
                            <div class="single-testimonial">
                                <i class="{{ $item->logo }}"></i>
                                <p>{{ $item->description }} </p>
                                <img src="{{ asset($item->image) }}" alt="signature">
                                <h6>{{ $item->titre }}</h6>
                            </div>    
                        </div> 
                        @endforeach   
                    </div> 
                </div>   
            </div>
        </div>
    </div>
</section>