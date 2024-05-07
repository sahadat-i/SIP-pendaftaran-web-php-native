<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
    <title>Invoice</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">

    <style type="text/css">
        body {
            font-family: verdana, arial, sans-serif;
            font-size: 12px;
        }

        th,
        td {
            padding: 4px 4px 4px 4px;
        }

        th {
            border-top: 2px solid #333333;
            border-bottom: 2px solid #333333;
        }

        td {
            border-bottom: 1px #999999;
        }

        tfoot td {
            border-bottom-width: 0px;
            border-top: 2px solid #333333;
            padding-top: 20px;
        }
        .myButton {
            box-shadow: 0px 1px 0px 0px #f0f7fa;
            background:linear-gradient(to bottom, #33bdef 5%, #019ad2 100%);
            background-color:#33bdef;
            border-radius:6px;
            border:1px solid #057fd0;
            display:inline-block;
            cursor:pointer;
            color:#ffffff;
            font-family:Arial;
            font-size:15px;
            font-weight:bold;
            padding:6px 24px;
            text-decoration:none;
            text-shadow:0px -1px 0px #5b6178;
        }
        .myButton:hover {
            background:linear-gradient(to bottom, #019ad2 5%, #33bdef 100%);
            background-color:#019ad2;
        }
        .myButton:active {
            position:relative;
            top:1px;
        }


        /* Screen Only */
        @media screen {
            .noprint {
                display: block !important;
            }

            .noshow {
                display: none !important;
            }
        }

        /* Print Only */
        @media print {
            .noprint {
                display: none !important;
            }

            .noshow {
                display: block !important;
            }
        }

        body,
        td,
        th {
            font-size: 14px;
        }
    </style>

    <!-- start: CSS -->
    <link rel="stylesheet" href="../../assets/modules/fontawesome6.1.1/css/all.css">
</head>

<body>
    <?php
        include("../../connectdb.php");
        $notransaksi = $_GET['id'];
        $qdata = mysqli_query($kon, "SELECT * FROM pembayaran join detail_pembayaran on pembayaran.notransaksi=detail_pembayaran.notransaksi where pembayaran.notransaksi='$notransaksi'");
        $data   = mysqli_fetch_assoc($qdata);
        // cari nama pembayar
        $nopendaftar = $data['nopendaftar'];
        $dbayar     = mysqli_query($kon,"select nama from siswa where nopendaftar='$nopendaftar'");
        $nama       = mysqli_fetch_assoc($dbayar)['nama'];

        // 
        $dpendaftar = mysqli_query($kon,"SELECT byprogram.nama as namaprogram from pendaftaran join byprogram ON pendaftaran.kdprogram=byprogram.kdprogram WHERE pendaftaran.nopendaftar='$nopendaftar'");
        $dnamaprogram   = mysqli_fetch_array($dpendaftar)['namaprogram']

    ?>
    <div align="center">
        <span class="noprint"><br />
            <a href="javascript:window.print();" class="btn btn-primary  btn-sm myButton">
                <i class="fa fa-print"></i> Cetak Kwitansi
            </a>
            <br>
        </span>
        <cfoutput>
            <table width="800" cellspacing="0" border="0">
                <tr>
                    <td>
                        <h1>Kwitansi Pembayaran</h1>
                        <h4>AXELLE ENGLISH COURSE </h4>
                        <span><?php echo ucwords($dnamaprogram); ?></span>
                    </td>
                    <td style="text-align: right;">
                        <p>No. Invoice : <?php echo $data['notransaksi']; ?></p>
                        <p>Tanggal Pembayaran : <?php echo $data['tgl_bayar']; ?></p>
                        <strong>Kepada : <?php echo ucwords($nama) ?></strong>
                    </td>
                </tr>
            </table>
            <br> <br>
            <table width="900" cellspacing="0" border="1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NIS Siswa</th>
                        <th>Nama Siswa</th>
                        <th>Nama Program</th>
                        <th>Kategori Program</th>
                        <th>Keterangan</th>
                        <th>Jumlah Pembayaran</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no     = 0;
                    $tbayar = 0;
                    //query
                    $notransaksi = $_GET['id'];
                    $qdata = mysqli_query($kon, "SELECT * FROM pembayaran join detail_pembayaran on pembayaran.notransaksi=detail_pembayaran.notransaksi where pembayaran.notransaksi='$notransaksi'");
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

                        $dprogram   = mysqli_query($kon, "SELECT pd.kdprogram,kg.nmkatprgm as nama_kategori,pro.nama,pro.tbiaya FROM `pendaftaran` pd JOIN kategori_program kg on pd.kdprogram=kg.kdkatprgm JOIN byprogram pro on pro.kdprogram = pd.kdprogram WHERE pd.kdprogram='$kdprogram'");
                        $progam     = mysqli_fetch_assoc($dprogram);
                        // ambil status lunas
                        $totalbyar = $progam['tbiaya'];
                        // $telahBayar    = mysqli_fetch_assoc($ddetailbayar);
                        $detailbayar    = mysqli_query($kon, "SELECT * FROM pembayaran JOIN detail_pembayaran ON pembayaran.notransaksi=detail_pembayaran.notransaksi");
                        $dbayar         = mysqli_fetch_array($detailbayar);
                        $tbayar += $data['jumlahbayar']
                    ?>
                        <tr>
                            <td class="text-center"><?php echo $no; ?></td>
                            <td><?php echo $siswa["nis"]; ?></td>
                            <td><?php echo ucwords($siswa["nama"]); ?></td>
                            <td><?php echo ucwords($data["nama_program"]) ?></td>
                            <td><?php echo ucwords($data["kategori"]) ?></td>
                            <td><?php echo ($data['deskripsi']) ?></td>
                            <td><?php echo 'Rp '.number_format($data['jumlahbayar'], 0, ',', '.') ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="6" class="text-center">Total Pembayaran</td>

                        <td class="text-right"><?php echo "Rp " . number_format($tbayar, 0, ',', '.') ?></td>
                    </tr>
                </tfoot>
            </table>
            <br>
            <table width="900" cellspacing="0">
                <tbody>
                    <tr>
                        <td width="50%" style="text-align: center;">
                            <p style="margin-bottom: 100px;">
                                Mengetahui
                            </p>
                                Petugas
                                
                            <br>
                            (______________________________)
                        </td>
                        <td width="50%" style="text-align: center;">
                            <p style="margin-bottom: 100px;">
                                Semarang, <?php echo  date('d M Y') ?>
                            </p>
                                <?php echo ucwords($nama)?>
                            <br>
                            (______________________________)
                        </td>
                    </tr>
                </tbody>
            </table>
        </cfoutput>
    </div>
</body>

</html>