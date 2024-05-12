<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from dashui.codescandy.com/dashuipro/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 04 Mar 2024 11:22:44 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Codescandy">

    <!-- Google tag (gtag.js) -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.1/css/buttons.dataTables.css">

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
                                            <h4 id="total">Laporan Pendapatan : <?php
                                                                        $total = 0; // Reset pointer
                                                                        while ($pendapatan2 = $data_pendapatan->fetch_object()) {
                                                                            $total += $pendapatan2->total_harga;
                                                                        }
                                                                        echo 'Rp.' . number_format($total, 0, ',', '.') ?></h4>
                                            <input type="month" id="start" name="start" value="<?= date("Y-m") ?>">
                                        </div>
                                        <div class="col-lg-4 col-md-6 d-flex align-items-center mt-3 mt-md-0">
                                        </div>
                                        <div class="col-lg-5 text-lg-end mt-3 mt-lg-0">
                                            <?php if ($_SESSION['login']['level'] == 'Administrator') : ?>
                                                <a class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">Tambah</a>
                                                
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">

                                    <div class="table-responsive table-card">
                                        <table class="table text-nowrap mb-0  table-centered table-hover" id="mytable">
                                            <thead class="table-light">
                                                <tr>

                                                    <th>No</th>
                                                    <th>Pendapatan</th>
                                                    <th>Tgl Transaksi</th>
                                                    <th>Pelanggan</th>
                                                    <th>Sepeda</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                $data_pendapatan->data_seek(0);
                                                while ($pendapatan = $data_pendapatan->fetch_object()) { ?>
                                                    <tr>

                                                        <td style="width: 5%;"><?= $no++ ?></td>
                                                        <td>Rp. <?= number_format($pendapatan->total_harga, 0, ',', '.') ?></td>
                                                        <td><?= $pendapatan->tgl_kembali ?></td>
                                                        <td><?= $pendapatan->nama_pelanggan ?></td>
                                                        <td><?= $pendapatan->jenis ?></td>


                                                    </tr>
                                                <?php } ?>
													
                                            </tbody>
                                        </table>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <!-- Libs JS -->

    <script src="<?= base_url('template') ?>/assets/libs/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/2.0.2/js/dataTables.min.js"></script>
    <script src="<?= base_url('template') ?>/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('template') ?>/assets/libs/feather-icons/dist/feather.min.js"></script>
    <script src="<?= base_url('template') ?>/assets/libs/simplebar/dist/simplebar.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.1/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.print.min.js"></script>
    <script>
        $(document).ready(function() {

			var totalIncome = $('#total').text().trim();
            var table = new DataTable('#mytable', {
				paging: false,
				info: false,
				dom: 'Bfrtip',
    buttons: [
        {
            extend: 'print',
            customize: function(win) {
				var totalContent = document.getElementById("total").innerHTML;
                $(win.document.body)
                    .find('table')
                    .append('<tr><td colspan="5">'+totalContent+'</td></tr>');
            }
        }
    ]
            });
			 // Function to calculate and update total income
			 function updateTotalIncome() {
				var totalIncome = 0;
    var filteredRows = table.rows({ search: 'applied' }).nodes().toArray(); // Exclude the last row
    $(filteredRows).each(function() {
        var rowData = table.row(this).data();
        // Extract numeric value from the data in column 1
        var incomeValue = parseFloat(rowData[1].replace(/\D/g, ''));
        totalIncome += incomeValue;
    });
    $('#total').text('Total Income: Rp.' + totalIncome.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
	
    }

    
 $('.dt-search').hide();
 
 var date = $('#start').val();
console.log("Date value:", date); // Check the value in the browser console
table.column(2).search(date).draw();
updateTotalIncome();
			
            $('#dt-search-0').css('margin-right', '20px');
            $('#dt-length-0').css('margin-left', '20px');
            $('#dt-length-0').css('margin-right', '10px');
            $('#mytable_info').css('margin-left', '20px');
            $('.dt-button.buttons-print').css('margin-left', '20px');
			$('.dt-button.buttons-print').css('margin-top', '10px');
            $('.dt-paging.paging_full_numbers').css('margin-right', '20px');
            $('#start').on('change', function() {
                var date = $(this).val(); // Mendapatkan nilai input month
				
                table.column(2).search(date).draw(); // Kolom ke-2 (index dimulai dari 0)
				updateTotalIncome();
            });
        });

		
    </script>


    <!-- Theme JS -->

    <script src="<?= base_url('template') ?>/assets/js/theme.min.js"></script>
    <script src="<?= base_url('template') ?>/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="<?= base_url('template') ?>/assets/js/vendors/chart.js"></script>