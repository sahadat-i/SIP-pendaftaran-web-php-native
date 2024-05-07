<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Sign in - Sistem</title>
  <!-- CSS files -->
  <link href="dist/css/tabler.min.css?1685973381" rel="stylesheet" />
  <link href="dist/css/tabler-flags.min.css?1685973381" rel="stylesheet" />
  <link href="dist/css/tabler-payments.min.css?1685973381" rel="stylesheet" />
  <link href="dist/css/tabler-vendors.min.css?1685973381" rel="stylesheet" />
  <link href="dist/css/demo.min.css?1685973381" rel="stylesheet" />
  <style>
    @import url('https://rsms.me/inter/inter.css');

    :root {
      --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
    }

    body {
      font-feature-settings: "cv03", "cv04", "cv11";
    }
  </style>
  <link rel="stylesheet" type="text/css" href="dist/css/secret.css">
</head>

<body class=" d-flex flex-column">
  <script src="dist/js/demo-theme.min.js?1685973381"></script>
  <div class="page page-center" id="content">
    <div class="container container-tight py-4">
      <div class="text-center mb-4">
        <img src="static/logo.png" alt="Logo" class="navbar-brand-image" style="height:110px;width:auto">
      </div>
      <div class="card card-md">
        <div class="card-body">
          <h2 class="h2 text-center mb-4">Masuk Ke Akun Sistem</h2>
          <?php
          if (isset($_GET["eror"])) {

            if ($_GET["eror"] == 1) {
              echo "
									<div class='alert alert-danger alert-dismissible fade show' role='alert'>
						  				Nip atau Password Tidak Terdaftar!
									</div>
									";
            }
            if ($_GET["eror"] == 2) {
              echo "
									<div class='alert alert-info' role='alert'>
						  				Password Telah Diupdate Silahkan login Kembali
									</div>
									";
            }
            if ($_GET["eror"] == 3) {
              echo "
									<div class='alert alert-info' role='alert'>
						  				Anda sudah keluar dari sistem
									</div>
									";
            }
            if ($_GET["eror"] == 4) {
              echo "
									<div class='alert alert-warning' role='alert'>
						  				Masa trial Anda sudah habis, silahkan hubungi teknisi
									</div>
									";
            }
          }
          ?>
          <form action="logincek.php" method="post" autocomplete="off">
            <div class="mb-3">
              <label class="form-label">Username</label>
              <input type="text" class="form-control" name="nip" placeholder="Username Anda" autocomplete="off" required>
            </div>
            <div class="mb-2">
              <label class="form-label">
                Password
              </label>
              <div class="input-group input-group-flat">
                <input type="password" class="form-control" name="password" placeholder="Password Anda" autocomplete="off" required>
              </div>
            </div>
            <div class="form-footer">
              <button type="submit" class="btn btn-primary w-100" id="submit">Masuk</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php include('dist/asset/embed.php'); ?>
  <div id="preload" class="bg-box" style="display: none;">
    <?php include('dist/asset/preload.php'); ?>
  </div>

  <script src="dist/js/tabler.min.js?1685973381" defer></script>
  <script src="dist/js/demo.min.js?1685973381" defer></script>
</body>

</html>