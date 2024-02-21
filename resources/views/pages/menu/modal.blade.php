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
        <form action="menu" method="POST" class="form forms-sample" enctype="multipart/form-data">
            @csrf
            <div id="method"></div>
            <div class="modal-body">
              <div class="row row-cols-2">
                <div class="col">
                  <div class="form-group">
                    <label for="jenis_id" class="">Jenis</label>
                    <select class="form-control" name="jenis_id" id="jenis_id">
                      <option selected disabled>Pilih Jenis</option>
                      @foreach ($jenis as $j => $nama)
                          <option value="{{ $j }}">{{ $nama }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                      <label for="nama" class="">Nama Menu</label>
                      <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama menu">
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                      <label for="harga" class="">Harga Menu</label>
                      <input type="number" class="form-control" id="harga" name="harga" placeholder="Harga menu">
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label for="image" class="">Image</label>
                    <input type="hidden" name="oldImage" id="oldImage">
                    <div class="input-group">
                      <input type="file" class="form-control" id="image" name="image">
                      <label class="input-group-text" for="image">Upload</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                  <label for="deskripsi" class="">Deskripsi</label>
                  <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi">
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

@push('script')
  <script>
    // console.log('halo');
  </script>
@endpush