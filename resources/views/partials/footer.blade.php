<footer class="footer-area bg-gray">
    <div class="footer-widget-area bg-3 pt-98 pb-90 fix">
        <div class="container">
            <div class="row">  
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single-footer-widget">
                        <a href="index.html"><img src="{{ asset("img/logo/".$footers->image) }}" alt="handstand"></a>
                        <p>{{ $footers->description }} </p>
                        <ul>
                            <li><i class="zmdi zmdi-email"></i> {{ $footers->email }}</li>
                            <li><i class="zmdi zmdi-phone"></i> {{ $footers->tel }}</li>
                            <li><i class="zmdi zmdi-home"></i>{{ $footers->adresse }}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single-footer-widget">
                        <h3>{{ $footers->tweets }}</h3>
                        <div class="single-twitt mb-10">
                            <div class="twitt-icon">
                                <i class="zmdi zmdi-twitter"></i>
                            </div>
                            <div class="twitt-content">
                                <p>{{ $footers->tweetcontenu1 }}</p>
                           <a href="https://twitter.com/login/">https://twitter.com/login</a>
                            </div>
                        </div>
                        <div class="single-twitt">
                            <div class="twitt-icon">
                                <i class="zmdi zmdi-twitter"></i>
                            </div>
                            <div class="twitt-content">
                                <p>{{ $footers->tweetcontenu2 }}</p>
                           <a href="https://twitter.com/login/">https://twitter.com/login</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 hidden-sm col-xs-12">
                    <div class="single-footer-widget">
                        <h3>{{ $footers->getintouch }}</h3>
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