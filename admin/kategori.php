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
                    Kategori Program
                </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-add" title="Tambah Kategori" data-bs-toggle="tooltip"
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
                                    <th>Nama Kategori</th>
                                    <th>Keterangan</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                //query
                                $qdata = mysqli_query($kon, "SELECT * FROM kategori_program");
                                $cek=mysqli_num_rows($qdata);
                                if ($cek == 0) {
                                    echo"
                                    <tr>
                                        <td colspan='4'>
                                            <div class='alert alert-info' role='alert'>
                                                Data Tidak Di Temukan
                                            </div>
                                        </td>
                                    <tr>";
                                }
                                while ($data = mysqli_fetch_array($qdata)) {
                                    $no++;
                                ?>
                                    <tr>
                                        <td class="text-center"><?php echo $no; ?></td>
                                        <td><?php echo ucwords($data["nmkatprgm"]); ?></td>
                                        <td><?php echo ucwords($data["ketkatprgm"]); ?></td>
                                        <td style="text-align:center;">
                                            <button type="button" class="btn btn-success"data-bs-toggle="modal"  data-bs-target="#modal-edit<?php echo $data["kdkatprgm"]; ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M19.875 6.27a2.225 2.225 0 0 1 1.125 1.948v7.284c0 .809 -.443 1.555 -1.158 1.948l-6.75 4.27a2.269 2.269 0 0 1 -2.184 0l-6.75 -4.27a2.225 2.225 0 0 1 -1.158 -1.948v-7.285c0 -.809 .443 -1.554 1.158 -1.947l6.75 -3.98a2.33 2.33 0 0 1 2.25 0l6.75 3.98h-.033z"></path><path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path></svg>Edit
                                            </button>
                                            <button onclick="confirmationHapusData('hapuskategori.php?id=<?php echo $data['kdkatprgm']; ?>')" class="btn btn-danger">
                                                Hapus
                                            </button>
                                        </td>
                                    </tr>
                                    <div class="modal modal-blur fade" id="modal-edit<?php echo $data["kdkatprgm"]; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Kategori</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="proseseditkategori.php" method="post">
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label class="form-label">Kode Program</label>
                                                            <input type="text" class="form-control" name="kdprogram" value="<?php echo $data["kdkatprgm"]; ?>" readonly>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Nama Program</label>
                                                            <input type="text" class="form-control" name="nama" value="<?php echo $data["nmkatprgm"]; ?>" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Keterangan Program</label>
                                                            <textarea class="form-control" rows="3" name="keterangan" required><?php echo $data["ketkatprgm"]; ?></textarea>
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
<?php include('add_kategori.php');


