<!-- phpquery -->
<?php
  $nip = $_GET['id'];
  $query = mysqli_query($kon, "SELECT * FROM pegawai where nip='$nip'");
  $data = mysqli_fetch_array($query);
?>
<!-- Page header -->
<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        <!-- Page pre-title -->
        <div class="page-pretitle">
          Overview
        </div>
        <h2 class="page-title">
          Edit Pegawai
        </h2>
      </div>
      <!-- Page title actions -->
      <div class="col-auto ms-auto d-print-none">
        <div class="btn-list">
          <a href="index.php?q=pegawai" class="btn btn-primary d-none d-sm-inline-block">
            Batal
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- kontent -->
<div class="page-body">
  <div class="container-xl">
    <div class="row row-deck row-cards">
      <div class="col-12">
        <div class="card">
          <form action="proseeditpegawai.php" method="post">
            <div class="modal-body">
              <div class="m-3">
                <div class="row">
                  <div class="col-2">
                    <label class="form-label">Nama Pegawai</label>
                  </div>
                  <div class="col-10">
                    <input type="text" class="form-control mb-2" name="nama" value="<?php echo $data['nama'] ?>" required>
                    <div class="row">
                      <div class="col-6">
                        <label class="form-label">Tanggal Di Terima Kerja</label>
                        <input type="date" class="form-control" name="tgl_mulai" value="<?php echo $data['tgl_mulai'] ?>" required>
                      </div>
                      <div class="col-6">
                        <label class="form-label">NIP / Nik</label>
                        <input type="text" class="form-control" name="nip" value="<?php echo $data['nip']?>" readonly>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="m-3">
                <div class="row">
                    <div class="col-2">
                      <label class="form-label">Jenis Kelamin</label>
                    </div>
                    <div class="col-10">
                      <select class="form-select" name="jenis_kelamin" required>
                        <option value="1" <?php echo ($data['jenis_kelamin'] == 1) ? 'selected' : ''?>>Laki - Laki</option>
                        <option value="2" <?php echo ($data['jenis_kelamin'] != 1) ? 'selected' : ''?>>Perempuan</option>
                      </select>
                    </div>
                  </div>
              </div>
              <div class="m-3">
                <div class="row">
                  <div class="col-2">
                    <label class="form-label">Tempat Lahir</label>
                  </div>
                  <div class="col-10">
                    <input type="text" class="form-control" name="tlahir" value="<?php echo $data['tlahir'];?>" required>
                  </div>
                </div>
              </div>
              <div class="m-3">
                <div class="row">
                  <div class="col-2">
                    <label class="form-label">Tanggal Lahir</label>
                  </div>
                  <div class="col-10">
                    <input type="date" class="form-control" name="tglahir" value="<?php echo $data['tgl_lahir'];?>" required>
                  </div>
                </div>
              </div>
              <div class="m-3">
                <div class="row">
                  <div class="col-2">
                    <label class="form-label">Pendidikan</label>
                  </div>
                  <div class="col-10">
                    <input type="text" class="form-control" name="pendidikan" value="<?php echo $data['pendidikan'];?>" required>
                  </div>
                </div>
              </div>
              <div class="m-3">
                <div class="row">
                  <div class="col-2">
                    <label class="form-label">Jurusan</label>
                  </div>
                  <div class="col-10">
                    <input type="text" class="form-control" name="jurusan" value="<?php echo $data['jurusan'];?>" required>
                  </div>
                </div>
              </div>
              <div class="m-3">
                <div class="row">
                  <div class="col-2">
                    <label class="form-label">No Hp/Telp</label>
                  </div>
                  <div class="col-10">
                    <input type="text" class="form-control" name="notelp" value="<?php echo $data['notelp'];?>" required>
                  </div>
                </div>
              </div>
              <div class="m-3">
                <div class="row">
                  <div class="col-2">
                    <label class="form-label">Email</label>
                  </div>
                  <div class="col-10">
                    <input type="text" class="form-control" name="email" value="<?php echo $data['email'];?>" required>
                  </div>
                </div>
              </div>
              <div class="m-3">
                <div class="row">
                  <div class="col-2">
                    <label class="form-label">Alamat</label>
                  </div>
                  <div class="col-10">
                    <textarea class="form-control" rows="3" name="alamat" required>
                      <?php echo $data['alamat'];?>
                    </textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                Cancel
              </a>
              <button type="submit" class="btn btn-primary ms-auto">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M12 5l0 14" />
                  <path d="M5 12l14 0" />
                </svg>
                Simpan
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>