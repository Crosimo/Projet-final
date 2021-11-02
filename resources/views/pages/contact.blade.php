@extends('template/welcome')

@section('content')


    <!--[if lt IE 8]>
                <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
            <![endif]-->


    <!-- Header Area Start -->
    
    <!-- Header Area End -->
    <!-- Banner Area Start -->
    @include('partials.class.banner')
    <!-- Banner Area End -->
    <!-- Contact Area Start -->
    <div class="contact-area pt-95 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="contact-form section-title text-center">
                        <h2 class="pb-5">Contact Form</h2>
                        <div class="row">
                            <form id="contact-form" action="https://whizthemes.com/mail-php/other/mail.php">
                                <div class="col-sm-6">
                                    <input class="mb-30" placeholder="Name" name="con_name" type="text">
                                </div>
                                <div class="col-sm-6">
                                    <input class="mb-30" placeholder="Email" name="con_email" type="text">
                                </div>
                                <div class="col-sm-12">
                                    <textarea class="mb-30" cols="30" rows="7" name="con_message"
                                        placeholder="subject"></textarea>
                                    <button type="submit">submit</button>
                                    <p class="form-message"></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Area End -->
    <!-- Client Area Strat -->
    @include('partials.class.client')
    <!-- Client Area End -->
    <!-- Start of Map Area -->
    

    <!-- Newsletter Area End -->
    <!-- Footer Area Start -->
    
    <!-- Footer Area End -->

    <!-- All js here -->
@endsection
