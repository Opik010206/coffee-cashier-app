<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header d-flex align-items-center mr-3 py-3">
            <h3 class="modal-title" id="staticBackdropLabel">Tambah Data</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="absensi" method="POST" class="form">
            @csrf
            <div id="method"></div>
            <div class="modal-body">
                <div class="mb-3 row">
                    <label for="nama_karyawan" class="col-sm-3 col-form-label">Nama Karyawan</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="karyawan_id" id="karyawan_id">
                        <option selected disabled>Pilih Nama Karyawan</option>
                        @foreach ($karyawan as $j => $nama)
                            <option value="{{ $j }}">{{ $nama }}</option>
                        @endforeach
                      </select>
                      {{-- <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan"> --}}
                    </div>
                </div>
                <div class="mb-3 row hapus-colom">
                    <label for="tanggal_masuk" class="col-sm-3 col-form-label">Tanggal Masuk</label>
                    <div class="col-sm-9">
                      <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk">
                    </div>
                </div>
                <div class="mb-3 row hapus-colom">
                    <label for="waktu_masuk" class="col-sm-3 col-form-label">Waktu Masuk</label>
                    <div class="col-sm-9">
                      <input type="time" class="form-control" id="waktu_masuk" name="waktu_masuk">
                    </div>
                </div>
                <div class="mb-3 row hapus-colom">
                    <label for="status" class="col-sm-3 col-form-label">Status</label>
                    <div class="col-sm-9">
                      {{-- <input type="text" class="form-control" id="status" name="status"> --}}
                      <select class="form-control col-sm" name="status" id="status">
                        <option selected disabled>Pilih Status</option>
                        <option value="masuk" id="masuk">Masuk</option>
                        <option value="sakit" id="sakit">Sakit</option>
                        <option value="cuti" id="cuti">Cuti</option>
                      </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer pb-0 pt-3">
              <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Keluar</button>
              <button type="submit" class="btn btn-primary" id="simpan">Simpan Perubahan</button>
            </div>
          </div>
        </form>
    </div>
</div>

@push('script')
  <script>
    // console.log('halo');
  </script>
@endpush