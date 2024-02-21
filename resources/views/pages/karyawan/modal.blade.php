<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header d-flex align-items-center mr-3 py-3">
            <h3 class="modal-title" id="staticBackdropLabel">Tambah Data</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="" method="POST" class="form" enctype="multipart/form-data">
            @csrf
            <div id="method"></div>
            <div class="modal-body">
                <div class="mb-3 row">
                  <label for="nama" class="col-sm-3 col-form-label">Nama Karyawan</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="nip" class="col-sm-3 col-form-label">Nip</label>
                  <div class="col-sm-9">
                    <input type="number" maxlength="12" class="form-control" id="nip" name="nip" value="{{ old('nip') }}">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="nik" class="col-sm-3 col-form-label">Nik</label>
                  <div class="col-sm-9">
                    <input type="number" class="form-control" minlength="12" id="nik" name="nik" value="{{ old('nik') }}">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                  <div class="col-sm-9">
                    <select class="form-control col-sm" name="jenis_kelamin" id="jenis_kelamin" value="{{ old('jenis_kelamin') }}">
                      <option selected disabled>Pilih Jenis</option>
                      <option value="pria">Pria</option>
                      <option value="wanita">Wanita</option>
                    </select>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="tempat_lahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                  <div class="col-sm-9">
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="no_telp" class="col-sm-3 col-form-label">Nomor Telpon</label>
                  <div class="col-sm-9">
                    <input type="number" maxlength="12" class="form-control" id="no_telp" name="no_telp" value="{{ old('no_telp') }}">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="agama" class="col-sm-3 col-form-label">Agama</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="agama" name="agama" value="{{ old('agama') }}">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="status_nikah" class="col-sm-3 col-form-label">Status Nikah</label>
                  <div class="col-sm-9">
                    <select class="form-control col-sm" name="status_nikah" id="status_nikah" value="{{ old('status_nikah') }}">
                      <option selected disabled>Pilih Salah Satu</option>
                      <option value="belum_nikah">Belum Nikah</option>
                      <option value="nikah">Nikah</option>
                    </select>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                  <div class="col-sm-9">
                    <input type="text" max="13" class="form-control" id="alamat" name="alamat" value="{{ old('alamat') }}">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="foto" class="col-sm-3 col-form-label">Foto</label>
                  <input type="hidden" name="oldImage" id="oldImage">
                  <div class="col-sm-9 input-group">
                    <input type="file" class="form-control" id="foto" name="foto" accept=".jpg,.jpeg,.png">
                    <label class="input-group-text" for="foto">Upload</label>
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