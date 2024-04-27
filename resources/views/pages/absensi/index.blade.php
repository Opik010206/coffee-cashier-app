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
                  <h3 class="font-weight-bold">Absensi Kerja Karyawan</h3>
                  <h6 class="font-weight-normal mb-0">Halaman ini untuk mengelola data absensi kerja karyawan yang ada di restoran <span class="text-primary">Coffee Cashier</span></h6>
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
                    <li>Data {{ $error }} absensi belum di isi</li>
                @endforeach
              </ul>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>  
          @endif

        @if (Auth::check() && Auth::user()->level == 3)
          <a href="#" class="btn btn-primary mb-3 ti-plus" data-toggle="modal" data-target="#modal"> Tambah Data</a>
        @endif
          {{-- Export --}}
          <a href="/absensi/export/excel" class="btn btn-success mb-3 ti-export"> Export Excel</a>
          {{-- Import --}}
          <a href="#" class="btn btn-warning mb-3 ti-import" data-toggle="modal" data-target="#import"> Import Excel</a>
          {{-- PDF --}}
          <a href="{{ route('generate-pdf') }}" class="btn btn-info mb-3 ti-printer"> Export PDF</a>

          <div class="row">
            <div class="col-md grid-margin stretch-card">
              <div class="card border-0 shadow-sm">
                <div class="card-body">
                  <div class="table-responsive">
                    @include('pages.absensi.data')
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
          <form action="{{ route('import_absensi') }}" method="POST" class="form" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="modal-body">
                  <div class="form-group">
                    <input type="file" name="file" required>
                  </div>
              </div>
              <div class="modal-footer pt-3 pb-0">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Keluar</button>
                <button type="submit" class="btn btn-primary" id="simpan">Simpan Perubahan</button>
              </div>
            </div>
          </form>
      </div>
    </div>
@endsection
@include('pages.absensi.modal')


{{-- Script --}}
@push('script')
  <script>
    console.log('bro apakabar')

    $(function(){
      $('#tbl-absensi').DataTable()
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
      let nama_karyawan = button.data('nama_karyawan');
      let tanggal_masuk = button.data('tanggal_masuk');
      let waktu_masuk = button.data('waktu_masuk');
      let status = button.data('status');
      let waktu_keluar = button.data('waktu_keluar');
      let mode = button.data('mode');
      console.log(button.data('mode'));
      // let mode = button.data('mode');
      let modal = $(this);
      if(mode === 'edit'){
        modal.find('.modal-title').text('Edit Data');
        modal.find('#nama_karyawan').val(nama_karyawan);
        modal.find('#tanggal_masuk').val(tanggal_masuk);
        modal.find('#waktu_masuk').val(waktu_masuk);
        modal.find('#status').val(status);
        modal.find('#waktu_keluar').val(waktu_keluar);
        modal.find('.hapus-colom').addClass('d-none');
        let halo = modal.find('.form').attr('action', '{{ url("absensi") }}/'+id);
        modal.find('#simpan').text('Simpan Perubahan');
        modal.find('#method').html('@method("PATCH")');
        // console.log(btn);
      }else{
        modal.find('.modal-title').text('Tambah Data');
        modal.find('#nama_karyawan').val('');
        modal.find('.d-none').removeClass();
        modal.find('.form').attr('action', 'absensi');
        modal.find('#simpan').text('Simpan');
        modal.find('#method').html('');
      }
    })

    // Edit Status
    $('.edit-status').change(function(e){
      let id = $(this).attr('data-id');
      let status = $(this).val();
      $.ajax({
        url: 'absensi/' + id,
        type: 'PUT',
        data: {
          status: status,
          // Menyertakan token CSRF dari meta tag
          _token: $('meta[name="csrf-token"]').attr('content'),
        },
        success:function(response) {
          console.log(response.result.status);
          // Reload halaman setelah permintaan AJAX berhasil
          location.reload();
        },
        error: function(xhr, status, error) {
            console.error(error);
            alert('Gagal memperbarui status.');
        }
      })
    })

    // Absensi Selesai / Waktu Keluar
    $(document).ready(function(){
      // Memeriksa status tombol saat halaman dimuat
      var statusSelesai = localStorage.getItem('status_selesai');
      if (statusSelesai === 'true') {
          $('.waktu-keluar').removeClass('d-none'); // Menampilkan waktu keluar
          $('.btn-selesai').hide(); // Sembunyikan tombol "Selesai"
      }

      // Menyimpan status tombol saat diklik
      $('body').on('click', '.btn-selesai', function(){
        localStorage.setItem('status_selesai', 'true');
        let waktu = new Date(); // Dapatkan waktu saat tombol diklik
        let jam = waktu.getHours();
        let menit = waktu.getMinutes();
        let detik = waktu.getSeconds();

        // Format waktu ke dalam string dengan menambahkan nol di depan jika angka kurang dari 10
        let waktuSelesai = jam.toString().padStart(2, '0') + ':' + 
                            menit.toString().padStart(2, '0') + ':' + 
                            detik.toString().padStart(2, '0');

        // Temukan elemen waktu keluar di baris yang sesuai dengan tombol yang diklik
        let waktuKeluarElement = $(this).closest('tr').find('.waktu-keluar');

        // Perbarui teks waktu keluar dengan waktu selesai
        // console.log(waktuSelesai)
        waktuKeluarElement.val(waktuSelesai);

        // Memasukkan data ke database
        let id = $(this).attr('data-id');
        // let waktu_keluar = $('.waktu_keluar').val(waktuSelesai);
        $.ajax({
          url: 'absensi/' + id,
          type: 'PUT',
          data: {
            waktu_keluar: waktuSelesai,
            // Menyertakan token CSRF dari meta tag
            _token: $('meta[name="csrf-token"]').attr('content'),
          },
          success:function(response) {
            console.log(response.result.waktu_keluar);
            // alert(response.result.waktu_keluar);
            // Reload halaman setelah permintaan AJAX berhasil
            // location.reload();
          },
          error: function(xhr, status, error) {
              console.error(error);
              alert('Gagal memperbarui status.');
          }
        })

        // Tampilkan elemen waktu keluar
        waktuKeluarElement.removeClass('d-none');

        // Sembunyikan tombol "Selesai"
        $(this).hide();
      });
    });



    // const nama = "rofiq";
    // console.log(nama);

    const nama = ['harsa', 'rofiq'];
    console.log(nama[0]);

  </script>
@endpush