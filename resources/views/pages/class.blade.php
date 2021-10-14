@extends('template/welcome')
@section('content')
    

        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
        
		<!-- Header Area Start -->
		
		<!-- Header Area End -->
		<!-- Banner Area Start -->
		@include('partials.banner')
		<!-- Banner Area End -->
        <!-- Classes Start -->
        @include('partials.class.class')
        <!-- Class Area End -->
        <!-- Schedule Area Strat -->
        @include('partials.class.schedule')
        <!-- Schedule Area End -->
        <!-- Pricing Area Start -->
        
        <!-- Pricing Area End -->
        <!-- Client Area Strat -->
        <section class="client-area pt-95 pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-xs-12">
                        <div class="section-title text-center">
                            <h2>gift our client say</h2>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum issss has been the industry's standard dummy text ever since the 1500s, when an unknown lorem </p>
                        </div>
                    </div>
                </div>
                <div class="row"> 
                    <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="testimonial-owl">
                                <div class="col-xs-12">
                                    <div class="single-testimonial">
                                        <i class="zmdi zmdi-quote"></i>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla non mi just. Aliquam vitae purus vel odio suscipit lobortis. Donec interdum finibus egestas. In eleifend ipsum eu lacinia congue. Vestibulum sodales, sapien aliquam </p>
                                        <img src="img/icon/signature.png" alt="signature">
                                        <h6>Co-Founder Of Company</h6>
                                    </div>    
                                </div> 
                                <div class="col-xs-12">
                                    <div class="single-testimonial">
                                        <i class="zmdi zmdi-quote"></i>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla non mi just. Aliquam vitae purus vel odio suscipit lobortis. Donec interdum finibus egestas. In eleifend ipsum eu lacinia congue. Vestibulum sodales, sapien aliquam </p>
                                        <img src="img/icon/signature.png" alt="signature">
                                        <h6>Co-Founder Of Company</h6>
                                    </div>    
                                </div> 
                                <div class="col-xs-12">
                                    <div class="single-testimonial">
                                        <i class="zmdi zmdi-quote"></i>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla non mi just. Aliquam vitae purus vel odio suscipit lobortis. Donec interdum finibus egestas. In eleifend ipsum eu lacinia congue. Vestibulum sodales, sapien aliquam </p>
                                        <img src="img/icon/signature.png" alt="signature">
                                        <h6>Co-Founder Of Company</h6>
                                    </div>    
                                </div> 
                                <div class="col-xs-12">
                                    <div class="single-testimonial">
                                        <i class="zmdi zmdi-quote"></i>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla non mi just. Aliquam vitae purus vel odio suscipit lobortis. Donec interdum finibus egestas. In eleifend ipsum eu lacinia congue. Vestibulum sodales, sapien aliquam </p>
                                        <img src="img/icon/signature.png" alt="signature">
                                        <h6>Co-Founder Of Company</h6>
                                    </div>    
                                </div> 
                                <div class="col-xs-12">
                                    <div class="single-testimonial">
                                        <i class="zmdi zmdi-quote"></i>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla non mi just. Aliquam vitae purus vel odio suscipit lobortis. Donec interdum finibus egestas. In eleifend ipsum eu lacinia congue. Vestibulum sodales, sapien aliquam </p>
                                        <img src="img/icon/signature.png" alt="signature">
                                        <h6>Co-Founder Of Company</h6>
                                    </div>    
                                </div>  
                            </div> 
                        </div>   
                    </div>
                </div>
            </div>
        </section>
        <!-- Client Area End -->
        <!-- Start of Map Area -->
        
        <!-- Footer Area End -->
       
		@endsection