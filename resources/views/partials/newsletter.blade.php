<section class="newsletter-area bg-gray">
    <div class="container">
        <div class="row">
            <div class="newsletter-wrapper fix">
                <div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
                    <div class="newsletter-content section-title text-center">
                        <h2>subscribe now for latest update!</h2> 
                        <div class="newsletter-form">
                            <form action="{{ route('sendMail') }}" id="mc-form" class="mc-form fix" method="POST">
                                @csrf
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