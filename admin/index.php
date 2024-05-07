<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
if (!$_SESSION["nip"]) {
  header('location:../index.php?err=1');
  exit;
}
include("../connectdb.php");
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Dashboard - Tabler - Premium and Open Source dashboard template with responsive and high quality UI.</title>
  <link href="../dist/css/tabler.min.css?1685973381" rel="stylesheet" />
  <link href="../dist/css/tabler-flags.min.css?1685973381" rel="stylesheet" />
  <link href="../dist/css/tabler-payments.min.css?1685973381" rel="stylesheet" />
  <link href="../dist/css/tabler-vendors.min.css?1685973381" rel="stylesheet" />
  <link href="../dist/css/demo.min.css?1685973381" rel="stylesheet" />
  <script src="../dist/asset/modules/sweetalert/sweetalert.min.css"></script>
  <style>
    @import url('https://rsms.me/inter/inter.css');

    :root {
      --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
    }

    body {
      font-feature-settings: "cv03", "cv04", "cv11";
    }
  </style>
</head>

<body>
  <script src="../dist/js/demo-theme.min.js?1685973381"></script>
  <div class="page">
    <!-- Navbar -->
    <header class="navbar navbar-expand-md d-print-none">
      <div class="container-xl">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
          <a href=".">
            <img src="../static/logo.png" width="110" height="32" alt="Tabler" class="navbar-brand-image" style="height:80px;width:auto">
          </a>
        </h1>
        <div class="navbar-nav flex-row order-md-last">
          <div class="nav-item d-none d-md-flex me-3">
          </div>
          <div class="d-none d-md-flex">
            <a href="?theme=dark&q=<?php echo (isset($_GET['q'])) ? $_GET['q'] : ''; ?>" class="nav-link px-0 hide-theme-dark" title="Enable dark mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
              <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
              </svg>
            </a>
            <a href="?theme=light&q=<?php echo (isset($_GET['q'])) ? $_GET['q'] : ''; ?>" class="nav-link px-0 hide-theme-light" title="Enable light mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
              <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                <path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
              </svg>
            </a>
          </div>
          <div class="nav-item dropdown">
            <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
              <span class="avatar avatar-sm" style="background-image: url(../static/avatars/000m.jpg)"></span>
              <div class="d-none d-xl-block ps-2">
                <div><?php echo ucwords($_SESSION['nama']) ?></div>
                <div class="mt-1 small text-secondary"><?php echo ucwords($_SESSION['level']) ?></div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
              <a class="dropdown-item" onclick="confirLogOut('../logout.php')" style="cursor:pointer">Logout</a>
            </div>
          </div>
        </div>
      </div>
    </header>
    <?php include('menu.php') ?>
    <div class="page-wrapper">
      <?php
      if (!isset($_GET['q'])) {
        include('dashboard.php');
      } elseif ($_GET['q'] == 'kategori') {
        include('kategori.php');
      } elseif ($_GET['q'] == 'pegawai') {
        include('pegawai.php');
      } elseif ($_GET['q'] == 'addpegawai') {
        include('add_pegawai.php');
      } elseif ($_GET['q'] == 'ep') {
        include('edit_pegawai.php');
      } elseif ($_GET['q'] == 'user') {
        include('user.php');
      } elseif ($_GET['q'] == 'by') {
        include('byprogram.php');
      } elseif ($_GET['q'] == 'addprogram') {
        include('add_program.php');
      } elseif ($_GET['q'] == 'eby') {
        include('edit_program.php');
      } elseif ($_GET['q'] == 'siswa') {
        include('siswa.php');
      } elseif ($_GET['q'] == 'addsiswa') {
        include('add_siswa.php');
      } elseif ($_GET['q'] == 'es') {
        include('edit_siswa.php');
      } elseif ($_GET['q'] == 'pendaftar') {
        include('pendaftar.php');
      } elseif ($_GET['q'] == 'addpendaf') {
        include('add_pendaftar.php');
      } elseif ($_GET['q'] == 'lapadmin') {
        include('laporan/lapadmin.php');
      } elseif ($_GET['q'] == 'pembayaran') {
        include('pembayaran.php');
      } elseif ($_GET['q'] == 'addpembayaran') {
        include('add_pembayaran.php');
      } elseif ($_GET['q'] == 'histori') {
        include('laporan/histori.php');
      }
      ?>

      <footer class="footer footer-transparent d-print-none">
        <div class="container-xl">
          <div class="row text-center align-items-center flex-row-reverse">
            <div class="col-lg-auto ms-lg-auto">
              <ul class="list-inline list-inline-dots mb-0">
                <!-- <li class="list-inline-item"><a href="https://github.com/tabler/tabler" target="_blank" class="link-secondary" rel="noopener">Source code</a></li> -->
              </ul>
            </div>
            <div class="col-12 col-lg-auto mt-3 mt-lg-0">
              <ul class="list-inline list-inline-dots mb-0">
                <li class="list-inline-item">
                  Copyright &copy; 2023
                  <a href="." class="link-secondary">Tabler</a>.
                  All rights reserved.
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
      <?php include('editpassword.php') ?>
    </div>
  </div>

  <!-- Libs JS -->
  <!-- Tabler Core -->
  <script src="../dist/js/tabler.min.js?1685973381" defer></script>
  <script src="../dist/js/demo.min.js?1685973381" defer></script>
  <script src="../dist/asset/modules/sweetalert/sweetalert.all.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script>
    function confirLogOut(url) {
      Swal.fire({
        title: "Apakah Anda Yakin Ingin Keluar Dari Sistem",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#5A5C69",
        cancelButtonColor: "#081A51",
        confirmButtonText: "Yes",
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = url;
        }
      });
    }

    function confirmationHapusData(url) {
      Swal.fire({
        title: "Apakah Anda Yakin Ingin Menghapus Data Ini",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#5A5C69",
        cancelButtonColor: "#081A51",
        confirmButtonText: "Yes, delete it!",
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = url;
        }
      });
    }

    function myFunction() {
      var x = document.getElementById("paslama");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }

    function myFunction1() {
      var x = document.getElementById("passbaru");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }

    function GetSelectedTextValue(education) {
      var text = education.options[education.selectedIndex].innerHTML;
      var name = text.split('|')[1];
      if (name) {
        document.getElementById("namakategori").value = name;
      } else {
        document.getElementById("namakategori").value = null;
      }
    }

    function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
      if (charCode > 31 && (charCode < 48 || charCode > 57))

        return false;
      return true;
    }

    function hitung() {

      var byawal = document.getElementById("byawal").value;
      var bybulan = document.getElementById("bybulan").value;
      var tpertemuan = document.getElementById("tpertemuan").value;
      if (!tpertemuan) {
        tpertemuan = 0;
      }
      var total = parseInt(bybulan) * parseInt(tpertemuan) + parseInt(byawal);
      var tbiaya = document.getElementById("tbiaya").value = total;
      console.log(total);
    }
    $('#nisadd').change(function() {
      var tamp = $(this).val();
      if (tamp) {
        $.ajax({
          type: 'POST',
          url: 'listprogram.php',
          data: {
            tamp: tamp,
          },
          success: function(data) {
            $('#pembayaran').html(data);
          }
        });
      }
    })
    $('#kdkursus').change(function() {
      var tamp = $(this).val().split('|')[0];
      var nama_program = $(this).val().split('|')[1];
      var kategori = $(this).val().split('|')[2];

      if (tamp) {
        $.ajax({
          type: 'POST',
          url: 'get_data.php',
          data: {
            tamp: tamp,
            nama_program: nama_program,
            kategori: kategori,
          },
          success: function(data) {
            $('#detail1').show();
            $('#detail1').html(data);
          }
        });
      } else {
        $('#detail1').hide();
      }
    });
    $('#pembayaran').change(function() {
      var tamp = $(this).val().split('|')[0];
      var namaprogram = $(this).val().split('|')[1];
      var nis = $('#nisadd').val();
      if (tamp && nis) {
        $.ajax({
          type: 'POST',
          url: 'get_data2.php',
          data: {
            tamp: tamp,
            namaprogram: namaprogram,
            nis: nis,
          },
          success: function(data) {
            $('#detail1').show();
            $('#detail1').html(data);
            var islunas = $('#islunas').val();
            if (islunas == 1) {
              $('#addpembayaran').attr('disabled', 'disabled');
            } else {
              var lack = $('#kekurangan').val();
              console.log(lack);
              $('#addpembayaran').removeAttr('disabled')
              $('#tpembayaran').focus()
              $('#tpembayaran').attr({
                'min': 1,
                'max': lack,
              })
            }
          }
        });
      } else {
        $('#detail1').hide();
        $('#addpembayaran').attr('disabled', 'disabled');
      }
    });
  </script>
</body>

</html>