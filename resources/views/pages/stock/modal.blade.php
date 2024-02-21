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
        <form action="" method="POST" class="form">
            @csrf
            <div id="method"></div>
            <div class="modal-body">
              <div class="mb-3 row">
                <label for="menu_id" class="col-sm-3 col-form-label">Nama Menu</label>
                <div class="col-sm-9">
                  <select class="form-control col-sm" name="menu_id" id="menu_id">
                    <option selected disabled>Pilih Menu</option>
                    @foreach ($menu as $m => $nama)
                        <option value="{{ $m }}">{{ $nama }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="mb-3 row">
                  <label for="jumlah" class="col-sm-3 col-form-label">Jumlah</label>
                  <div class="col-sm-9">
                    <input type="number" class="form-control" id="jumlah" name="jumlah">
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