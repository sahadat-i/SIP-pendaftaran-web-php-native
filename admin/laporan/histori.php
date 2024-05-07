<?php
$nopendaftar = $_GET['id'];
$nama        = $_GET['nm'];
$dpendaftar = mysqli_query($kon, "SELECT pd.nopendaftar,ss.nama as nama,b.tbiaya as totalbayar FROM `pendaftaran` pd JOIN siswa ss on pd.nopendaftar=ss.nopendaftar join byprogram b on pd.kdprogram=b.kdprogram where pd.nopendaftar='$nopendaftar' and b.nama='$nama'");
$pendaftar = mysqli_fetch_assoc($dpendaftar);
$namapendaftar = $pendaftar['nama'];
$totalbyar     = $pendaftar['totalbayar']
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
                    Histori Pembayaran <?php echo ucwords($namapendaftar) ?>
                </h2>
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
                                $terbayar = 0;
                                //query
                                $qdata = mysqli_query($kon, "SELECT * FROM pembayaran join detail_pembayaran on pembayaran.notransaksi=detail_pembayaran.notransaksi where pembayaran.nopendaftar='$nopendaftar' and detail_pembayaran.nama_program='$nama'");
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
                                    $no++;
                                    $nopendaf   = $data['nopendaftar'];
                                    $dsiswa     = mysqli_query($kon, "select nis,nama from siswa where nopendaftar='$nopendaf'");
                                    $siswa      = mysqli_fetch_assoc($dsiswa);

                                    // ambil kdprogram di pendaftaran
                                    $dpendaf    = mysqli_query($kon, "select kdprogram from pendaftaran where nopendaftar = '$nopendaf'");
                                    $kdprogram  = mysqli_fetch_assoc($dpendaf)['kdprogram'];
                                    // ambil nama program & kategori

                                    $dprogram   = mysqli_query($kon, "SELECT pd.kdprogram,kg.nmkatprgm as nama_kategori,pro.nama,pro.tbiaya FROM `pendaftaran` pd JOIN kategori_program kg on pd.kdprogram=kg.kdkatprgm JOIN byprogram pro on pro.kdprogram = pd.kdprogram WHERE pd.kdprogram='$kdprogram' and pro.nama='$nama'");
                                    $progam     = mysqli_fetch_assoc($dprogram);
                                    // ambil status lunas
                                    $totalbyar = $progam['tbiaya'];
                                    // $telahBayar    = mysqli_fetch_assoc($ddetailbayar);
                                    $detailbayar    = mysqli_query($kon, "SELECT * FROM pembayaran JOIN detail_pembayaran ON pembayaran.notransaksi=detail_pembayaran.notransaksi");
                                    $dbayar         = mysqli_fetch_array($detailbayar);
                                    $terbayar += $data['jumlahbayar'];
                                ?>
                                    <tr>
                                        <td class="text-center"><?php echo $no; ?></td>
                                        <td><?php echo $siswa["nis"]; ?></td>
                                        <td><?php echo ucwords($siswa["nama"]); ?></td>
                                        <td><?php echo ucwords($data["nama_program"]) ?></td>
                                        <td><?php echo ucwords($data["kategori"]) ?></td>
                                        <td><?php echo ucwords($data["tgl_bayar"]); ?></td>
                                        <td><?php echo ucwords($data["deskripsi"]); ?></td>
                                        <td><?php echo number_format(($data["jumlahbayar"]), 0, ',', '.'); ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                                <tr>
                                    <td colspan="7"> <strong>Telah Terbayar Sejumlah</strong></td>
                                    <td><strong><?php echo number_format($terbayar, 0, ',', '.') ?></strong></td>
                                </tr>
                                <tr>
                                    <td colspan="8">
                                        <div class="alert alert-<?php echo ($terbayar >= $totalbyar) ? 'primary' : 'danger' ;?>" role="alert">
                                            <?php if($terbayar >= $totalbyar):?>
                                                Program Telah Terbayar Lunas
                                            <?php else:?>
                                                Kurang Sejumlah <?php echo number_format($totalbyar - $terbayar, 0, ',', '.')?> Lagi Untuk Melunasi Program Yang Di Pilih
                                            <?php endif?>    
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>