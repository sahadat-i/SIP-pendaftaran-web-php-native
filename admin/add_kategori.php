<?php
    // mengambil data barang dengan kode paling besar
    $query = mysqli_query($kon, "SELECT max(kdkatprgm) as kodeTerbesar FROM kategori_program");
    $data = mysqli_fetch_array($query);
    $kodeBagian = $data['kodeTerbesar'];
    $urutan = (int) substr($kodeBagian, 3, 3);
    $urutan++;
    $huruf = "KAT";
    $kodeBagian = $huruf . sprintf("%03s", $urutan)
?>
<div class="modal modal-blur fade" id="modal-add" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Kategori</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="prosesaddkategori.php" method="post">
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Kode Program</label>
            <input type="text" class="form-control" name="kdprogram" value="<?php echo $kodeBagian?>"readonly>
          </div>
          <div class="mb-3">
            <label class="form-label">Nama Program</label>
            <input type="text" class="form-control" name="nama" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Keterangan Program</label>
            <textarea class="form-control" rows="3" name="keterangan" required></textarea>
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