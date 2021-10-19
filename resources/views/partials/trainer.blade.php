<div class="trainer-area pt-90 pb-100 bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-xs-12">
                <div class="section-title text-center">
                    <h2> 
                        {!! $titres[4]->titre !!} 
                    </h2>
                    <p>{{ $titres[4]->description }}</p>
                </div>
            </div>
            @foreach ($trainers as $item)
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="single-trainer text-center">
                    <img src="{{ asset('img/trainer/'.$item->image) }}" alt="trainer">
                    <div class="trainer-hover">
                        <h3>{{ $item->nom }}</h3>
                        <ul>
                            <li><a href=" https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>  
                            <li><a href="https://twitter.com3/"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="https://dribbble.com/"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="https://www.pinterest.com/"><i class="fa fa-pinterest"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div> 
            @endforeach
        </div>
    </div>
</div>