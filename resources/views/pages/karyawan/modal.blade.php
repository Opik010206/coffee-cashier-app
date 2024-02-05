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
                  <label for="nama" class="col-sm-3 col-form-label">Nama Karyawan</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="nama" name="nama">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="nip" class="col-sm-3 col-form-label">Nip</label>
                  <div class="col-sm-9">
                    <input type="number" max="12" class="form-control" id="nip" name="nip">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="nik" class="col-sm-3 col-form-label">Nik</label>
                  <div class="col-sm-9">
                    <input type="number" max="12" class="form-control" id="nik" name="nik">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                  <div class="col-sm-9">
                    <select class="form-control col-sm" name="jenis_kelamin" id="jenis_kelamin">
                      <option selected disabled>Pilih Jenis</option>
                      <option value="pria">Pria</option>
                      <option value="wanita">Wanita</option>
                    </select>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="tempat_lahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                  <div class="col-sm-9">
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="no_telp" class="col-sm-3 col-form-label">Nomor Telpon</label>
                  <div class="col-sm-9">
                    <input type="number" max="13" class="form-control" id="no_telp" name="no_telp">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="agama" class="col-sm-3 col-form-label">Agama</label>
                  <div class="col-sm-9">
                    <input type="text" max="13" class="form-control" id="agama" name="agama">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="status_nikah" class="col-sm-3 col-form-label">Status Nikah</label>
                  <div class="col-sm-9">
                    <select class="form-control col-sm" name="status_nikah" id="status_nikah">
                      <option selected disabled>Pilih Salah Satu</option>
                      <option value="belum_nikah">Belum Nikah</option>
                      <option value="nikah">Nikah</option>
                    </select>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                  <div class="col-sm-9">
                    <input type="text" max="13" class="form-control" id="alamat" name="alamat">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="foto" class="col-sm-3 col-form-label">Foto</label>
                  <div class="col-sm-9">
                    <input type="file" class="" id="foto" name="foto">
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