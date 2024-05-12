<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from dashui.codescandy.com/dashuipro/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 04 Mar 2024 11:22:44 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Codescandy">

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-M8S4MT3EYG"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-M8S4MT3EYG');
    </script>


    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('template') ?>/assets/images/favicon/favicon.ico">


    <!-- Libs CSS -->
    <link href="<?= base_url('template') ?>/assets/libs/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url('template') ?>/assets/libs/%40mdi/font/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="<?= base_url('template') ?>/assets/libs/simplebar/dist/simplebar.min.css" rel="stylesheet">



    <!-- Theme CSS -->
    <link rel="stylesheet" href="<?= base_url('template') ?>/assets/css/theme.min.css">
    <title><?= APP_NAME ?> - <?= $judul ?></title>
</head>

<body>
    <main id="main-wrapper" class="main-wrapper">

        <div class="header">
            <!-- navbar -->
            <div class="navbar-custom navbar navbar-expand-lg">
                <div class="container-fluid px-0">
                    <a class="navbar-brand d-block d-md-none" href="index.html">
                        <img src="<?= base_url('template') ?>/assets/images/brand/logo/logo-2.svg" alt="Image">
                    </a>
                    <a id="nav-toggle" href="#" class="ms-auto ms-md-0 me-0 me-lg-3 ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-text-indent-left text-muted" viewBox="0 0 16 16">
                            <path d="M2 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm.646 2.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L4.293 8 2.646 6.354a.5.5 0 0 1 0-.708zM7 6.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm-5 3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
                        </svg>
                    </a>

                    <!--Navbar nav -->
                    <ul class="navbar-nav navbar-right-wrap ms-lg-auto d-flex nav-top-wrap align-items-center ms-4 ms-lg-0">

                        <!-- List -->
                        <li class="dropdown ms-2">
                            <a class="rounded-circle" href="#" role="button" id="dropdownUser" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="avatar avatar-md avatar-indicators avatar-online">
                                    <img alt="avatar" src="<?= base_url('uploads/' . $_SESSION['login']['foto']) ?>" class="rounded-circle">
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUser">


                                <ul class="list-unstyled">

                                    
                                    <li>
                                        <a class="dropdown-item" href="<?= base_url('auth/logout') ?>">
                                            <i class="me-2 icon-xxs dropdown-item-icon" data-feather="power"></i>Logout
                                        </a>
                                    </li>
                                </ul>

                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- navbar vertical -->
        <div class="app-menu">
            <!-- Sidebar -->

            <div class="navbar-vertical navbar nav-dashboard">
                <div class="h-100" data-simplebar>
                    <!-- Brand logo -->
                    <a class="navbar-brand" href="#">
                        <h3>Menu</h3>
                    </a>
                    <!-- Navbar nav -->
                    <ul class="navbar-nav flex-column" id="sideNavbar">
                        <!-- Nav item -->
                        <li class="nav-item">
                            <a class="nav-link has-arrow " href="<?= base_url('dashboard') ?>">
                                <i data-feather="home" class="nav-icon me-2 icon-xxs">
                                </i> Dashboard
                            </a>
                        </li>
                        <!-- Nav item -->
                        <li class="nav-item">
                            <?php if ($_SESSION['login']['level'] == 'Administrator') : ?>
                                <div class="navbar-heading">Data</div>
                            <?php endif; ?>
                        </li>
                        <!-- Nav item -->
                        <?php if ($_SESSION['login']['level'] == 'Manager') : ?>
                            <li class="nav-item">

                                <a class="nav-link has-arrow " href="<?= base_url('lp_penyewaan') ?>">
                                    <i data-feather="file-text" class="nav-icon me-2 icon-xxs">
                                    </i> Laporan Penyewaan
                                </a>
                            </li>
                            <li class="nav-item">

                                <a class="nav-link has-arrow " href="<?= base_url('lp_pendapatan') ?>">
                                    <i data-feather="trending-up" class="nav-icon me-2 icon-xxs">
                                    </i> Laporan Pendapatan
                                </a>
                            </li>
                        <?php endif; ?>
                        <!-- Nav item -->
                        <li class="nav-item">
                            <?php if ($_SESSION['login']['level'] == 'Administrator') : ?>
                                <a class="nav-link has-arrow " href="<?= base_url('akun') ?>">
                                    <i data-feather="users" class="nav-icon me-2 icon-xxs">
                                    </i> Pengguna
                                </a>
                        </li>


                        <!-- Nav item -->
                        <li class="nav-item">
                            <a class="nav-link has-arrow  collapsed " href="#" data-bs-toggle="collapse" data-bs-target="#navecommerce" aria-expanded="false" aria-controls="navecommerce">
                                <i data-feather="shopping-bag" class="nav-icon me-2 icon-xxs">
                                </i> Sepeda
                            </a>

                            <div id="navecommerce" class="collapse " data-bs-parent="#sideNavbar">
                                <ul class="nav flex-column">

                                    <li class="nav-item">
                                        <a class="nav-link has-arrow " href="<?= base_url('jenis') ?>">

                                            Jenis
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link has-arrow " href="<?= base_url('sepeda') ?>">

                                            Sepeda
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        <?php endif; ?>
                        </li>
                        <!-- Nav item -->
                        <?php if ($_SESSION['login']['level'] == 'Pelanggan') : ?>
                            <li class="nav-item">
                                <a class="nav-link has-arrow " href="<?= base_url('sepeda') ?>">
                                    <i data-feather="shopping-bag" class="nav-icon me-2 icon-xxs">
                                    </i> Sewa Sepeda
                                </a>
                            </li>
                        <?php endif; ?>
                        <!-- Nav item -->
                        <?php if ($_SESSION['login']['level'] == 'Administrator') : ?>
                            <li class="nav-item">
                                <a class="nav-link has-arrow " href="<?= base_url('penyewaan') ?>">
                                    <i data-feather="inbox" class="nav-icon me-2 icon-xxs">
                                    </i> Penyewaan
                                </a>
                            </li>
                        <?php endif; ?>

                    </ul>

                </div>
            </div>

        </div>


        <!-- Page content -->
        <div id="app-content">

            <!-- Container fluid -->

            <div class="app-content-area">
                <div class="bg-primary pt-10 pb-21 mt-n6 mx-n4"></div>
                <div class="container-fluid mt-n22 ">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12">
                            <!-- Page header -->
                            <div class="d-flex justify-content-between align-items-center mb-5">
                                <div class="mb-2 mb-lg-0">
                                    <h3 class="mb-0  text-white">Dashboard <?= APP_NAME ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12">
                            <?php if ($_SESSION['login']['level'] == 'Pelanggan') : ?>
                                <div class="row row-cols-1  row-cols-xl-4 row-cols-md-2 ">
                                    <div class="col mb-5">
                                        <div class="card h-100 card-lift">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span class="text-muted fw-semi-bold ">Data Sepeda</span>
                                                    <span><i data-feather="shopping-bag" class="text-info"></i></span>
                                                </div>
                                                <div class="mt-4 mb-3 d-flex align-items-center lh-1">
                                                    <h3 class="fw-bold  mb-0"><?= $sepeda->num_rows ?></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if ($_SESSION['login']['level'] == 'Manager') : ?>
                                    <div class="row row-cols-1  row-cols-xl-4 row-cols-md-2 ">
                                        <div class="col mb-5">
                                            <div class="card h-100 card-lift">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <span class="text-muted fw-semi-bold ">Laporan Penyewaan Hari ini</span>
                                                        <span><i data-feather="file-text" class="text-info"></i></span>
                                                    </div>
                                                    <div class="mt-4 mb-3 d-flex align-items-center lh-1">
                                                      
                                                        <h3 class="fw-bold  mb-0"><?= $totalbulanini->num_rows; ?> Kali</h3>
                                                       
                                                    </div>
                                                    <a href="<?= base_url('lp_penyewaan') ?>" class="btn-link fw-semi-bold">Lihat Laporan</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-5">
                                            <div class="card h-100 card-lift">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <span class="text-muted fw-semi-bold ">Laporan Pendapatan Hari ini</span>
                                                        <span><i data-feather="trending-up" class="text-info"></i></span>

                                                    </div>
                                                    <div class="mt-4 mb-3 d-flex align-items-center lh-1">
                                                        <h3 class="fw-bold  mb-0">
                                                        <?php
                                                                        $total = 0; // Reset pointer
                                                                        while ($pendapatan2 = $totalbulanini2->fetch_object()) {
                                                                            $total += $pendapatan2->total_harga;
                                                                        }
                                                                        echo 'Rp.' . number_format($total, 0, ',', '.') ?>
                                                        </h3>
                                                       
                                                    </div>
                                                    <a href="<?= base_url('lp_pendapatan') ?>" class="btn-link fw-semi-bold">Lihat Laporan</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if ($_SESSION['login']['level'] == 'Administrator') : ?>
                                    <div class="row row-cols-1  row-cols-xl-4 row-cols-md-2 ">
                                        <div class="col mb-5">
                                            <div class="card h-100 card-lift">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <span class="text-muted fw-semi-bold ">Data Sepeda</span>
                                                        <span><i data-feather="shopping-bag" class="text-info"></i></span>
                                                    </div>
                                                    <div class="mt-4 mb-3 d-flex align-items-center lh-1">
                                                        <h3 class="fw-bold  mb-0"><?= $sepeda->num_rows ?></h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-5">
                                            <div class="card h-100 card-lift">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <span class="text-muted fw-semi-bold ">Data Penyewaan</span>
                                                        <span><i data-feather="inbox" class="text-info"></i></span>
                                                    </div>
                                                    <div class="mt-4 mb-3 d-flex align-items-center lh-1">
                                                        <h3 class="fw-bold  mb-0"><?= $penyewaan->num_rows ?></h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-5">
                                            <div class="card h-100 card-lift">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <span class="text-muted fw-semi-bold ">Data Pengguna</span>
                                                        <span><i data-feather="users" class="text-info"></i></span>
                                                    </div>
                                                    <div class="mt-4 mb-3 d-flex align-items-center lh-1">
                                                        <h3 class="fw-bold  mb-0"><?= $akun->num_rows ?></h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    </div>

                                    <!-- row  -->
                                    <div class="row ">
                                        <div class="col-lg-12 col-12 mb-5 mt-5">
                                            <div class="bg-primary rounded-3">
                                                <div class="row mb-5 ">
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <div class="p-6 d-lg-flex justify-content-between align-items-center ">
                                                            <div class="d-md-flex align-items-center">
                                                                <img src="<?= base_url('uploads/' . $_SESSION['login']['foto']) ?>" alt="<?= $akun->nama ?>" alt="Image" class="rounded-circle avatar avatar-xl">
                                                                <div class="ms-md-4 mt-3 mt-md-0 lh-1">
                                                                    <h3 class="text-white mb-0">Selamat Datang di Dashboard, <?= $_SESSION['login']['nama'] ?></h3>
                                                                    <small class="text-white"> </small>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-xl-4 col-lg-12 col-md-12 col-12 mb-5 ">

                                        </div>
                                    </div>

                                </div>
                        </div>
                    </div>
                </div>
    </main>

    <!-- Scripts -->

    <!-- Libs JS -->
    <script src="<?= base_url('template') ?>/assets/libs/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/2.0.2/js/dataTables.min.js"></script>
    <script src="<?= base_url('template') ?>/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('template') ?>/assets/libs/feather-icons/dist/feather.min.js"></script>
    <script src="<?= base_url('template') ?>/assets/libs/simplebar/dist/simplebar.min.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#mytable').DataTable();
            $('#dt-search-0').css('margin-right', '20px');
            $('#dt-length-0').css('margin-left', '20px');
            $('#dt-length-0').css('margin-right', '10px');
            $('#mytable_info').css('margin-left', '20px');
            $('.dt-paging.paging_full_numbers').css('margin-right', '20px');
        });
    </script>




    <!-- Theme JS -->
    <script src="<?= base_url('template') ?>/assets/js/theme.min.js"></script>
    <script src="<?= base_url('template') ?>/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="<?= base_url('template') ?>/assets/js/vendors/chart.js"></script>








</body>


<!-- Mirrored from dashui.codescandy.com/dashuipro/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 04 Mar 2024 11:24:56 GMT -->
y>