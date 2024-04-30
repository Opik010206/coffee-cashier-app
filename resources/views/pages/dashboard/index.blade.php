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
                <div class="col-12 col-lg-9 mb-4 mb-lg-0">
                  <h3 class="font-weight-bold">Welcome {{ $user->name }}
                  </h3>
                  <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6>
                </div>
                <div class="col-6 col-md-3 col-sm-4 col-lg-3">
                 <div class="justify-content-end d-flex">
                  {{-- <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk"> --}}
                  <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                    <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                     <i class="mdi mdi-calendar"></i> 22 April 2024 - 26 April 2024
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                      <a class="dropdown-item" href="#">January - March</a>
                      <a class="dropdown-item" href="#">March - June</a>
                      <a class="dropdown-item" href="#">June - August</a>
                      <a class="dropdown-item" href="#">August - November</a>
                    </div>
                  </div>
                 </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            {{-- Image --}}
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card tale-bg">
                <div class="card-people mt-auto p-0">
                  <img src="{{ asset('assets') }}/images/dashboard/people1.svg" alt="people">
                  <div class="weather-info">

                  </div>
                </div>
              </div>
            </div>

            {{-- Data --}}
            <div class="col-md-6 grid-margin transparent">
              <div class="row">
                <div class="col-md-12 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body text-center">
                      <p class="mb-4">Jumlah Transaksi</p>
                      <p class="fs-30 mb-2">{{ $jumlah_transaksi }}</p>
                      {{-- <p>10.00% (30 days)</p> --}}
                      <p>transaksi</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 mb-4 mb-lg-0 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card-body text-center">
                      <p class="mb-4">Jumlah Pendapatan</p>
                      <p class="fs-30 mb-4">Rp{{ number_format($jumlah_pendapatan, 0, ',', '.') }}</p>
                      {{-- <p>22.00% (30 days)</p> --}}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            {{-- Chart --}}
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand">
                      <div class=""></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink">
                      <div class=""></div>
                    </div>
                  </div>
                  <div class="d-flex justify-content-between align-item-center ml-2">
                    <p class="card-title pt-1">Grafik Pendapatan</p>
                    <div class="justify-content-end d-flex">
                      <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                        <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                         <i class="mdi mdi-calendar"></i> 22 April 2024 - 26 April 2024
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                          <a class="dropdown-item" href="#">January - March</a>
                          <a class="dropdown-item" href="#">March - June</a>
                          <a class="dropdown-item" href="#">June - August</a>
                          <a class="dropdown-item" href="#">August - November</a>
                        </div>
                      </div>
                     </div>
                  </div>
                  {{-- <canvas id="order-chart" width="702" height="350" style="display: block; height: 319px; width: 639px;" class="chartjs-render-monitor"></canvas> --}}
                  <canvas id="areaChart" width="326" height="162" style="display: block; height: 148px; width: 297px;" class="chartjs-render-monitor"></canvas>
                  {{-- <canvas id="doughnutChart" width="326" height="162" style="display: block; height: 148px; width: 297px;" class="chartjs-render-monitor"></canvas> --}}
                </div>
              </div>

              {{-- <div class="card">
                <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                  <h4 class="card-title">Area chart</h4>
                  <canvas id="areaChart" width="326" height="162" style="display: block; height: 148px; width: 297px;" class="chartjs-render-monitor"></canvas>
                </div>
              </div> --}}
            </div>

            {{-- Top 5 Penjualan --}}
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card">
                <div class="card-body m-2">
                  <div class="d-flex justify-content-between align-item-center mb-2">
                    <p class="card-title">Top 5 Penjualan</p>
                    <a href="">Lihat Detail</a>
                  </div>
                  <div class="row m-0 rounded-lg p-1 mb-4" style="border: 1px solid rgba(208, 208, 208, 0.581);">
                    <div class="col-6 bg-tertiary p-1 btn-light">
                      <a href="#" class="d-block text-center text-decoration-none">Produk</a>
                    </div>
                    <div class="col-6 bg-tertiary p-1">
                      <a href="#" class="d-block text-center text-decoration-none">Pelanggan</a>
                    </div>
                  </div>
                  <ul class="icon-data-list">
                    @foreach ($menu as $item)
                      <li>
                        <div class="d-flex align-items-center">
                          <img src="{{ asset('storage/' . $item->image) }}" alt="user">
                          <div>
                            <p class="text-info mb-1">{{ $item->nama }}</p>
                            {{-- <p class="mb-0">{{ $item->deskripsi }}</p> --}}
                            {{-- <small>27 terjual</small> --}}
                            @foreach ($terjual as $t)
                              @if ($t->menu_id == $item->id)
                              <small>{{ $t->total_terjual }} terjual</small>
                              @endif
                            @endforeach
                          </div>
                        </div>
                      </li>
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>

            {{-- Transaksi Terbaru --}}
            <div class="col-md-6 stretch-card grid-margin">
              <div class="card">
                <div class="card-body m-2">
                  <div class="d-flex justify-content-between align-item-center mb-2">
                    <p class="card-title">Transaksi Terbaru</p>
                    <a href="">Lihat Detail</a>
                  </div>
                  <ul class="icon-data-list" style="width: 100%;">
                    @foreach ($transaksis as $index => $transaksi)
                      <li class="">
                        <div class="row justify-content-between m-0 align-items-center">
                          <div class="col p-0 d-flex">
                            <img src="{{ asset('storage/' . $transaksi->menu->image) }}" alt="user">
                            <div>
                              <p class="font-weight-bold m-0">{{ $transaksi->menu->nama }}</p>
                              <small>{{ $item->updated_at->format('h:i A') }}</small>
                            </div>
                          </div>
                          <div class="justify-content-end">
                            <p>Rp{{ number_format($transaksi->subtotal, 0, ',', '.') }}</p>
                          </div>
                        </div>
                      </li>
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>

            {{-- Stock Terendah --}}
            <div class="col-md-6 stretch-card grid-margin">
              <div class="card">
                <div class="card-body m-2">
                  <div class="d-flex justify-content-between align-item-center mb-2">
                    <p class="card-title">Stock Terendah</p>
                    <a href="">Lihat Detail</a>
                  </div>
                  <ul class="icon-data-list" style="width: 100%;">
                    @foreach ($menu as $item)
                      <li class="">
                        <div class="d-flex">
                          <img src="{{ asset('storage/' . $item->image) }}" alt="user">
                          <div>
                            <p class="font-weight-bold m-0">{{ $item->nama }}</p>
                            {{-- <p class="mb-0">{{ $item->deskripsi }}</p> --}}
                            @foreach ($stok as $s)  
                              @if ($s->menu_id == $item->id)
                                <small>{{ $s->jumlah }} Stok</small>
                              @endif
                            @endforeach
                          </div>
                        </div>
                      </li>
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>

            {{-- Harga Kurang dari 5rb --}}
            <div class="col-md-6 stretch-card grid-margin">
              <div class="card">
                <div class="card-body m-2">
                  <div class="d-flex justify-content-between align-item-center mb-2">
                    <p class="card-title">Harga Kurang Dari 5rb</p>
                    <a href="">Lihat Detail</a>
                  </div>
                  <ul class="icon-data-list" style="width: 100%;">
                    @foreach ($menu as $item)
                      <li class="">
                        <div class="d-flex">
                          <img src="{{ asset('storage/' . $item->image) }}" alt="user">
                          <div>
                            <p class="font-weight-bold m-0">{{ $item->nama }}</p>
                            {{-- <p class="mb-0">{{ $item->deskripsi }}</p> --}}
                            <small>Rp{{ number_format($item->harga, 0, ',', '.') }}</small>
                          </div>
                        </div>
                      </li>
                    @endforeach
                  </ul>
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
<script>
  @if ($pendapatan && $waktu)
    let pendapatan = @json($pendapatan);
    let waktu = @json($waktu);
  @endif

  // let pendapatan = pendapatann.map(value => 'Rp' + value);
  // console.log(pendapatann.map(value => 'Rp' + value));
</script>
@endpush