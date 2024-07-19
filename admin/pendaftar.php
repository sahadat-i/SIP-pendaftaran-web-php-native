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
                    Data Pendaftar
                </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="index.php?q=addpendaf&t=a" class="btn btn-primary d-none d-sm-inline-block" title="Tambah Pendaftar" data-bs-toggle="tooltip"
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
                                    <th>Tanggal Pendaftaran</th>
                                    <th>Status Pembayaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                //query
                                $qdata = mysqli_query($kon, "SELECT * FROM pendaftaran");
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
                                    $nopendaf       = $data['nopendaftar'];
                                    $kdprogram      = $data['kdprogram'];
                                    $nama_program   = $data['nama_program'];
                                    $dsiswa     = mysqli_query($kon,"select nis,nama from siswa where nopendaftar='$nopendaf'");
                                    $siswa      = mysqli_fetch_assoc($dsiswa);
                                    // ambil nama program

                                    $dprogram   = mysqli_query($kon,"select * from byprogram where kdprogram='$kdprogram' and nama='$nama_program'");
                                    $progam     = mysqli_fetch_assoc($dprogram);
                                    // ambil nama kategori
                                    $dkategori   = mysqli_query($kon,"select * from kategori_program where kdkatprgm ='$kdprogram'");
                                    $kategori     = mysqli_fetch_assoc($dkategori);
                                    // ambil status lunas
                                    $totalbyar     = $progam['tbiaya'];
                                    $ddetailbayar = mysqli_query($kon,"SELECT *,SUM(detail_pembayaran.jumlahbayar) AS telahbayar FROM `pembayaran` JOIN detail_pembayaran ON pembayaran.notransaksi = detail_pembayaran.notransaksi WHERE pembayaran.nopendaftar = '$nopendaf' and detail_pembayaran.nama_program ='$nama_program'");

                                    $telahBayar    = mysqli_fetch_assoc($ddetailbayar)['telahbayar'];
                                ?>
                                    <tr>
                                        <td class="text-center"><?php echo $no; ?></td>
                                        <td><?php echo $siswa["nis"]; ?></td>
                                        <td><?php echo ucwords($siswa["nama"]); ?></td>
                                        <td><?php echo ucwords($data["nama_program"])?></td>
                                        <td><?php echo ucwords($kategori["nmkatprgm"])?></td>
                                        <td><?php echo ucwords($data["tgl_pendaftaran"]); ?></td>
                                        <td>
                                            <a href="index.php?q=histori&id=<?php echo $nopendaf?>&nm=<?php echo $data["nama_program"]?>" title="Lacak Histori Pembayaran" target="_blank" data-bs-toggle="tooltip" data-bs-placement="bottom" style="text-decoration: none;color:black">
                                                
                                                <?php echo ($telahBayar < $totalbyar) ? 'Belum Lunas' : 'Lunas'; ?>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-arrow-right" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                                    <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                                                    <path d="M9 15h6"></path>
                                                    <path d="M12.5 17.5l2.5 -2.5l-2.5 -2.5"></path>
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