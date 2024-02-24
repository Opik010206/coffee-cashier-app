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
                  <h3 class="font-weight-bold">Karyawan Pages</h3>
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
                    <li>Data {{ $error }} karyawan belum di isi</li>
                @endforeach
              </ul>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>  
          @endif

          <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal">Tambah Data</a>

          {{-- Export --}}
          <a href="#" class="btn btn-success mb-3">Export Excel</a>
          {{-- Import --}}
          <a href="#" class="btn btn-warning mb-3" data-bs-toggle="modal" data-bs-target="#import">Import Excel</a>

          <div class="row">
            <div class="col-md grid-margin stretch-card">
              <div class="card p-4">
                @include('pages.karyawan.data')
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
@include('pages.karyawan.modal')


{{-- Script --}}
@push('script')
  <script>
    console.log('bro apakabar')

    $(function(){
      $('#tbl-karyawan').DataTable()
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
      let nama = button.data('nama');
      let nip = button.data('nip');
      let nik = button.data('nik');
      let jenis_kelamin = button.data('jenis_kelamin');
      let tempat_lahir = button.data('tempat_lahir');
      let tanggal_lahir = button.data('tanggal_lahir');
      let no_telp = button.data('no_telp');
      let agama = button.data('agama');
      let status_nikah = button.data('status_nikah');
      let alamat = button.data('alamat');
      // let foto = button.data('foto');
      let mode = button.data('mode');
      console.log(button.data('mode'));
      // let mode = button.data('mode');
      let modal = $(this);
      if(mode === 'edit'){
        console.log('edit');
        modal.find('.modal-title').text('Edit Data');
        modal.find('#nama').val(nama);
        modal.find('#nip').val(nip);
        modal.find('#nik').val(nik);
        modal.find('#jenis_kelamin').val(jenis_kelamin);
        modal.find('#tempat_lahir').val(tempat_lahir);
        modal.find('#tanggal_lahir').val(tanggal_lahir);
        modal.find('#no_telp').val(no_telp);
        modal.find('#agama').val(agama);
        modal.find('#status_nikah').val(status_nikah);
        modal.find('#alamat').val(alamat);
        // modal.find('#foto').val(foto);
        let halo = modal.find('.form').attr('action', '{{ url("karyawan") }}/'+id);
        modal.find('#simpan').text('Simpan Perubahan');
        modal.find('#method').html('@method("PATCH")');
        // console.log(btn);
      }else{
        modal.find('.modal-title').text('Tambah Data');
        modal.find('#no_karyawan').val('');
        modal.find('.form').attr('action', 'karyawan');
        modal.find('#simpan').text('Simpan');
        modal.find('#method').html('');
      }
    })
  </script>
@endpush