

<section class="event-area pt-95 pb-100 bg-gray">
    @foreach ($events as $item)
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-xs-12">
                <div class="section-title text-center">
                    <h2>  
                           {!! $titres[6]->titre !!}
                        </h2>
                    <p>{{ $titres[6]->description }} </p>
                </div>
                <div class="event-wrapper">
                    <div class="event-content text-center">
                        <h3>{{ $item->titre }}</h3>
                        <p>{{ $item->description }} </p>
                        <h4>{{ $item->data }}</h4>
                        <h5>{{ $item->heure }}</h5>
                    </div>  
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div style="text-align: center; margin-top:1rem; background-color:none">
        {{ $events->links() }}
        
    </div>
</section>

