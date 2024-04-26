@extends('welcome')

{{-- Style --}}
@push('style')
    
@endpush

{{-- Content --}}
@section('content')
    <!-- main-panel start -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                  <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                      <h3 class="font-weight-bold">Contact Us</h3>
                      <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6>
                    </div>
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md grid-margin stretch-card">
                    <div class="col-12 col-xl-4">
                        <!-- Peta -->
                        <div id="map" style="height: 300px; border-radius: 8px; box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);"></div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Send us a Message</h4>
                            <form class="forms-sample">
                                <div class="form-group">
                                    <label for="exampleInputName1">Your Name</label>
                                    <input type="text" class="form-control" id="exampleInputName1" placeholder="Your Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Your Email</label>
                                    <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Your Email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleTextarea1">Your Message</label>
                                    <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Send Message</button>
                                <button class="btn btn-light">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        
        <!-- partial:partials/_footer.html -->
        @include('components.footer')
        <!-- partial -->
    </div>
    <!-- main-panel ends -->
@endsection


{{-- Script --}}
@push('script')
<!-- Google Maps API -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>

<script>
    // Inisialisasi peta
    function initMap() {
        var myLatLng = {lat: -6.2088, lng: 106.8456}; // Koordinat Jakarta, misalnya

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: myLatLng
        });

        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: 'Our Location'
        });
    }
</script>
@endpush