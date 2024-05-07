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
          Tambah Biaya Program
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
          <form action="prosesaddprogram.php" method="post">
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
                        <option value="<?php echo $f['kdkatprgm']?>"><?php echo $f['kdkatprgm'] . ' | ' . ucwords($f['nmkatprgm']); ?></option>
                      <?php
                      }
                      ?>
                    </select>
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
                        <input type="text" class="form-control" id="namakategori" name="namakategori" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="row">
                      <div class="col-4">
                        <label class="form-label">Tanggal & Jam Mulai</label>
                      </div>
                      <div class="col">
                        <input type="date" class="form-control" name="tanggal" required>
                      </div>
                      <div class="col">
                        <select class="form-select" name="jam" required>
                          <option value="">Pilih Jam Mulai</option>
                          <option value="14.00 - 15.45">14.00 - 15.45</option>
                          <option value="16.00 - 17.45">16.00 - 17.45</option>
                          <option value="18.30 - 20.00">18.30 - 20.00</option>
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
                    <input type="text" class="form-control" name="namaprogram" required>
                  </div>
                </div>
              </div>
              <div class="m-3">
                <div class="row">
                  <div class="col-2">
                    <label class="form-label">Deskripsi Program</label>
                  </div>
                  <div class="col-10">
                    <textarea class="form-control" rows="4" name="deskripsi" required></textarea>
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
                        <input type="text" class="form-control" id="byawal" name="byawal" onkeypress="return hanyaAngka(event)">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-4">
                        <label class="form-label">Biaya Per Pertemuan</label>
                      </div>
                      <div class="col">
                        <input type="text" class="form-control" id="bybulan" name="bybulan" onkeypress="return hanyaAngka(event)">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-4">
                        <label class="form-label">Total Pertemuan</label>
                      </div>
                      <div class="col">
                        <input type="number" class="form-control" id="tpertemuan" name="tpertemuan" onkeyup="hitung()">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-4">
                        <label class="form-label">Total Biaya</label>
                      </div>
                      <div class="col">
                        <input type="text" class="form-control" id="tbiaya" name="tbiaya" readonly>
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
                    <textarea class="form-control" rows="4" name="deskripsi2" required></textarea>
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