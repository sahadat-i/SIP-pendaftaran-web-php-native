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
                    Data Biaya Program
                </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="index.php?q=addprogram&m=a" class="btn btn-primary d-none d-sm-inline-block" title="Tambah Biaya Program" data-bs-toggle="tooltip"
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
                                    <th>Nama Program</th>
                                    <th>Kategori Program</th>
                                    <th>Detail Program</th>
                                    <th style="width: 30%;">Detail Biaya</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                //query
                                $qdata = mysqli_query($kon, "SELECT * FROM byprogram");
                                $cek = mysqli_num_rows($qdata);
                                if ($cek == 0) {
                                    echo "
                                    <tr>
                                        <td colspan='6'>
                                            <div class='alert alert-info' role='alert'>
                                                Data Tidak Di Temukan
                                            </div>
                                        </td>
                                    <tr>";
                                }
                                while ($data = mysqli_fetch_array($qdata)) {
                                    $kdprogam = $data['kdprogram'];
                                    $dkategori  =mysqli_query($kon,"select nmkatprgm from kategori_program where kdkatprgm='$kdprogam'");
                                    $nama       = mysqli_fetch_assoc($dkategori)['nmkatprgm'];
                                    $no++;
                                ?>
                                    <tr>
                                        <td class="text-center"><?php echo $no; ?></td>
                                        <td><?php echo ucwords($data["nama"]); ?></td>
                                        <td><?php echo ucwords($nama); ?></td>
                                        <td><?php echo 'Tanggal & Jam Mulai = '.$data['jadwal_kelas'].'<br> Jumlah Pertemuan = '.$data['tpertemuan'].'x' ?></td>
                                        <td>
                                            <?php echo 'Biaya Awal = '.number_format($data['byawal'], 0, ',', '.').'<br>'.'Biaya Program = '.number_format($data['bybulan'], 0, ',', '.').'<br>'.'Total Biaya = '.number_format($data['tbiaya'], 0, ',', '.')?>
                                        </td>
                                        <td style="text-align:center;">
                                            <a href="index.php?q=eby&id=<?php echo $data["id"] ?>&m=a" class="btn btn-success">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M19.875 6.27a2.225 2.225 0 0 1 1.125 1.948v7.284c0 .809 -.443 1.555 -1.158 1.948l-6.75 4.27a2.269 2.269 0 0 1 -2.184 0l-6.75 -4.27a2.225 2.225 0 0 1 -1.158 -1.948v-7.285c0 -.809 .443 -1.554 1.158 -1.947l6.75 -3.98a2.33 2.33 0 0 1 2.25 0l6.75 3.98h-.033z"></path>
                                                    <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                                                </svg>Edit
                                            </a>
                                            <button onclick="confirmationHapusData('hapusby.php?id=<?php echo $data['id']; ?>')" class="btn btn-danger">
                                                Hapus
                                            </button>
                                        </td>
                                    </tr>
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