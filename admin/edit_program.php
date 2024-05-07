<!-- phpquery -->
<?php
  $id = $_GET['id'];
  $query = mysqli_query($kon, "SELECT * FROM byprogram where id='$id'");
  $data = mysqli_fetch_array($query);
  $kdprogram = $data['kdprogram'];
  $dkategori = mysqli_query($kon,"select nmkatprgm from kategori_program where kdkatprgm='$kdprogram'");
  $nama   = mysqli_fetch_assoc($dkategori)['nmkatprgm'];
  $dtanggal = explode(" ",$data['jadwal_kelas'])[0];
  $tanggal = new DateTime($dtanggal);
  $jam = explode(" ",$data['jadwal_kelas'])[1];
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
          Edit Biaya Program
        </h2>
      </div>
      <!-- Page title actions -->
      <div class="col-auto ms-auto d-print-none">
        <div class="btn-list">
          <a href="index.php?q=by&m=a" class="btn btn-primary d-none d-sm-inline-block" role="button">
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
          <form action="proseseditprogram.php" method="post">
            <div class="modal-body">
              <div class="m-3">
                <div class="row">
                  <div class="col-2">
                    <label class="form-label">Kode Program</label>
                  </div>
                  <div class="col-10">
                    <select class="form-select" name="kodeprogram" onchange="GetSelectedTextValue(this)">
                      <option value="">Pilih Kode Program</option>
                      <?php
                      $fakultas = mysqli_query($kon, "select * from kategori_program");
                      while ($f = mysqli_fetch_array($fakultas)) {
                      ?>
                        <option value="<?php echo $f['kdkatprgm']?>" <?php echo ($f['kdkatprgm'] == $data['kdprogram']) ? 'selected' : '';?>><?php echo $f['kdkatprgm'] . ' | ' . ucwords($f['nmkatprgm']); ?></option>
                      <?php
                      }
                      ?>
                    </select>
                    <input type="hidden" name="id" value="<?php echo $data['id'];?>">
                  </div>
                </div>
              </div>
              <div class="m-3">
                <div class="row">
                  <div class="col-6">
                    <div class="row">
                      <div class="col-4">
                        <label class="form-label">Kategori Program</label>
                      </div>
                      <div class="col">
                        <input type="text" class="form-control" id="namakategori" name="namakategori" value ="<?php echo ucwords($nama);?>" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="row">
                      <div class="col-4">
                        <label class="form-label">Tanggal & Jam Mulai</label>
                      </div>
                      <div class="col">
                        <input type="date" class="form-control" name="tanggal" value="<?php echo $tanggal->format('Y-m-d')?>" required>
                      </div>
                      <div class="col">
                        <select class="form-select" name="jam" required>
                          <option value="">Pilih Jam Mulai</option>
                          <option value="14.00 - 15.45" <?php echo ($jam == '14.00') ? 'selected' : '' ;?>>14.00 - 15.45</option>
                          <option value="16.00 - 17.45" <?php echo ($jam == '16.00') ? 'selected' : '' ;?>>16.00 - 17.45</option>
                          <option value="18.30 - 20.00" <?php echo ($jam == '18.30') ? 'selected' : '' ;?>>18.30 - 20.00</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="m-3">
                <div class="row">
                  <div class="col-2">
                    <label class="form-label">Nama Program</label>
                  </div>
                  <div class="col-10">
                    <input type="text" class="form-control" name="namaprogram" value="<?php echo ucwords( $data['nama']);?>" required>
                  </div>
                </div>
              </div>
              <div class="m-3">
                <div class="row">
                  <div class="col-2">
                    <label class="form-label">Deskripsi Program</label>
                  </div>
                  <div class="col-10">
                    <textarea class="form-control" rows="4" name="deskripsi" required><?php echo ucwords($data['deskripsi']);?></textarea>
                  </div>
                </div>
              </div>
              <div class="m-3">
                <div class="row">
                  <div class="col-6">
                  </div>
                  <div class="col-6">
                    <div class="row mb-3">
                      <div class="col-4">
                        <label class="form-label">Biaya Awal</label>
                      </div>
                      <div class="col">
                        <input type="text" class="form-control" id="byawal" name="byawal" value="<?php echo $data['byawal'];?>" onkeypress="return hanyaAngka(event)">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-4">
                        <label class="form-label">Biaya Perbulan</label>
                      </div>
                      <div class="col">
                        <input type="text" class="form-control" id="bybulan" name="bybulan" value="<?php echo $data['bybulan'];?>"onkeypress="return hanyaAngka(event)">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-4">
                        <label class="form-label">Total Pertemuan</label>
                      </div>
                      <div class="col">
                        <input type="number" class="form-control" id="tpertemuan" name="tpertemuan" value="<?php echo $data['tpertemuan'];?>" onkeyup="hitung()">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-4">
                        <label class="form-label">Total Biaya</label>
                      </div>
                      <div class="col">
                        <input type="text" class="form-control" id="tbiaya" name="tbiaya" value="<?php echo $data['tbiaya'];?>" readonly>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="m-3">
                <div class="row">
                  <div class="col-2">
                    <label class="form-label">Keteranan Program Dan Biaya</label>
                  </div>
                  <div class="col-10">
                    <textarea class="form-control" rows="4" name="deskripsi2" required><?php echo ucwords($data['deskripsi2']);?></textarea>
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