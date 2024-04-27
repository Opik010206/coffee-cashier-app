@extends('welcome')

{{-- Style --}}
@push('style')
    
@endpush

{{-- Content --}}
@section('content')
    <!-- main-panel start -->
    <div class="main-panel">
        <div class="content-wrapper py-5">
          <div class="row justify-content-center mb-5">
              <div class="col-md-8 text-center">
                  <h2 class="mb-3">Tentang Coffee Cashier</h2>
                  <p class="lead">Meningkatkan restoran dan kafe dengan solusi manajemen pintar</p>
              </div>
          </div>
      
          <div class="row">
              <div class="col-md-6 mb-4">
                  <div class="card border-0 shadow-sm h-100">
                      <div class="card-body">
                          <h3 class="card-title fw-bold mb-3">Visi Kami</h3>
                          <p class="card-text">Merevolusi industri layanan makanan dengan menyediakan solusi teknologi inovatif yang meningkatkan efisiensi, profitabilitas, dan kepuasan pelanggan.</p>
                      </div>
                  </div>
              </div>
              <div class="col-md-6 mb-4">
                  <div class="card border-0 shadow-sm h-100">
                      <div class="card-body">
                          <h3 class="card-title fw-bold mb-3">Misi Kami</h3>
                          <p class="card-text">Memberdayakan pemilik dan staf restoran dengan perangkat lunak yang ramah pengguna yang menyederhanakan operasi sehari-hari, mengoptimalkan alur kerja, dan memungkinkan pengambilan keputusan berbasis data.</p>
                      </div>
                  </div>
              </div>
          </div>
      
          <div class="row mb-5">
              <div class="col-md-12">
                  <div class="card border-0 shadow-sm">
                      <div class="card-body">
                          <h3 class="card-title fw-bold mb-4">Fitur Utama</h3>
                          <ul class="list-unstyled">
                              <li class="mb-4">
                                  <h4 class="fw-bold">1. Penjualan dan Pemesanan</h4>
                                  <p>Kelola semua jenis produk yang ditawarkan oleh restoran, termasuk kopi, minuman, makanan, dan snack. Tambahkan, edit, dan hapus produk dengan mudah melalui antarmuka pengguna yang intuitif.</p>
                              </li>
                              <li class="mb-4">
                                  <h4 class="fw-bold">2. Manajemen Produk</h4>
                                  <p>Lakukan transaksi penjualan dengan cepat dan akurat. Pesanan dapat dilakukan untuk semua jenis produk, termasuk kopi, minuman, makanan, dan snack. Fitur pencarian cepat memudahkan staf untuk menemukan produk yang diinginkan.</p>
                              </li>
                              <li class="mb-4">
                                  <h4 class="fw-bold">3. Manajemen Meja</h4>
                                  <p>Dilengkapi dengan fitur manajemen meja yang memungkinkan staf untuk melacak status meja, seperti tersedia, dipesan, atau sedang digunakan. Staf dapat dengan mudah mengubah status meja dan mengkoordinasikan layanan dengan lebih baik.</p>
                              </li>
                              <li>
                                  <h4 class="fw-bold">4. Laporan dan Analitik</h4>
                                  <p>Coffee Cashier menyediakan laporan penjualan harian, mingguan, dan bulanan untuk membantu manajemen menganalisis kinerja restoran. Data analitik yang disajikan secara visual memungkinkan manajemen untuk mengidentifikasi tren penjualan, produk yang paling laris, dan pola konsumsi pelanggan.</p>
                              </li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
        </div>
    </div>
    <!-- main-panel ends -->
@endsection

{{-- Script --}}
@push('script')
    
@endpush