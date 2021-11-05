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
                    <img style="height: 345px; width: 370px" src="{{ asset('img/trainer/'.$item['image']) }}" alt="trainer">
                    <div class="trainer-hover">
                        <h3>{{ $item['nom'] }}</h3>
                        <ul>
                            <li><a href="{{ $item['facebookLien'] }}"><i class="{{ $item['facebook'] }}"></i></a></li>  
                            <li><a href="{{ $item['twitterLien'] }}"><i class="{{ $item['twitter'] }}"></i></a></li>
                            <li><a href="{{ $item['instagramLien'] }}"><i class="{{ $item['instagram'] }}"></i></a></li>
                            <li><a href="{{ $item['pinterestLien'] }}"><i class="{{ $item['pinterest'] }}"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div> 
            @endforeach
        </div>
    </div>
</div>