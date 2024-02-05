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
                  <h3 class="font-weight-bold">Meja Pages</h3>
                  <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6>
                </div>
              </div>
            </div>
          </div>
          <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal">Tambah Data</a>

          {{-- Export --}}
          <a href="#" class="btn btn-success mb-3">Export Excel</a>
          {{-- Import --}}
          <a href="#" class="btn btn-warning mb-3" data-bs-toggle="modal" data-bs-target="#import">Import Excel</a>

          <div class="row">
            <div class="col-md grid-margin stretch-card">
              <div class="card tale-bg py-3 px-3">
                @include('pages.meja.data')
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
@include('pages.meja.modal')


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
    $('#modal').on('show.bs.modal', function(e){
      console.log('bro')
      let button = $(e.relatedTarget);
      let id = button.data('id');
      let no_meja = button.data('no_meja');
      let kapasitas = button.data('kapasitas');
      let status = button.data('status');
      let mode = button.data('mode');
      console.log(button.data('mode'));
      // let mode = button.data('mode');
      let modal = $(this);
      if(mode === 'edit'){
        modal.find('.modal-title').text('Edit Data');
        modal.find('#no_meja').val(no_meja);
        modal.find('#kapasitas').val(kapasitas);
        modal.find('#status').val(status);
        let halo = modal.find('.form').attr('action', '{{ url("meja") }}/'+id);
        modal.find('#simpan').text('Simpan Perubahan');
        modal.find('#method').html('@method("PATCH")');
        // console.log(btn);
      }else{
        modal.find('.modal-title').text('Tambah Data');
        modal.find('#no_meja').val('');
        modal.find('.form').attr('action', 'meja');
        modal.find('#simpan').text('Simpan');
        modal.find('#method').html('');
      }
    })
  </script>
@endpush