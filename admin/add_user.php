<div class="modal modal-blur fade" id="modal-add" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Pengguna</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="prosesadduser.php" method="post">
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Nip Pegawai</label>
              <select class="form-select" name="nip" required>
                <option value="" selected>Pilih Nip Pegawai</option>
                <?php
                    $dpegawai = mysqli_query($kon,"SELECT p.nip,p.nama FROM `pegawai` p JOIN user ON p.nip != user.nip; ");
                    $cek = mysqli_num_rows($dpegawai);
                    if ($cek == 0) {
                      echo "
                          <option value=''>Setiap Pegawai Telah Memiliki User, Silahkan data Pegawai Di Menu Master Pegawai</option>
                        ";
                    }
                    while($data = mysqli_fetch_array($dpegawai)){
                      ?>
                      <option value="<?php echo $data['nip'] ?>"><?php echo $data['nip'].' | '.$data['nama']; ?></option>
                      <?php
                    }
                  ?>
              </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" class="form-control" name="usename" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Password</label>
            <textarea class="form-control" rows="3" name="password" required></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Level</label>
              <select class="form-select" name="level" required>
                <option value="user">User</option>
                <option value="admin">Admin</option>
              </select>
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