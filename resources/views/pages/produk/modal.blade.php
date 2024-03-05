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
        <form action="produk_titipan" method="POST" class="form forms-sample">
            @csrf
            <div id="method"></div>
            <div class="modal-body">
              <div class="row row-cols-2">
                <div class="col">
                  <div class="form-group">
                      <label for="nama_produk" class="">Nama Produk</label>
                      <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Nama produk" value="{{ old('nama_produk') }}">
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                      <label for="stock" class="">Stock</label>
                      <input type="number" class="form-control" id="stock" name="stock" placeholder="Stock" value="{{ old('stock') }}">
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                      <label for="harga_beli" class="">Harga Beli</label>
                      <input type="number" class="form-control" id="harga_beli" name="harga_beli" placeholder="Harga beli" value="{{ old('harga_beli') }}">
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                      <label for="harga_jual" class="">Harga Jual</label>
                      <input type="number" class="form-control" id="harga_jual" name="harga_jual" placeholder="Harga jual" readonly>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                      <label for="nama_supplier" class="">Nama Supplier</label>
                      <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" placeholder="Nama supplier" value="{{ old('nama_supplier') }}">
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                      <label for="keterangan" class="">Keterangan</label>
                      <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" value="{{ old('keterangan') }}">
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer pt-3">
              <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Keluar</button>
              <button type="submit" class="btn btn-primary" id="simpan">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>

@push('script')
  <script>
    // console.log('halo');
  </script>
@endpush