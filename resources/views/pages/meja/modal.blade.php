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
        <form action="meja" method="POST" class="form">
            @csrf
            <div id="method"></div>
            <div class="modal-body">
                <div class="mb-3 row">
                    <label for="no_meja" class="col-sm-3 col-form-label">Nomor Meja</label>
                    <div class="col-sm-9">
                      <input type="number" class="form-control" id="no_meja" name="no_meja">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="kapasitas" class="col-sm-3 col-form-label">Kapasitas</label>
                    <div class="col-sm-9">
                      <input type="number" class="form-control" id="kapasitas" name="kapasitas">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="status" class="col-sm-3 col-form-label">Status</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="status" name="status">
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