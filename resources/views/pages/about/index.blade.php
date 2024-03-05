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
                  <h2 class="font-weight-bold">About Pages</h2>
                  <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md grid-margin stretch-card">
              <div class="card tale-bg py-3 px-4">
                <h3>Tentang Aplikasi</h3>
                <p>Aplikasi Coffee Cashier adalah sebuah solusi perangkat lunak yang dirancang khusus untuk restoran atau kafe yang menawarkan berbagai jenis produk, termasuk kategori kopi, minuman, makanan, serta snack. Aplikasi ini bertujuan untuk membantu manajemen restoran dalam melakukan operasi sehari-hari mereka dengan lebih efisien dan efektif.</p>
                <h5 class="my-3">Fitur Utama</h5>
                <ul>
                  <h4>1. Penjualan dan Pemesanan</h4>
                  <li class="mx-5">Aplikasi ini memungkinkan pengguna untuk mengelola semua jenis produk yang ditawarkan oleh restoran, termasuk kategori kopi, minuman, makanan, dan snack.</li>
                  <li class="mx-5">Pengguna dapat menambahkan, mengedit, dan menghapus produk dengan mudah melalui antarmuka pengguna yang intuitif.</li>
                </ul>
                <ul>
                  <h4>2. Manajemen Produk</h4>
                  <li class="mx-5">Coffee Cashier memungkinkan staf restoran untuk melakukan transaksi penjualan dengan cepat dan akurat.</li>
                  <li class="mx-5">Pemesanan dapat dilakukan untuk semua jenis produk, termasuk kopi, minuman, makanan, dan snack.</li>
                  <li class="mx-5">Fitur pencarian cepat memudahkan staf untuk menemukan produk yang diinginkan oleh pelanggan.</li>
                </ul>
                <ul>
                  <h4>3. Manajemen Meja</h4>
                  <li class="mx-5">Aplikasi ini dilengkapi dengan fitur manajemen meja yang memungkinkan staf untuk melacak status meja, seperti meja yang tersedia, dipesan, atau sedang digunakan.</li>
                  <li class="mx-5">Staf dapat dengan mudah mengubah status meja dan mengoordinasikan layanan dengan lebih baik.</li>
                </ul>
                <ul>
                  <h4>4. Laporan Dan Analitik</h4>
                  <li class="mx-5">Coffee Cashier menyediakan laporan penjualan harian, mingguan, dan bulanan untuk membantu manajemen dalam menganalisis kinerja restoran.</li>
                  <li class="mx-5">Data analitik yang disajikan secara visual memungkinkan manajemen untuk mengidentifikasi tren penjualan, produk yang paling laris, dan pola konsumsi pelanggan.</li>
                </ul>
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
    
@endpush