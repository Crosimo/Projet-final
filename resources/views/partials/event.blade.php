<section class="event-area pt-95 pb-100 bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-xs-12">
                <div class="section-title text-center">
                    <h2>{{ $titres[6]->titre }} <span class="span"></span></h2>
                    <p>{{ $titres[6]->description }} </p>
                </div>
                <div class="event-wrapper">
                    <div class="event-content text-center">
                        <h3>{{ $events->titre }}</h3>
                        <p>{{ $events->description }} </p>
                        <h4>{{ $events->data }}</h4>
                        <h5>{{ $events->heure }}</h5>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</section>