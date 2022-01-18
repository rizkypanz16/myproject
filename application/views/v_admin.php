<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>SIPK | Dashboard</title>
        <!-- CSS & Bootstrap -->
        <link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet" />

        <!-- FONT AWESOME -->
        <script src="<?php echo base_url(); ?>assets\vendor\fontawesome\js\all.min.js"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="http://localhost/project/dashboard/admin">SIPK</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <div class="col-md-9"></div>
            <div class="btn-group">
                <p class=" lead text-white mt-1"><?php $username = $this->session->userdata('username'); echo($username);?></p>
                <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <!-- <li><a class="dropdown-item" href="#!">Profile</a></li> -->
                            <li><hr class="dropdown-divider" /></li>
                            <li><a class="dropdown-item" href="http://localhost/project/signon/logout" onclick="return confirm('Apakah Anda benar-benar mau keluar ?')">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <small>
                        <div class="nav">
                            <a class="nav-link mt-2" href="http://localhost/project/dashboard/admin">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Data master</div>
                            <a class="nav-link mt-2" href="http://localhost/project/instansi">
                                <div class="sb-nav-link-icon"><i class="fas fa-tasks"></i></div>
                                Instansi
                            </a>
                            <a class="nav-link mt-2" href="http://localhost/project/proyek">
                                <div class="sb-nav-link-icon"><i class="fas fa-building"></i></div>
                                Proyek
                            </a>
                            <a class="nav-link mt-2" href="http://localhost/project/report/all">
                                <div class="sb-nav-link-icon"><i class="fas fa-briefcase"></i></div>
                                Report
                            </a>
                            <!-- USER -->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-alt"></i></div>
                                User
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="http://localhost/project/user/data">
                                        <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                        User Data
                                    </a>
                                    <a class="nav-link" href="http://localhost/project/user/register">
                                        <div class="sb-nav-link-icon"><i class="fas fa-user-plus"></i></div>
                                        Registrasi
                                    </a>
                                    <a class="nav-link" href="http://localhost/project/user/edit">
                                        <div class="sb-nav-link-icon"><i class="fas fa-user-edit"></i></div>
                                        Change Profile
                                    </a>
                                </nav>
                            </div>
            
                            <!-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-briefcase"></i></div>
                                Laporan
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a> -->
                            <!-- <div class="collapse" id="collapseLayouts2" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="http://localhost/project/report/harian">
                                        <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                                        Laporan Harian
                                    </a>
                                    <a class="nav-link" href="#">
                                        <div class="sb-nav-link-icon"><i class="fas fa-project-diagram"></i></div>
                                        Laporan Proyek
                                    </a>
                                </nav>
                            </div> -->
                        </div>
                        </small>
                    </div>
                    <div class="sb-sidenav-footer">
                        <!-- Sidebar Toggle-->
                        <!-- <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button> -->
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4 mt-4">
                        <!-- ALERT -->
                        <div class="alert alert-success" role="alert">
                            <strong>Hi <?php $username = $this->session->userdata('username'); echo($username);?>!</strong> Welcome Back
                        </div>
                        
                        <div class="row">
                            <!-- Card -->
                            <div class="col-xl-2">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <i class="fas fa-users"></i> Karyawan
                                </div>
                                <div class="card-body">
                                    <blockquote class="blockquote mb-0">
                                    <p><?php echo $user?></p>
                                    </blockquote>
                                </div>
                                </div>
                            </div>
                            <div class="col-xl-2">
                            <div class="card mb-3">
                                <div class="card-header">
                                <i class="fas fa-building"></i> Instansi
                                </div>
                                <div class="card-body">
                                    <blockquote class="blockquote mb-0">
                                    <p><?php echo $instansi?></p>
                                    </blockquote>
                                </div>
                                </div>
                            </div>
                            <div class="col-xl-2">
                            <div class="card mb-3">
                                <div class="card-header">
                                <i class="fas fa-cubes"></i> Proyek
                                </div>
                                <div class="card-body">
                                    <blockquote class="blockquote mb-0">
                                    <p><?php echo $proyek?></p>
                                    </blockquote>
                                </div>
                                </div>
                            </div>
                            <div class="col-xl-2">
                            <div class="card mb-3">
                                <div class="card-header">
                                <i class="fas fa-bookmark"></i> Task
                                </div>
                                <div class="card-body">
                                    <blockquote class="blockquote mb-0">
                                    <p><?php echo $task?></p>
                                    </blockquote>
                                </div>
                                </div>
                            </div>
                            <div class="col-xl-2">
                            <div class="card mb-3">
                                <div class="card-header">
                                <i class="fas fa-tasks"></i> Report
                                </div>
                                <div class="card-body">
                                    <blockquote class="blockquote mb-0">
                                    <p><?php echo $report?></p>
                                    </blockquote>
                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row mt-4">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Area Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Bar Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div> -->

                    </div>
                </main>
                <!-- <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer> -->
            </div>
        </div>
        <!-- BOOTSTRAP BUNDLE -->
        <script src="<?php echo base_url(); ?>assets/vendor/bootstrap.bundle.min.js"></script>
        
        <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
        <script src="<?php echo base_url(); ?>assets/assets/demo/chart-area-demo.js"></script>
        <script src="<?php echo base_url(); ?>assets/assets/demo/chart-bar-demo.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/datatables-simple-demo.js"></script>
    </body>
</html>