@extends('welcome')

{{-- Style --}}
@push('style')
    <style>
      /* .menu-item{
        list-style-type: none;
        display: flex;
        gap: 1em;
        margin: 10px 20px;
      } */
      .menu-item h5.menu::after{
        content: '';
        position: absolute;
        /* background: #000; */
        cursor: pointer;
        top: 0; right: 0; bottom: 0; left: 0;
      }
    </style>
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
                  <h3 class="font-weight-bold">Pemesanan Pages</h3>
                  <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6>
                </div>
              </div>
            </div>
          </div>
          {{-- <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal">Tambah Data</a> --}}

          {{-- Export --}}
          {{-- <a href="#" class="btn btn-success mb-3">Export Excel</a> --}}
          {{-- Import --}}
          {{-- <a href="#" class="btn btn-warning mb-3" data-bs-toggle="modal" data-bs-target="#import">Import Excel</a> --}}

          <div class="row">
            <div class="col-md-8 grid-margin stretch-card" style="height: max-content">
              @include('pages.pemesanan.menu')
            </div>
            <div class="col-md-4 grid-margin stretch-card" style="height: max-content">
              <div class="card tale-bg px-3 pt-3">
                @include('pages.pemesanan.pemesanan')
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
{{-- @include('pages.pemesanan.modal') --}}


{{-- Script --}}
@push('script')
  <script>
    console.log('bro apakabar')

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
    // $('#modal').on('show.bs.modal', function(e){
    //   console.log('bro')
    //   let button = $(e.relatedTarget);
    //   let id = button.data('id');
    //   let meja_id = button.data('meja_id');
    //   let tanggal_pemesanan = button.data('tanggal_pemesanan');
    //   let jam_mulai = button.data('jam_mulai');
    //   let jam_selesai = button.data('jam_selesai');
    //   let nama_pemesan = button.data('nama_pemesan');
    //   let jumlah_pelanggan = button.data('jumlah_pelanggan');
    //   let mode = button.data('mode');
    //   console.log(button.data('mode'));
    //   let modal = $(this);
    //   if(mode === 'edit'){
    //     modal.find('.modal-title').text('Edit Data');
    //     modal.find('#meja_id').val(meja_id);
    //     modal.find('#tanggal_pemesanan').val(tanggal_pemesanan);
    //     modal.find('#jam_mulai').val(jam_mulai);
    //     modal.find('#jam_selesai').val(jam_selesai);
    //     modal.find('#nama_pemesan').val(nama_pemesan);
    //     modal.find('#jumlah_pelanggan').val(jumlah_pelanggan);
    //     let halo = modal.find('.form').attr('action', '{{ url("pemesanan") }}/'+id);
    //     modal.find('#simpan').text('Simpan Perubahan');
    //     modal.find('#method').html('@method("PATCH")');
    //   }else{
    //     modal.find('.modal-title').text('Tambah Data');
    //     modal.find('#no_pemesanan').val('');
    //     modal.find('.form').attr('action', 'pemesanan');
    //     modal.find('#simpan').text('Simpan');
    //     modal.find('#method').html('');
    //   }
    // });

    
  </script>
@endpush