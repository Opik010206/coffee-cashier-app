<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content p-0">
        <div class="modal-header d-flex align-items-center mr-3 py-3">
            <h3 class="modal-title" id="staticBackdropLabel">Tambah Data</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="jenis" method="POST" class="form">
            @csrf
            <div id="method"></div>
            <div class="modal-body">
                <div class="mb-3 row">
                    <label for="nama" class="col-sm-3 col-form-label">Nama Jenis</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                </div>
                <div class="mb-3 row">
                  <label for="kategory_id" class="col-sm-3 col-form-label">Nama Kategori</label>
                  <div class="col-sm-9">
                    <select class="form-control col-sm" name="kategory_id" id="kategory_id">
                      <option selected disabled>Pilih Kategori</option>
                      @foreach ($category as $c => $nama)
                          <option value="{{ $c }}">{{ $nama }}</option>
                      @endforeach
                    </select>
                  </div>
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