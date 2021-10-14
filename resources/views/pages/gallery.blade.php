@extends('template/welcome')

@section('content')

        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
        
		<!-- Header Area Start -->
		<header class="top">
			<div class="header-area ptb-18 header-sticky">
				<div class="container">
					<div class="row">
						<div class="col-md-2 col-xs-12">
							<div class="logo">
								<a href="index.html"><img src="img/logo/logo.png" alt="COFFEE" /></a>
							</div>
						</div>
						<div class="col-md-8 col-xs-12">
                            <div class="content-wrapper">
                                <!-- Main Menu Start -->
                                <div class="main-menu text-center">
                                    <nav>
                                        <ul>
                                            <li><a href="index.html">Home</a></li>
                                            <li><a href="about-us.html">About us</a></li>
                                            <li><a href="class.html">classes</a></li>
                                            <li><a href="gallery.html">gallery</a></li>
                                            <li><a href="blog.html">blog</a></li>
                                            <li><a href="contact.html">Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="mobile-menu hidden-lg hidden-md"></div>
                                <!-- Main Menu End -->
                            </div>
						</div>
						<div class="col-md-2 hidden-sm hidden-xs">
						    <div class="header-contact text-right">
						        <a class="banner-btn" data-text="contact" href="contact.html"><span>contact</span></a>
						    </div>
						</div>
					</div>
				</div>
			</div>
		</header>
		<!-- Header Area End -->
		<!-- Banner Area Start -->
		<section class="banner-area text-left">	
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="banner-content-wrapper">
                            <div class="banner-content">
                                <h2>gallery</h2>
                                <div class="banner-breadcrumb">
                                    <ul>
                                        <li><a href="index.html">home </a> <i class="zmdi zmdi-chevron-right"></i></li>
                                        <li>gallery</li>
                                    </ul>
                                </div>
                            </div>  
                        </div> 
                    </div>
                </div>
            </div>
		</section>
		<!-- Banner Area End -->
        <!-- Gallery Area Start -->
        <section class="gallery-area pt-95 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-xs-12">
                        <div class="test-content">
                            <div class="section-title text-center">
                                <h2>our gallery</h2>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum issss has been the industry's standard dummy text ever since the 1500s, when an unknown lorem </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="grid" style="position: relative; height: 390px;">
                        <div class="col-md-4 col-sm-4 col-xs-12 grid-item cat1 cat3" style="position: absolute; left: 0%; top: 0px;">
                            <div class="portfolio-img single-img">
                                <img src="img/portfolio/gal.jpg" alt="project">
                                <div class="gallery-icon">
                                    <a class="image-popup" href="img/portfolio/gal.jpg">
                                        <i class="zmdi zmdi-zoom-in"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 grid-item cat2 cat4" style="position: absolute; left: 25%; top: 0px;">
                            <div class="portfolio-img single-img">
                                <img src="img/portfolio/gal2.jpg" alt="project">
                                <div class="gallery-icon">
                                    <a class="image-popup" href="img/portfolio/gal2.jpg">
                                        <i class="zmdi zmdi-zoom-in"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 grid-item cat1 cat4" style="position: absolute; left: 50%; top: 0px;">
                            <div class="portfolio-img single-img">
                                <img src="img/portfolio/gal3.jpg" alt="project">
                                <div class="gallery-icon">
                                    <a class="image-popup" href="img/portfolio/gal3.jpg">
                                        <i class="zmdi zmdi-zoom-in"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 grid-item cat2" style="position: absolute; left: 75%; top: 0px;">
                            <div class="portfolio-img single-img">
                                <img src="img/portfolio/gal4.jpg" alt="project">
                                <div class="gallery-icon">
                                    <a class="image-popup" href="img/portfolio/gal4.jpg">
                                        <i class="zmdi zmdi-zoom-in"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 grid-item cat2 cat3" style="position: absolute; left: 25%; top: 210px;">
                            <div class="portfolio-img single-img">
                                <img src="img/portfolio/gal5.jpg" alt="project">
                               <div class="gallery-icon">
                                    <a class="image-popup" href="img/portfolio/gal5.jpg">
                                        <i class="zmdi zmdi-zoom-in"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 grid-item cat1 cat3" style="position: absolute; left: 50%; top: 210px;">
                            <div class="portfolio-img single-img">
                                <img src="img/portfolio/gal6.jpg" alt="project">
                                <div class="gallery-icon">
                                    <a class="image-popup" href="img/portfolio/gal6.jpg">
                                        <i class="zmdi zmdi-zoom-in"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 grid-item cat1 cat3" style="position: absolute; left: 50%; top: 210px;">
                            <div class="portfolio-img single-img">
                                <img src="img/portfolio/gal7.jpg" alt="project">
                                <div class="gallery-icon">
                                    <a class="image-popup" href="img/portfolio/gal7.jpg">
                                        <i class="zmdi zmdi-zoom-in"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 grid-item cat1 cat3" style="position: absolute; left: 50%; top: 210px;">
                            <div class="portfolio-img single-img">
                                <img src="img/portfolio/gal8.jpg" alt="project">
                                <div class="gallery-icon">
                                    <a class="image-popup" href="img/portfolio/gal8.jpg">
                                        <i class="zmdi zmdi-zoom-in"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 grid-item cat1 cat3" style="position: absolute; left: 50%; top: 210px;">
                            <div class="portfolio-img single-img">
                                <img src="img/portfolio/gal9.jpg" alt="project">
                                <div class="gallery-icon">
                                    <a class="image-popup" href="img/portfolio/gal9.jpg">
                                        <i class="zmdi zmdi-zoom-in"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>    
        <!-- Gallery Area End -->
        <!-- Client Area Strat -->
        <section class="client-area pb-50">
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
        <div class="map-area">
            <!-- google-map-area start -->
            <div class="google-map-area">
                <!--  Map Section -->
                <div id="contacts" class="map-area">
                    <div id="googleMap" style="width:100%;height:380px;"></div>
                </div>
            </div>
        </div>
        <!-- End of Map Area -->
        <!-- Newsletter Area Start -->
        <section class="newsletter-area bg-gray">
            <div class="container">
                <div class="row">
                    <div class="newsletter-wrapper fix">
                        <div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
                            <div class="newsletter-content section-title text-center">
                                <h2>subscribe now for latest update!</h2> 
                                <div class="newsletter-form">
                                    <form action="#" id="mc-form" class="mc-form fix">
                                        <input id="mc-email" type="email" name="email" placeholder="Enter Your E-mail ID">
                                        <button id="mc-submit" type="submit" class="default-btn" data-text="submit"><span>submit</span></button> 
                                    </form>
                                    <!-- mailchimp-alerts Start -->
                                    <div class="mailchimp-alerts">
                                        <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                                        <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                                        <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                                    </div>
                                    <!-- mailchimp-alerts end -->
                                </div>
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
        </section>
        <!-- Newsletter Area End -->
        <!-- Footer Area Start -->
        <footer class="footer-area bg-gray">
            <div class="footer-widget-area bg-3 pt-98 pb-90 fix">
                <div class="container">
                    <div class="row">  
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="single-footer-widget">
                                <a href="index.html"><img src="img/logo/logo.png" alt="handstand"></a>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur a convallis nulla. Ut </p>
                                <ul>
                                    <li><i class="zmdi zmdi-email"></i> username@gmail.com</li>
                                    <li><i class="zmdi zmdi-phone"></i> (+660 256 24857)</li>
                                    <li><i class="zmdi zmdi-home"></i> Your Address Here</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="single-footer-widget">
                                <h3>Recent Tweets</h3>
                                <div class="single-twitt mb-10">
                                    <div class="twitt-icon">
                                        <i class="zmdi zmdi-twitter"></i>
                                    </div>
                                    <div class="twitt-content">
                                        <p>@envato good News for today!! We got  2 psd templete weekly top selling quality template in technology category !!!</p>
                                   <a href="https://twitter.com/login/">https://twitter.com/login</a>
                                    </div>
                                </div>
                                <div class="single-twitt">
                                    <div class="twitt-icon">
                                        <i class="zmdi zmdi-twitter"></i>
                                    </div>
                                    <div class="twitt-content">
                                        <p>@envato good News for today!! We got  2 psd templete weekly top selling quality template in technology category !!!</p>
                                   <a href="https://twitter.com/login/">https://twitter.com/login</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 hidden-sm col-xs-12">
                            <div class="single-footer-widget">
                                <h3>get in touch</h3>
                                <form id="subscribe-form" action="https://whizthemes.com/mail-php/other/mail.php">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <input type="text" placeholder="Name" name="con_name">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" placeholder="Email" name="con_email">
                                        </div>
                                        <div class="col-sm-12">
                                            <textarea cols="30" rows="7" name="con_message" placeholder="subject"></textarea>
                                            <button type="submit">submit</button>
                                            <p class="subscribe-message"></p>
                                        </div>
                                    </div>
                                </form>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-text-area fix bg-coffee ptb-18">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="footer-text text-center">
                                <span>Copyright &copy; <a href="#">Hastech</a> 2017. All Rights Reserved.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer Area End -->
       
		<!-- All js here -->
       
@endsection   