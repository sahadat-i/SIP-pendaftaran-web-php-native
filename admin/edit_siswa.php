<!-- phpquery -->
<?php
  $nip = $_GET['id'];
  $query = mysqli_query($kon, "SELECT * FROM siswa where id='$nip'");
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
          Edit Siswa
        </h2>
      </div>
      <!-- Page title actions -->
      <div class="col-auto ms-auto d-print-none">
        <div class="btn-list">
          <a href="index.php?q=siswa&m=a" class="btn btn-primary d-none d-sm-inline-block">
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
          <form action="proseeditsiswa.php" method="post">
            <div class="modal-body">
              <div class="m-3">
                <div class="row">
                  <div class="col-2">
                    <label class="form-label">Nama Siswa</label>
                  </div>
                  <div class="col-10">
                    <input type="text" class="form-control mb-2" name="nama" value="<?php echo ucwords($data['nama']) ?>" required>
                    <div class="row">
                      <div class="col-6">
                        <label class="form-label">No Pendaftar</label>
                        <input type="hidden" name="id" value="<?php echo  $data['id'] ?>" required>
                        <input type="text" class="form-control" name="nopendaftar" value="<?php echo  $data['nopendaftar'] ?>">
                      </div>
                      <div class="col-6">
                        <label class="form-label">NIS</label>
                        <input type="text" class="form-control" name="nis" value="<?php echo  $data['nis'] ?>">
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
                    <input type="text" class="form-control" name="tlahir" value="<?php echo ucwords($data['tlahir']);?>" required>
                  </div>
                </div>
              </div>
              <div class="m-3">
                <div class="row">
                  <div class="col-2">
                    <label class="form-label">Tanggal Lahir</label>
                  </div>
                  <div class="col-10">
                  <input type="date" name="tanggal"class="form-control" name="tglahir" required="" value="<?php 
                                    $tanggal = new DateTime($data['tgl_lahir']);
                                    echo $tanggal->format('Y-m-d'); 
                                ?>">
                  </div>
                </div>
              </div>
              <div class="m-3">
                <div class="row">
                  <div class="col-2">
                    <label class="form-label">Nama Sekolah</label>
                  </div>
                  <div class="col-10">
                    <input type="text" class="form-control" name="namasekolah" value="<?php echo ucwords($data['pendidikan'])?>" required>
                  </div>
                </div>
              </div>
              <div class="m-3">
                <div class="row">
                  <div class="col-2">
                    <label class="form-label">No Hp/Telp</label>
                  </div>
                  <div class="col-10">
                    <input type="text" class="form-control" name="notelp" value="<?php echo ucwords($data['notelp'])?>" required>
                  </div>
                </div>
              </div>
              <div class="m-3">
                <div class="row">
                  <div class="col-2">
                    <label class="form-label">Email</label>
                  </div>
                  <div class="col-10">
                    <input type="text" class="form-control" name="email" value="<?php echo $data['email']?>"required>
                  </div>
                </div>
              </div>
              <div class="m-3">
                <div class="row">
                  <div class="col-2">
                    <label class="form-label">Alamat</label>
                  </div>
                  <div class="col-10">
                    <textarea class="form-control" rows="3" name="alamat"required>
                      <?php echo ucwords($data['alamat'])?>
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