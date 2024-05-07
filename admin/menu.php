<header class="navbar-expand-md">
    <div class="collapse navbar-collapse" id="navbar-menu">
        <div class="navbar">
            <div class="container-xl">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">
                            <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Home
                            </span>
                        </a>
                    </li>
                    <!-- file -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-database" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M12 6m-8 0a8 3 0 1 0 16 0a8 3 0 1 0 -16 0"></path>
                                    <path d="M4 6v6a8 3 0 0 0 16 0v-6"></path>
                                    <path d="M4 12v6a8 3 0 0 0 16 0v-6"></path>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                File
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            <div class="dropdown-menu-columns">
                                <div class="dropdown-menu-column">
                                    <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal-password" role="button">
                                        Ganti Password
                                    </a>
                                    <a class="dropdown-item"onclick="confirLogOut('../logout.php')"  role="button">
                                        Logout
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- master -->
                    <?php 
                        $dmenu = mysqli_query($kon, "SELECT * FROM menu");
                        while ($menu    = mysqli_fetch_array($dmenu)) {
                            $idmenu     = $menu['id'];
                            $submenu    = mysqli_query($kon,"select * from submenu where idmaster='$idmenu'");
                            $hassubmenu     = mysqli_num_rows($submenu);
                            ?>
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link <?php echo ($hassubmenu > 0) ? 'dropdown-toggle' : ''?>"  data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <?php echo ucwords($menu['icon'])?>
                                        </span>
                                        <span class="nav-link-title">
                                            <?php echo ucwords($menu['nama'])?>
                                        </span>
                                    </a>
                                    <!-- deteksi has sub menu -->
                                    <?php if($hassubmenu > 0):?>
                                        <div class="dropdown-menu">
                                            <div class="dropdown-menu-columns">
                                                <div class="dropdown-menu-column">
                                                    <?php 
                                                        while ($submenus = mysqli_fetch_array($submenu)) {
                                                            ?>
                                                                <a class="dropdown-item" href="index.php?q=<?php echo $submenus['url'];?>&<?php echo $submenus['aktif'];?>=a"> <?php echo ucwords($submenus['nama']);?></a>
                                                            <?php
                                                        }    
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif?>
                                </li>
                            <?php
                        }
                    ?>
                    <!-- <li class="nav-item dropdown <?php echo ($_GET['m']=='a') ? 'active' : '' ; ?>">
                        <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" /><path d="M12 12l8 -4.5" /><path d="M12 12l0 9" /><path d="M12 12l-8 -4.5" /> <path d="M16 5.25l-8 4.5" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Master Data
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            <div class="dropdown-menu-columns">
                                <div class="dropdown-menu-column">
                                    <?php if($_SESSION['level']=='admin'):?>
                                        <a class="dropdown-item" href="index.php?q=pegawai&m=a">
                                            Pegawai
                                        </a>
                                        <a class="dropdown-item" href="index.php?q=user&m=a">
                                            Pengguna (User)
                                        </a>
                                    <?php endif?>
                                        <a class="dropdown-item" href="index.php?q=siswa&m=a">
                                            Siswa
                                        </a>
                                        <?php if($_SESSION['level']=='admin'):?>
                                        <a class="dropdown-item" href="index.php?q=kategori&m=a">
                                            Kategori Program
                                        </a>
                                        <a class="dropdown-item" href="index.php?q=by&m=a">
                                            Biaya Program
                                        </a>
                                    <?php endif?>
                                </div>
                            </div>
                        </div>
                    </li> -->
                    <!-- transaksi -->
                    <!-- <li class="nav-item dropdown <?php echo ($_GET['t']=='a') ? 'active' : '' ; ?>">
                        <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M9 11l3 3l8 -8" />
                                    <path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Transaksi
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            <div class="dropdown-menu-columns">
                                <div class="dropdown-menu-column">
                                    <a class="dropdown-item" href="index.php?q=pendaftar&t=a">
                                        Pendaftaran
                                    </a>
                                    <a class="dropdown-item" href="index.php?q=pembayaran&t=a">
                                        Pembayaran Administrasi
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li> -->
                    <!-- laporan -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-report-analytics" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2"></path>
                                    <path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"></path>
                                    <path d="M9 17v-5"></path>
                                    <path d="M12 17v-1"></path>
                                    <path d="M15 17v-3"></path>
                                </svg>
                            </span>

                            <span class="nav-link-title">
                                Laporan
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            <div class="dropdown-menu-columns">
                                <div class="dropdown-menu-column">
                                    <a class="dropdown-item" href="laporan/lapSiswa.php" target="blank">
                                        Laporan Data Siswa
                                    </a>
                                    <a class="dropdown-item" href="index.php?q=lapadmin&l=a">
                                        Laporan Pembayaran Administrasi
                                    </a>
                                    <a class="dropdown-item" href="../alerts.html" style="display: none;">
                                        Laporan Bukti [Histori] Pembayaran Administrasi Siswa
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>