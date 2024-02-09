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
        <form action="menu" method="POST" class="form" enctype="multipart/form-data">
            @csrf
            <div id="method"></div>
            <div class="modal-body">
                <div class="mb-3 row">
                    <label for="nama" class="col-sm-3 col-form-label">Nama Menu</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                </div>
                <div class="mb-3 row">
                  <label for="jenis_id" class="col-sm-3 col-form-label">Jenis</label>
                  <div class="col-sm-9">
                    <select class="form-control col-sm" name="jenis_id" id="jenis_id">
                      <option selected disabled>Pilih Jenis</option>
                      @foreach ($jenis as $j => $nama)
                          <option value="{{ $j }}">{{ $nama }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="mb-3 row">
                    <label for="harga" class="col-sm-3 col-form-label">Harga</label>
                    <div class="col-sm-9">
                      <input type="number" class="form-control" id="harga" name="harga">
                    </div>
                </div>
                <div class="mb-3 row">
                  <label for="image" class="col-sm-3 col-form-label">Image</label>
                  <input type="hidden" name="oldImage" id="oldImage">
                  <div class="col-sm-9 input-group">
                    <input type="file" class="form-control" id="image" name="image">
                    <label class="input-group-text" for="image">Upload</label>
                  </div>
                </div>
                <div class="mb-3 row">
                    <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="deskripsi" name="deskripsi">
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