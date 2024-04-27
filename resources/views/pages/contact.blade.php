@extends('welcome')

{{-- Style --}}
@push('style')
    
@endpush

{{-- Content --}}
@section('content')
    <!-- main-panel start -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row justify-content-center mb-5">
                <div class="col-md-8 text-center">
                    <h2 class="mb-3">Hubungi Kami</h2>
                    <p class="lead">Meningkatkan restoran dan kafe dengan solusi manajemen pintar</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md mb-4 col-xl-4">
                    <!-- Peta -->
                    <div style="height: 200px; border-radius: 8px; box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1); overflow: hidden;">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d1397.9604928531307!2d107.16680837192403!3d-6.800504319714667!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2s!5e1!3m2!1sid!2sid!4v1714142575116!5m2!1sid!2sid" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class=" mt-4 p-3 pt-4" style="height: 120px; border-radius: 8px; box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1); overflow: hidden;">
                        <div class="container-fluid">
                            <div class="row align-items-center justify-content-between">
                                <div class="col-md-12">
                                    <p class="display-5 mb-3"><i class="ti-mobile"></i> No Telp : +6285860310399</p>
                                    <p class="display-5 mb-3"><i class="ti-location-pin"></i> Alamat : Cianjur, Jawa Barat</p>
                                    <p class="display-5"><i class="ti-email"></i> Email : <a href="mailto:rofik010206@gmail.com" class="display-5">rofik010206@gmail.com</a></p>
                                </div>
                                {{-- <div class="col-md-6 text-end">
                                    <!-- Jika Anda ingin menambahkan ikon atau tombol, Anda dapat melakukannya di sini -->
                                </div> --}}
                            </div>
                        </div>
                    </div>                    
                </div>
                <div class="col-md grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Kirim kami pesan</h4>
                            <form class="forms-sample">
                                <div class="form-group">
                                    <label for="exampleInputName1">Nama Anda</label>
                                    <input type="text" class="form-control" id="exampleInputName1" placeholder="Nama Anda">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Email Anda</label>
                                    <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email Anda">
                                </div>
                                <div class="form-group">
                                    <label for="exampleTextarea1">Pesan Anda</label>
                                    <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Kirim Pesan</button>
                                <button class="btn btn-light">Batal</button>
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