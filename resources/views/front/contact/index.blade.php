@extends('front.layouts.main')

@section('css')
    
@endsection

@section('body')

<!-- ================ contact section start ================= -->
<section class="contact-section section_padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="contact-title">Liên hệ</h2>
            </div>
            <div class="col-lg-8">
                <div class="d-none d-sm-block mb-5 pb-4">
                    <div id="map" style="height: 480px;"></div>
                    <script>
                        function initMap() {
                        var uluru = {lat: -25.363, lng: 131.044};
                        var grayStyles = [
                            {
                            featureType: "all",
                            stylers: [
                                { saturation: -90 },
                                { lightness: 50 }
                            ]
                            },
                            {elementType: 'labels.text.fill', stylers: [{color: '#ccdee9'}]}
                        ];
                        var map = new google.maps.Map(document.getElementById('map'), {
                            center: {lat: -31.197, lng: 150.744},
                            zoom: 9,
                            styles: grayStyles,
                            scrollwheel:  false
                        });
                        }
                        
                    </script>
                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpfS1oRGreGSBU5HHjMmQ3o5NLw7VdJ6I&callback=initMap"></script>
                    
                </div>
            </div>
            <div class="col-lg-4">
                <div class="media contact-info">
                <span class="contact-info__icon"><i class="ti-home"></i></span>
                <div class="media-body">
                    <h3>Buttonwood, California.</h3>
                    <p>Rosemead, CA 91770</p>
                </div>
                </div>
                <div class="media contact-info">
                <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                <div class="media-body">
                    <h3>00 (440) 9865 562</h3>
                    <p>Mon to Fri 9am to 6pm</p>
                </div>
                </div>
                <div class="media contact-info">
                <span class="contact-info__icon"><i class="ti-email"></i></span>
                <div class="media-body">
                    <h3>support@colorlib.com</h3>
                    <p>Send us your query anytime!</p>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ================ contact section end ================= -->

@endsection

@section('script')
    
@endsection