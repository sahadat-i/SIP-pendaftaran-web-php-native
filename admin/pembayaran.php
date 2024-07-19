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
                    Data Pembayaran Administrasi
                </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="index.php?q=addpembayaran&t=a" class="btn btn-primary d-none d-sm-inline-block" title="Tambah Pembayaran" data-bs-toggle="tooltip"
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
                                    <th>NIS Siswa</th>
                                    <th>Nama Siswa</th>
                                    <th>Nama Program</th>
                                    <th>Kategori Program</th>
                                    <th>Tanggal Pembayaran</th>
                                    <th>Keterangan</th>
                                    <th>Jumlah Pembayaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                //query
                                $qdata = mysqli_query($kon, "SELECT * FROM pembayaran join detail_pembayaran on pembayaran.notransaksi=detail_pembayaran.notransaksi");
                                $cek=mysqli_num_rows($qdata);
                                if ($cek == 0) {
                                    echo"
                                    <tr>
                                        <td colspan='8'>
                                            <div class='alert alert-info' role='alert'>
                                                Data Tidak Di Temukan
                                            </div>
                                        </td>
                                    <tr>";
                                }
                                while ($data = mysqli_fetch_array($qdata)) {
                                    $no++;
                                    $nopendaf   = $data['nopendaftar'];
                                    $dsiswa     = mysqli_query($kon,"select nis,nama from siswa where nopendaftar='$nopendaf'");
                                    $siswa      = mysqli_fetch_assoc($dsiswa);

                                    // ambil kdprogram di pendaftaran
                                    $dpendaf    = mysqli_query($kon,"select kdprogram from pendaftaran where nopendaftar = '$nopendaf'");
                                    $kdprogram  = mysqli_fetch_assoc($dpendaf)['kdprogram'];
                                    // ambil nama program & kategori

                                    $dprogram   = mysqli_query($kon,"SELECT pd.kdprogram,kg.nmkatprgm as nama_kategori,pro.nama,pro.tbiaya FROM `pendaftaran` pd JOIN kategori_program kg on pd.kdprogram=kg.kdkatprgm JOIN byprogram pro on pro.kdprogram = pd.kdprogram WHERE pd.kdprogram='$kdprogram'");
                                    $progam     = mysqli_fetch_assoc($dprogram);
                                    // ambil status lunas
                                    $totalbyar = $progam['tbiaya'];
                                    // $telahBayar    = mysqli_fetch_assoc($ddetailbayar);
                                    $detailbayar    = mysqli_query($kon,"SELECT * FROM pembayaran JOIN detail_pembayaran ON pembayaran.notransaksi=detail_pembayaran.notransaksi");
                                    $dbayar         = mysqli_fetch_array($detailbayar);
                                ?>
                                    <tr>
                                        <td class="text-center"><?php echo $no; ?></td>
                                        <td><?php echo $siswa["nis"]; ?></td>
                                        <td><?php echo ucwords($siswa["nama"]); ?></td>
                                        <td><?php echo ucwords($data["nama_program"])?></td>
                                        <td><?php echo ucwords($progam["nama_kategori"])?></td>
                                        <td><?php echo ucwords($data["tgl_bayar"]); ?></td>
                                        <td><?php echo ($data['deskripsi']) ?></td>
                                        <td>
                                            <?php echo $data['jumlahbayar'] ?>
                                            <a href="laporan/kwitansi.php?id=<?php echo $data['notransaksi']?>" title="Cetak Kwitansi" target="_blank" data-bs-toggle="tooltip" data-bs-placement="bottom">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-printer" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2"></path>
                                                <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4"></path>
                                                <path d="M7 13m0 2a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2z"></path>
                                                </svg>      
                                            </a>
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


<!-- edit pembayaran -->