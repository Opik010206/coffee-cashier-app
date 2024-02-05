<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header d-flex align-items-center mr-3">
            <h3 class="modal-title" id="staticBackdropLabel">Tambah Data</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="" method="POST" class="form">
            @csrf
            <div id="method"></div>
            <div class="modal-body">
                <div class="mb-3 row">
                  <label for="meja_id" class="col-sm-3 col-form-label">Nomor Meja</label>
                  <div class="col-sm-9">
                    <select class="form-control col-sm" name="meja_id" id="meja_id">
                      <option selected disabled>Pilih Menu</option>
                      @foreach ($meja as $m => $no_meja)
                          <option value="{{ $m }}">{{ $no_meja }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="nama_pemesan" class="col-sm-3 col-form-label">Nama Pemesan</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="nama_pemesan" name="nama_pemesan">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="jumlah_pelanggan" class="col-sm-3 col-form-label">Jumlah Pelanggan</label>
                  <div class="col-sm-9">
                    <input type="number" class="form-control" id="jumlah_pelanggan" name="jumlah_pelanggan">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="tanggal_pemesanan" class="col-sm-3 col-form-label">Tanggal</label>
                  <div class="col-sm-9">
                    <input type="date" class="form-control" id="tanggal_pemesanan" name="tanggal_pemesanan">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="jam_mulai" class="col-sm-3 col-form-label">Mulai</label>
                  <div class="col-sm-9">
                    <input type="time" class="form-control" id="jam_mulai" name="jam_mulai">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="jam_selesai" class="col-sm-3 col-form-label">Selesai</label>
                  <div class="col-sm-9">
                    <input type="time" class="form-control" id="jam_selesai" name="jam_selesai">
                  </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
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