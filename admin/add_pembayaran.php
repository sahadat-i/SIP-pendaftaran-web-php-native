<?php
  // mengambil data barang dengan kode paling besar
  $query = mysqli_query($kon, "SELECT * FROM byprogram");
  $dbyprogram = mysqli_num_rows($query);

  $query = mysqli_query($kon, "SELECT max(notransaksi) as kodeTerbesar FROM pembayaran");
  $data = mysqli_fetch_array($query);
  $kodeBarang = $data['kodeTerbesar'];

  $urutan = (int) substr($kodeBarang, 6, 3);
  
  // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
  $urutan++;

  $huruf = "PEMBA";
  $kodeBarang = $huruf . sprintf("%03s", $urutan);

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
          Tambah Pembayaran Administrasi
        </h2>
      </div>
      <!-- Page title actions -->
      <div class="col-auto ms-auto d-print-none">
        <div class="btn-list">
          <a href="index.php?q=pembayaran&t=a" class="btn btn-primary d-none d-sm-inline-block">
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
          <form action="prosesaddpembayaran.php" method="post">
            <div class="modal-body">
              <div class="m-3">
                <div class="row">
                  <div class="col-2">
                    <label class="form-label">Tanggal Pendaftaran</label>
                  </div>
                  <div class="col-10">
                    <input type="date" class="form-control" name="tgldaftar" value="<?php echo date('Y-m-d'); ?>" readonly>
                  </div>
                </div>
              </div>
              <input type="hidden" name="notransaksi" value="<?php echo $kodeBarang?>">
              <!-- nis -->
              <div class="m-3">
                <div class="row">
                  <div class="col-2">
                    <label class="form-label">Nis</label>
                  </div>
                  <div class="col-10">
                    <select class="form-control" name="nis" id="nisadd" required>
                      <option value="">Pilih Nis Siswa</option>
                      <?php
                      $qdata = mysqli_query($kon, "SELECT * FROM `siswa`");
                      $f = mysqli_num_rows($qdata);
                      if ($f > 0) {
                        while ($f = mysqli_fetch_array($qdata)) {
                      ?>
                          <option value="<?php echo $f['nis'] ?>">
                            <?php echo $f['nis'] . ' | ' . $f['nama'] ?>
                          </option>
                        <?php
                        }
                      } else {
                        ?>
                        <option value="">
                          Data Tidak Di Temukan
                        </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>
              </div>
              <!-- program -->
              <div class="m-3">
                <div class="row">
                  <div class="col-2">
                    <label class="form-label">Pilih Program</label>
                  </div>
                  <div class="col-10">
                    <select class="form-control" name="kdprogram" id="pembayaran" required>
                      <option value="">Pilih Program</option>
                    </select>
                  </div>
                </div>
              </div>
              <div id="detail1" style="display: none;"></div>
            </div>
            <div class="modal-footer m-3">
              <a href="index.php?q=pembayaran&t=a" class="btn btn-link link-secondary" role="button">
                Cancel
              </a>
              <button type="submit" class="btn btn-primary ms-auto" id="addpembayaran" disabled>
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