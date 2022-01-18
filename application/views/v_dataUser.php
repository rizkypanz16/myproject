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
        <link href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap-datepicker.css">

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
            <!-- Navbar Logout-->
            <div class="btn-group">
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
                                <div class="sb-nav-link-icon"><i class="fas fa-building"></i></div>
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
                            </a>
                            <div class="collapse" id="collapseLayouts2" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
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
                    <div class="container-fluid px-4">
                        <!-- Breadcumb -->
                        <div class="mt-2">
                            <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="http://localhost/project/dashboard/admin">Beranda</a></li>
                                <li class="breadcrumb-item active" aria-current="page">User</li>
                            </ol>
                            </nav>
                        </div>
                        <div class="px-4">
                            <p class="h4">Daftar User</p>
                        </div>
                        <!-- CARD -->
                        <div class="row">
                            <div class="text-right">
                                <a href="<?= base_url('user/register') ?>" class="btn btn-sm btn-primary btn-icon-split">
                                    <span class="icon">
                                        <i class="fa fa-plus"></i>
                                    </span>
                                    <span class="text">
                                        Registrasi
                                    </span>
                                </a>
                            </div>
                        </div>
                        <!-- TABLE -->
                        <div class="row">
                            <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th class="col-sm-4">Detail</th>
                                            <th>Kontak</th>
                                            <th>Kelamin</th>
                                            <th>Divisi</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $no = 1;
                                        foreach($user as $s){
                                        ?>
                                        <tr style="font-size: 13px;">
                                            <td><?php echo $no++ ?></td>
                                            <td>
                                                <strong><?=$s->nama  ?></strong><hr>
                                                <?="Username : ". $s->username ?><br>
                                                <?php if($s->pendidikan == 1){
                                                    echo "Pendidikan : SMA / SMK";
                                                }elseif($s->pendidikan == 2){
                                                    echo "Pendidikan : S1";
                                                }else{
                                                    echo "Pendidikan : S2";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?= "Alamat :".$s->alamat ?><hr>
                                                <?= "No Hp : ".$s->no_telp ?>
                                            </td>
                                            <td><?= $s->kelamin == '1' ? 'Pria' : 'Wanita'; ?></td>
                                            <td>
                                                <?php if($s->divisi == 1){
                                                    echo "Networking";
                                                }elseif($s->divisi == 2){
                                                    echo "Administrasi";
                                                }elseif($s->divisi == 3){
                                                    echo "Aplikasi";
                                                }else{
                                                    echo "Direksi";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php echo anchor('user/change/'.$s->id_user, '<i class="fas fa-user-edit"></i>');?>
                                            </td>
                                            <td>
                                                <a href='http://localhost/project/user/hapus/<?=$s->id_user ?>' onclick="return confirm('Apakah Anda benar-benar mau menghapusnya ?')"><i class="fas fa-user-times"></i></a>
                                                <!-- <?php echo anchor('user/hapus/'.$s->id_user, '<i class="fas fa-user-times"></i>');?> -->
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
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
        <!-- Bootstrap core JavaScript-->
        <script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>

        <!-- BOOTSTRAP BUNDLE -->
        <script src="<?php echo base_url(); ?>assets/vendor/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script> -->
        <!-- <script src="<?php echo base_url(); ?>assets/assets/demo/chart-area-demo.js"></script>
        <script src="<?php echo base_url(); ?>assets/assets/demo/chart-bar-demo.js"></script> -->
        <!-- <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script> -->
        <script src="<?php echo base_url(); ?>assets/js/datatables-simple-demo.js"></script>

        <!-- Datatable -->
        <script src="<?= base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="<?= base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="<?= base_url(); ?>assets/vendor/datatables/buttons/js/dataTables.buttons.min.js"></script>
        <script src="<?= base_url(); ?>assets/vendor/datatables/buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="<?= base_url(); ?>assets/vendor/datatables/jszip/jszip.min.js"></script>
        <script src="<?= base_url(); ?>assets/vendor/datatables/pdfmake/pdfmake.min.js"></script>
        <script src="<?= base_url(); ?>assets/vendor/datatables/pdfmake/vfs_fonts.js"></script>
        <script src="<?= base_url(); ?>assets/vendor/datatables/buttons/js/buttons.html5.min.js"></script>
        <script src="<?= base_url(); ?>assets/vendor/datatables/buttons/js/buttons.print.min.js"></script>
        <script src="<?= base_url(); ?>assets/vendor/datatables/buttons/js/buttons.colVis.min.js"></script>
        <script src="<?= base_url(); ?>assets/vendor/datatables/responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?= base_url(); ?>assets/vendor/datatables/responsive/js/responsive.bootstrap4.min.js"></script>

        <!-- Data table -->
        <script type="text/javascript">
		$(document).ready(function() {
			var table = $('#dataTable').DataTable({
				// buttons: ['copy', 'csv', 'print', 'excel', 'pdf'],
                buttons: ['print', 'excel', 'pdf'],
				dom: "<'row px-2 px-md-4 pt-2'<'col-md-3'l><'col-md-5 text-center'B><'col-md-4'f>>" +
					"<'row'<'col-md-12'tr>>" +
					"<'row px-2 px-md-4 py-3'<'col-md-5'i><'col-md-7'p>>",
				lengthMenu: [
					[5, 10, 25, 50, 100, -1],
					[5, 10, 25, 50, 100, "All"]
				],
				columnDefs: [{
					targets: -1,
					orderable: false,
					searchable: false
				}]
			});

			table.buttons().container().appendTo('#dataTable_wrapper .col-md-5:eq(0)');
		});
	    </script>
        
    </body>
</html>