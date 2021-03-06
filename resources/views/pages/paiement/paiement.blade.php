<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <style>
        .card0 {
            margin: 40px 12px 15px 12px;
            border: 0
        }

        .card1 {
            margin: 0;
            padding: 15px;
            padding-top: 25px;
            padding-bottom: 0px;
            background: #263238;
            height: 100%
        }

        .bill-head {
            color: #ffffff;
            font-weight: bold;
            margin-bottom: 0px;
            margin-top: 0px;
            font-size: 30px
        }

        .line {
            border-right: 1px grey solid
        }

        .bill-date {
            color: #BDBDBD
        }

        .red-bg {
            margin-top: 25px;
            margin-left: 0px;
            margin-right: 0px;
            background-color: #F44336;
            padding-left: 20px !important;
            padding: 25px 10px 25px 15px
        }

        #total {
            margin-top: 0px;
            padding-left: 7px
        }

        #total-label {
            margin-bottom: 0px;
            color: #ffffff;
            padding-left: 7px
        }

        #heading1 {
            color: #ffffff;
            font-size: 20px;
            padding-left: 10px
        }

        #heading2 {
            font-size: 27px;
            color: #D50000
        }

        .placeicon {
            font-family: fontawesome !important
        }

        .card2 {
            padding: 25px;
            margin: 0;
            height: 100%
        }

        .form-card .pay {
            font-weight: bold
        }

        .form-card input,
        .form-card textarea {
            padding: 10px 8px 10px 8px;
            border: none;
            border: 1px solid lightgrey;
            border-radius: 0px;
            margin-bottom: 25px;
            margin-top: 2px;
            width: 100%;
            box-sizing: border-box;
            font-family: montserrat;
            color: #2C3E50;
            font-size: 14px;
            letter-spacing: 1px
        }

        .form-card input:focus,
        .form-card textarea:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            border: none;
            font-weight: bold;
            border: 1px solid gray;
            outline-width: 0
        }

        .btn-info {
            color: #ffffff !important
        }

        .radio-group {
            position: relative;
            margin-bottom: 25px
        }

        .radio {
            display: inline-block;
            width: 204;
            height: 64;
            border-radius: 0;
            background: lightblue;
            box-sizing: border-box;
            border: 2px solid lightgrey;
            cursor: pointer;
            margin: 8px 25px 8px 0px
        }

        .radio:hover {
            box-shadow: 0px 0px 0px 1px rgba(0, 0, 0, 0.2)
        }

        .radio.selected {
            box-shadow: 0px 0px 0px 1px rgba(0, 0, 0, 0.4)
        }

        .fit-image {
            width: 100%;
            object-fit: cover
        }

    </style>
    <div class="container-fluid" style="background-color: #5FC7AE">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-11">
                <div class="card card0 rounded-0">
                    <div class="row">
                        <div class="col-md-5 d-md-block d-none p-0 box">
                            <div class="card rounded-0 border-0 card1" id="bill">
                                <h3 id="heading1">Payment Summary</h3>
                                <div class="row" style="height: 100%">
                                    <div class="col-lg-7 col-8 mt-4 line pl-4">
                                        <h2 class="bill-head ">{{ $pricing->packageTitle }}</h2> <small
                                            class="bill-date">{{ $date }}</small>
                                    </div>
                                    <div class="col-lg-5 col-4 mt-4">
                                        <h2 class="bill-head px-xl-5 px-lg-4">HND</h2>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 red-bg">
                                        <p class="bill-date" id="total-label">Total Price</p>
                                        Code de r??duction: <input class="bill-date myRed" onchange="myFunction()" id="total-label "
                                            type="text">
                                        <h2 class="bill-head prix" id="total">{{ $pricing->packagePrice }}</h2> <small
                                            class="bill-date" id="total-label">Price includes all taxes</small>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-12 p-0 box">
                            <div class="card rounded-0 border-0 card2" id="paypage">
                                <div class="form-card">
                                    <h2 id="heading2" class="text-danger">Payment Method</h2>
                                    <div class="radio-group">
                                        <div class='radio' data-value="credit"><img
                                                src="{{ asset('img/paiement/logo-visa.png') }}" width="220px"
                                                height="120px"></div>
                                        <div class='radio' data-value="paypal"><img
                                                src="{{ asset('img/paiement/MasterCard.png') }}" width="220px"
                                                height="120px"></div> <br>
                                    </div> <label class="pay">Name on Card</label> <input type="text"
                                        name="holdername" placeholder="John Smith">
                                    <div class="row">
                                        <div class="col-8 col-md-6"> <label class="pay">Card Number</label>
                                            <input type="text" name="cardno" id="cr_no"
                                                placeholder="0000-0000-0000-0000" minlength="19" maxlength="19"> </div>
                                        <div class="col-4 col-md-6"> <label class="pay">CVV</label> <input
                                                type="password" name="cvcpwd" placeholder="&#9679;&#9679;&#9679;"
                                                class="placeicon" minlength="3" maxlength="3"> </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12"> <label class="pay">Expiration
                                                Date</label> </div>
                                        <div class="col-md-12"> <input type="text" name="exp" id="exp"
                                                placeholder="MM/YY" minlength="5" maxlength="5"> </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6"> 
                                        <form action="{{ route('paiementEffectu??', $pricing->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                        <button type="submit" class="btn btn-info">Make
                                            Paiement</button>
                                        </form> 
                                             </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function myFunction() {
            var foo = '<?php echo $pricing->packagePrice; ?>';
            foo = parseInt(foo.slice(1, 3));

            if (document.getElementsByClassName("myRed")[0].value == "codingweek19") {

                var x =

                    document.getElementsByClassName("prix")[0].innerHTML = foo - ((foo / 100) * 10);
            }
        }
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
