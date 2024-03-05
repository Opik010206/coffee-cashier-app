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
                  <h3 class="font-weight-bold">Data Penjualan Produk Titipan</h3>
                  <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6>
                </div>
              </div>
            </div>
          </div>
          @if (session('success'))
            <div class="mt-2 alert alert-success alert-dismissible fade show" role="alert">
              <strong>Selamat!</strong> {{ session('success') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif

          @if ($errors->any())
            <div class="mt-2 alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Holy guacamole!</strong> You should check in on some of those fields below.
              <ul>
                @foreach ($errors->all() as $error)
                    <li>Data {{ $error }} belum di isi</li>
                @endforeach
              </ul>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>  
          @endif

          <div class="row mb-3 mx-1 justify-content-between">
            <div class="col-md-4 d-flex align-items-center justify-content-between">
              <label>Dari Tanggal</label>
              {{-- <div></div> --}}
              <input type="date" class="form-control" style="width: 40%">
            </div>
            <div class="col-md-4 d-flex align-items-center justify-content-between">
              <h5>Sampai Tanggal</h5>
              <input type="date" class="form-control" style="width: 40%">
            </div>
          </div>

          <div class="row">
            <div class="col-md grid-margin stretch-card">
              <div class="card p-4">
                <table class="table table-responsive-md table-hover" id="tbl-produk_titipan">
                  <thead class="table-light">
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Nama Produk</th>
                      <th scope="col">Nama Supplier</th>
                      <th scope="col">Harga Beli</th>
                      <th scope="col">Harga Jual</th>
                      <th scope="col">Stock</th>
                      <th scope="col" class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody >
                      @foreach ($produk as $c)
                          <tr>
                              <th>{{ $i = (!isset($i)?1:++$i) }}</th>
                              <td>{{ $c->nama_produk }}</td>
                              <td>{{ $c->nama_supplier }}</td>
                              <td>{{ $c->harga_beli }}</td>
                              <td>{{ $c->harga_jual }}</td>
                              <td class="stock-cell">
                                  <span class="stock-value">{{ $c->stock }}</span>
                                  <input type="number" class="stock-input" value="{{ $c->stock }}" data-id="{{ $c->id }}" style="width: 40px; display: none;">
                              </td>
                              <td class="text-center">
                                 <a href="" class="btn btn-warning">Cetak Kuitansi</a>
                              </td>
                          </tr>
                      @endforeach
                  </tbody>
                </table>
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


    {{-- Modal Import --}}
    <div class="modal fade" id="import" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header d-flex align-items-center mr-3 py-3">
              <h3 class="modal-title" id="staticBackdropLabel">Import Data</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <form action="{{ route('import_produk_titipan') }}" method="POST" class="form" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="modal-body">
                  <div class="form-group">
                    <input type="file" name="file" required>
                  </div>
              </div>
              <div class="modal-footer pt-3">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Keluar</button>
                <button type="submit" class="btn btn-primary" id="simpan">Simpan</button>
              </div>
            </form>
          </div>
      </div>
    </div>
  @include('pages.produk.modal')

@endsection


{{-- Script --}}
@push('script')
  <script>
    
  </script>
@endpush