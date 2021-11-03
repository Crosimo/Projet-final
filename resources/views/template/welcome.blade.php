<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Home Page || Handstand</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
    <!-- All css here -->
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/shortcode/shortcodes.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

    <script src="{{ asset('js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>

<body>
    {{-- <script>
        alert('Voici le code coupon de cette semaine pour avoir 10% de réduction dans les packages : coachmolengeek19');
    </script> --}}
    @include('partials.header')
    @yield('content')
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
    <script src="{{ asset('js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/jquery.meanmenu.js') }}"></script>
    <script src="{{ asset('js/ajax-mail.js') }}"></script>
    <script src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script src="{{ asset('js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.js') }}"></script>
    <script src="{{ asset('js/plugins.js') }}"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSLSFRa0DyBj9VGzT7GM6SFbSMcG0YNBM"></script>
    <script>
        function initialize() {
            // var mapOptions = {
            //     zoom: 15,
            //     scrollwheel: false,
            //     center: new google.maps.LatLng(23.763494, 90.432226)
            // };

            //Leaflet



            var getLocation = function(address) {
                var geocoder = new google.maps.Geocoder();
                geocoder.geocode({
                    'address': address, 'region' : 'be'
                }, function(results, status) {
                    console.log(status);
                    if (status == google.maps.GeocoderStatus.OK) {
                        var latitude = results[0].geometry.location.lat();
                        var longitude = results[0].geometry.location.lng();
                        




                        var map = L.map('map').setView([latitude, longitude], 13);

                        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                        }).addTo(map);

                        L.marker([51.5, -0.09]).addTo(map)
                            .bindPopup('A pretty CSS3 popup.<br> Easily customizable.')
                            .openPopup();

                    }
                });
            }

            //Call the function with address as parameter
            getLocation('2 Lincoln Memorial Circle NW');


            // var map = new google.maps.Map(document.getElementById('googleMap'),
            //     mapOptions);


            // var marker = new google.maps.Marker({
            //     position: map.getCenter(),
            //     animation: google.maps.Animation.BOUNCE,
            //     icon: '{{ asset('img/map-marker.png') }}',
            //     map: map
            // });

        }

        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    <script src="{{ asset('js/main.js') }}"></script>
    @include('partials.map')
    @include('partials.newsletter')
    @include('partials.footer')
</body>

</html>
