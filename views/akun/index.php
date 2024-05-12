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

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.min.css">
    


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
                    <a class="navbar-brand d-block d-md-none" href="<?= base_url('dashboard') ?>">
                        <img src="<?= base_url('template') ?>/assets/images/brand/logo/logo-2.svg" alt="Image">
                    </a>
                    <a id="nav-toggle" href="#" class="ms-auto ms-md-0 me-0 me-lg-3 ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-text-indent-left text-muted" viewBox="0 0 16 16">
                            <path d="M2 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm.646 2.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L4.293 8 2.646 6.354a.5.5 0 0 1 0-.708zM7 6.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm-5 3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
                        </svg></a>
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
                        <li class="nav-item">

                            <a class="nav-link has-arrow " href="<?= base_url('penyewaan') ?>">
                                <i data-feather="inbox" class="nav-icon me-2 icon-xxs">
                                </i> Penyewaan
                            </a>
                        </li>

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
                            <div class="mb-5">


                            </div>
                        </div>
                    </div>

                    <!-- row -->
                    <div class="row">
                        <div class="col-12">
                            <!-- card -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-6">
                                            
                                        </div>
                                        <div class="col-lg-4 col-md-6 d-flex align-items-center mt-3 mt-md-0">
                                        </div>
                                        <div class="col-lg-5 text-lg-end mt-3 mt-lg-0">
                                            <a class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">Tambah</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive table-card">
                                        <table class="table text-nowrap mb-0  table-centered table-hover" id="mytable">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Alamat</th>
                                                    <th>No Telp</th>
                                                    <th>level</th>
                                                    <th>Foto</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $logged_in_user_id = $_SESSION['login']['id']; // Ambil ID akun yang sedang login

                                                // Loop pertama untuk menampilkan data akun dalam tabel
                                                while ($akun = $data_akun->fetch_object()) :
                                                    if ($akun->id != $logged_in_user_id) : // Periksa apakah akun yang sedang diproses bukan akun yang sedang login
                                                ?>
                                                        <tr>
                                                            <td><?= $no++ ?></td>
                                                            <td><?= $akun->nama ?></td>
                                                            <td><?= $akun->alamat ?></td>
                                                            <td><?= $akun->no_telp ?></td>
                                                            <td><?= $akun->level ?></td>
                                                            <td><img src="<?= base_url('uploads/' . $akun->foto) ?>" alt="" class="img-4by3-sm rounded-3"></td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <a class="btn btn-icon btn-sm btn-ghost rounded-circle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <i data-feather="more-vertical" class="icon-xs"></i>
                                                                    </a>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item d-flex align-items-center" href="<?= base_url('akun/hapus/' . $akun->id) ?>">Hapus</a></li>
                                                                        <li>
                                                                            <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#exampleModalEdit-<?= $akun->id ?>">Edit</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModalEdit-<?= $akun->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalCenterTitle">Edit Data Pengguna</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <!-- Form untuk mengubah data akun -->
                                                                        <form method="POST" action="<?= base_url('akun/proses_ubah/' . $akun->id) ?>" enctype="multipart/form-data">
                                                                            <div class="mb-3">
                                                                                <label for="nama" class="form-label">Nama</label>
                                                                                <input type="text" value="<?= $akun->nama ?>" name="nama" id="nama" required="required" autocomplete="off" class="form-control">
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="alamat" class="form-label">Alamat</label>
                                                                                <textarea name="alamat" id="alamat" required="required" autocomplete="off" class="form-control"><?= $akun->alamat ?></textarea>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="no_telp" class="form-label">No Telp</label>
                                                                                <input type="number" value="<?= $akun->no_telp ?>" name="no_telp" id="no_telp" required="required" autocomplete="off" class="form-control">
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="username" class="form-label">Username</label>
                                                                                <input type="text" value="<?= $akun->username ?>" class="form-control" id="username" name="username">
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="password" class="form-label">Password</label>
                                                                                <input type="password" class="form-control" id="password" name="password">
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="password2" class="form-label">Konfirmasi Password</label>
                                                                                <input type="password" class="form-control" id="password2" name="password2">
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="foto" class="form-label">Foto</label>
                                                                                <input type="file" name="foto" id="foto" autocomplete="off" class="form-control-file">
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="level" class="form-label">level</label>
                                                                                <select name="level" id="level" class="form-select">
                                                                                    <option value="Pelanggan" <?= ($akun->level == 'Pelanggan') ? 'selected' : '' ?>>Pelanggan</option>
                                                                                    <option value="Manager" <?= ($akun->level == 'Manager') ? 'selected' : '' ?>>Manager</option>
                                                                                    <option value="Administrator" <?= ($akun->level == 'Administrator') ? 'selected' : '' ?>>Administrator</option>
                                                                                </select>

                                                                            </div>
                                                                            <!-- Tombol Simpan -->
                                                                            <div class="modal-footer">
                                                                                <button type="submit" class="btn btn-primary" name="tambah">Simpan</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                <?php
                                                    endif;
                                                endwhile;
                                                ?>
                                            </tbody>



                                        </table>
                                    </div>
                                </div>
                                <div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data Pengguna</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Form untuk menambahkan akun -->
                                                    <form action="<?= base_url('akun/tambah') ?>" method="POST" enctype="multipart/form-data">
                                                        <div class="mb-3">
                                                            <label for="nama" class="form-label">Nama</label>
                                                            <input type="text" class="form-control" id="nama" name="nama" required="required">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="alamat" class="form-label">Alamat</label>
                                                            <textarea name="alamat" id="alamat" required="required" autocomplete="off" class="form-control"></textarea>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="no_telp" class="form-label">No Telp</label>
                                                            <input type="number" class="form-control" id="no_telp" name="no_telp" required="required">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="username" class="form-label">Username</label>
                                                            <input type="text" class="form-control" id="username" name="username" required="required">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="password" class="form-label">Password</label>
                                                            <input type="password" class="form-control" id="password" name="password" required="required">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="password2" class="form-label">Konfirmasi Password</label>
                                                            <input type="password" class="form-control" id="password2" name="password2" required="required">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="foto" class="form-label">Foto</label>
                                                            <input type="file" class="form-control" id="foto" name="foto" required="required">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="level" class="form-label">Level</label>
                                                            <select name="level" id="level" class="form-select" required="required">
                                                                <option value="Administrator">Administrator</option>
                                                                <option value="Manager">Manager</option>
                                                                <option value="Pelanggan">Pelanggan</option>
                                                            </select>

                                                        </div>
                                                        <!-- Tombol Simpan -->
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary" name="tambah">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

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
    <script src="<?= base_url('template') ?>/assets/libs/simplebar/dist/simplebar.min.js"></script><script>
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