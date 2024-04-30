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
                  <h3 class="font-weight-bold">Produk Titipan</h3>
                  <h6 class="font-weight-normal mb-0">Halaman ini untuk mengelola data yang menitipkan produk ke restoran <span class="text-primary">Coffee Cashier</span></h6>
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
              <strong>Peringatan!</strong> Ada data yang belum di isi, yakni :
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
          

          <a href="#" class="btn btn-primary mb-3 ti-plus" data-toggle="modal" data-target="#modal"> Tambah Data</a>

          {{-- Export --}}
          <a href="/produk_titipan/export/excel" class="btn btn-success mb-3 ti-export"> Export Excel</a>
          {{-- Import --}}
          <a href="#" class="btn btn-warning mb-3 ti-import" data-toggle="modal" data-target="#import"> Import Excel</a>

          <div class="row">
            <div class="col-md grid-margin stretch-card">
              <div class="card border-0 shadow-sm">
                <div class="card-body">
                  <div class="table-responsive">
                    @include('pages.produk.data')
                  </div>
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
    console.log('bro apakabar')

    $(function(){
      $('#tbl-produk_titipan').DataTable()

    })

    $(document).ready(function(){
      $('.stock-cell').dblclick(function() {
        // console.log('brooooooo')
          // Menampilkan input angka dan menyembunyikan nilai stok
          $(this).find('.stock-value').hide();
          $(this).find('.stock-input').show().focus();
      });

      $('.stock-input').keypress(function(e) {
          if (e.which === 13) { // 13 adalah kode tombol "Enter"
              // Mendapatkan nilai stok baru
              let newStock = $(this).val();
              // Mendapatkan ID atau identifikasi unik dari record data (jika perlu)
              let id = $(this).data('id');

              let csrfToken = $('meta[name="csrf-token"]').attr('content');

              // Simpan perubahan stok ke database melalui AJAX
              $.ajax({
                  url: 'produk_titipan/'+ id,
                  method: 'PUT',
                  data: {
                    // Sertakan token CSRF dalam data permintaan
                    stock: newStock,

                    _token: csrfToken,
                  },
                  success: function(response) {
                      // Memperbarui tampilan dengan nilai stok baru
                      // console.log(response.result.stock)
                      $('.stock-value').text(newStock);
                      $('.stock-input').val(newStock);
                  },
                  error: function(xhr, status, error) {
                      console.log(xhr);
                      alert('Gagal memperbarui stok.');
                  }
              });

              // Menyembunyikan input angka dan menampilkan nilai stok
              $(this).hide();
              $(this).siblings('.stock-value').show();
          }
      });
    })

    // dialog hapus data Sweet Alert
    $('.btn-delete').on('click', function(e){
      let nama = $(this).closest('tr').find('td:eq(0)').text();
      Swal.fire({
        icon: 'error',
        title: 'Hapus Data',
        html: `Apakah data <b>${nama}</b> akan dihapus?`,
        confirmButtonText: 'Ya',
        denyButtonText: 'Tidak',
        showDenyButton: true,
        focusConfirm: false
      }).then((result) => {
        if (result.isConfirmed) $(e.target).closest('form').submit()
        else swal.close()
      })
    })

    

    // Modal Form
    $('#modal').on('show.bs.modal', function(e){
      console.log('bro')
      let button = $(e.relatedTarget);
      let id = button.data('id');
      let nama_produk = button.data('nama_produk');
      let nama_supplier = button.data('nama_supplier');
      let harga_beli = button.data('harga_beli');
      let harga_jual = button.data('harga_jual');
      
      let keterangan = button.data('keterangan');
      let stock = button.data('stock');
      let mode = button.data('mode');
      // console.log(button.data('mode'));
      // let mode = button.data('mode');
      let modal = $(this);

      

      

      if(mode === 'edit'){
        // console.log(stock)
        modal.find('.modal-title').text('Edit Data');
        modal.find('#nama_produk').val(nama_produk);
        modal.find('#nama_supplier').val(nama_supplier);
        modal.find('#harga_beli').val(harga_beli);
        modal.find('#harga_jual').val(harga_jual);
        modal.find('#stock').val(stock);
        modal.find('#keterangan').val(keterangan);
        modal.find('.form').attr('action', '{{ url("produk_titipan") }}/'+id);
        modal.find('#simpan').text('Simpan Perubahan');
        modal.find('#method').html('@method("PATCH")');
        // console.log(btn);
      }else{
        modal.find('.modal-title').text('Tambah Data');
        
        // Fungsi Inputan Dari Harga Jual
        $('#harga_beli').on('input', function() {
            // Ambil nilai dari input harga beli
            let hargaBeli = parseFloat($(this).val()) || 0;
            
            // Lakukan perhitungan untuk menentukan harga jual (misalnya, tambahkan markup 30%)
            let keuntungan = 30; // Keuntungan 30%
            let hargaJual = hargaBeli + (hargaBeli * keuntungan / 100);
            
            // Bulatkan harga jual ke nilai terdekat
            hargaJual = Math.round(hargaJual);
            
            // Isi nilai input harga jual dengan hasil perhitungan
            $('#harga_jual').val(hargaJual); // Menampilkan dua angka desimal
        });
        modal.find('.form').attr('action', 'produk_titipan');
        modal.find('#simpan').text('Simpan');
        modal.find('#method').html('');
      }
    })
  </script>
@endpush