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
                    Data User
                </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-add" title="Tambah User" data-bs-toggle="tooltip"
		   data-bs-placement="bottom">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
                        Tambah
                    </a>
                    <a href="#" class="btn btn-primary d-sm-none btn-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
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
                    <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap datatable">
                            <thead>
                                <tr>
                                    <th class="w-1">
                                        No.
                                    </th>
                                    <th>Nama Pengguna</th>
                                    <th>Level</th>
                                    <th class="text-center">Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                //query
                                $qdata = mysqli_query($kon, "SELECT * FROM user");
                                $cek = mysqli_num_rows($qdata);
                                if ($cek == 0) {
                                    echo "
                                    <tr>
                                        <td colspan='4'>
                                            <div class='alert alert-info' role='alert'>
                                                Data Tidak Di Temukan
                                            </div>
                                        </td>
                                    <tr>";
                                }
                                while ($data = mysqli_fetch_array($qdata)) {
                                    $nip        = $data['nip'];
                                    $dpegawai   = mysqli_query($kon, "SELECT nama FROM pegawai where nip='$nip'");
                                    $nama       = mysqli_fetch_assoc($dpegawai)['nama'];
                                    $no++;
                                ?>
                                    <tr>
                                        <td class="text-center"><?php echo $no; ?></td>
                                        <td><?php echo $nama; ?></td>
                                        <td><?php echo ucwords($data["level"]); ?></td>
                                        <td style="text-align:center;">
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal-edit<?php echo $data["id"]; ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M19.875 6.27a2.225 2.225 0 0 1 1.125 1.948v7.284c0 .809 -.443 1.555 -1.158 1.948l-6.75 4.27a2.269 2.269 0 0 1 -2.184 0l-6.75 -4.27a2.225 2.225 0 0 1 -1.158 -1.948v-7.285c0 -.809 .443 -1.554 1.158 -1.947l6.75 -3.98a2.33 2.33 0 0 1 2.25 0l6.75 3.98h-.033z"></path>
                                                    <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                                                </svg>Edit
                                            </button>
                                            <?php if($nip != $_SESSION['nip']): ?>
                                                <button onclick="confirmationHapusData('hapususer.php?id=<?php echo $data['id']; ?>')" class="btn btn-danger">
                                                    Hapus
                                                </button>
                                            <?php endif ?>
                                        </td>
                                    </tr>
                                    <div class="modal modal-blur fade" id="modal-edit<?php echo $data["id"]; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit User</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="prosesedituser.php" method="post">
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label class="form-label">Nip Pegawai</label>
                                                            <select class="form-select" name="nip" readoly>
                                                                <option value="">Nip User</option>
                                                                <option value="<?php echo $data["nip"] ?>" selected ><?php echo $data['nip']; ?></option>
                                                            </select>
                                                            <input type="hidden" name="id" value="<?php echo $data['id'];?>">
                                                            <input type="hidden" name="id_login" value="<?php echo $_SESSION["nip"]?>">
                                                            <input type="hidden" name="edit" value="0">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Username</label>
                                                            <input type="text" class="form-control" name="username" value="<?php echo $data['username'];?>" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Password</label>
                                                            <textarea class="form-control" rows="3" name="password"></textarea>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Level</label>
                                                            <select class="form-select" name="level" required>
                                                                <option value="user" <?php echo ($data['level'] != 'admin') ? 'selected' : '' ;?>>User</option>
                                                                <option value="admin" <?php echo ($data['level'] == 'admin') ? 'selected' : '' ;?>>Admin</option>
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
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal -->
<?php include('add_user.php');
