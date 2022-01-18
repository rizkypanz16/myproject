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
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="http://localhost/project/dashboard/staff">SIPK</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <div class="col-md-9"></div>
            <!-- Navbar Logout-->
            <div class="btn-group">
                <p class="text-white mt-1 lead"><?php $username = $this->session->userdata('username'); echo($username);?></p>
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
                            <a class="nav-link mt-2" href="http://localhost/project/dashboard/staff">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Data master</div>
                            <a class="nav-link mt-2" href="http://localhost/project/report/harianUser">
                                <div class="sb-nav-link-icon"><i class="fas fa-tasks"></i></div>
                                Report
                            </a>
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
                                <li class="breadcrumb-item"><a href="http://localhost/project/dashboard/staff">Beranda</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Proyek</li>
                            </ol>
                            </nav>
                        </div>
                        <div class="px-4">
                            <p class="h4">Daftar Proyek & Instansi</p>
                        </div>
                        <!-- TABLE -->
                        <div class="row">
                            <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Proyek</th>
                                            <th>Instansi</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $no = 1;
                                        foreach($data_proyek as $d){
                                        ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $d->proyek ?></td>
                                            <td><?php echo $d->instansi ?></td>
                                            <td>
                                                <?php echo anchor('report/addHarianuser/'.$d->id, '<i class="fas fa-plus-circle"></i>');?>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
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

        <!-- FONT AWESOME -->
        <script src="<?php echo base_url(); ?>assets\vendor\fontawesome\js\all.min.js"></script>
        <!-- BOOTSTRAP BUNDLE -->
        <script src="<?php echo base_url(); ?>assets/vendor/bootstrap.bundle.min.js"></script>

        <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/datatables-simple-demo.js"></script>

        <!-- Bootstrap core JavaScript-->
        <script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>

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

        <!-- CKeditor -->
        <!-- panggil ckeditor.js -->
        <script type="text/javascript" src="<?= base_url(); ?>assets/ckeditor/ckeditor.js"></script>

        <!-- panggil adapter jquery ckeditor -->
        <script type="text/javascript" src="<?= base_url(); ?>assets/ckeditor/adapters/jquery.js"></script>
        <!-- setup selector -->
        <script type="text/javascript">
            $('textarea.texteditor').ckeditor();
        </script>

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