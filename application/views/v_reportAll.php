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

        <!-- Load file plugin Chart.js -->
        <script src="<?= base_url(); ?>assets/chartjs/dist/Chart.js"></script>
        
        <!-- FONT AWESOME -->
        <script src="<?php echo base_url(); ?>assets\vendor\fontawesome\js\all.min.js"></script>

    </head>
    <?php 
        function nama_bulan($m)
        {
            if (trim($m) != '' and $m != '0') {
                $getbulan = array();
                $getbulan[1] = 'Januari';
                $getbulan[2] = 'Februari';
                $getbulan[3] = 'Maret';
                $getbulan[4] = 'April';
                $getbulan[5] = 'Mei';
                $getbulan[6] = 'Juni';
                $getbulan[7] = 'Juli';
                $getbulan[8] = 'Agustus';
                $getbulan[9] = 'September';
                $getbulan[10] = 'Oktober';
                $getbulan[11] = 'November';
                $getbulan[12] = 'Desember';
        
                return $getbulan[(int) $m];
            }
        }
    ?>
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
                    <div class="container-fluid px-4">
                        <!-- Breadcumb -->
                        <div class="mt-2">
                            <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="http://localhost/project/dashboard/admin">Beranda</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Report</li>
                            </ol>
                            </nav>
                        </div>
                        <div class="row">
                        <!-- Card -->
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <i class="fas fa-list-ol"></i> Data Report Bulanan Seluruh Karyawan
                                </div>
                                <div class="card-body">
                                    <canvas id="myChart"></canvas>
                                        <?php
                                        //Inisialisasi nilai variabel awal
                                        $nama_jurusan= "";
                                        $jumlah=null;
                                        foreach ($data as $item)
                                        {
                                            $jur=$item->bulan;
                                            $nama_jurusan .= "'$jur'". ", ";
                                            $jum=$item->jumlah;
                                            $jumlah .= "$jum". ", ";
                                        }
                                        ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                        <div class="card mb-3">
                                <div class="card-header">
                                    <i class="fas fa-list-ol"></i> Data Report Karyawan
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th>No. </th>
                                                <th>Karyawan</th>
                                                <th></th>
                                            </tr>
                                            <?php 
                                                $no = 1;
                                                foreach($karyawan as $values){ 
                                            ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $values->nama?></td>
                                                <td><?php echo anchor('report/detail/'.$values->id_user, '<i class="fas fa-info-circle"></i>');?></td>
                                            </tr>
                                            <?php } ?>
                                        </table>
                                    </div>
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
        <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
        <script src="<?php echo base_url(); ?>assets/assets/demo/chart-bar-demo.js"></script> -->
        <script src="<?php echo base_url(); ?>assets/js/datatables-simple-demo.js"></script>

        <!-- Bootstrap core JavaScript-->
        <script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>

        <!-- BOOTSTRAP BUNDLE -->
        <script src="<?php echo base_url(); ?>assets/vendor/bootstrap.bundle.min.js"></script>

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

        <!-- CHARTJS -->
        <script>
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [
                        <?php foreach($data as $value) {
                            echo '"'.nama_bulan($value->bulan).'",';
                        }?>
                        // "Red", "Blue", "Yellow", "Green", "Purple", "Orange"
                    ],
                    datasets: [{
                        label: 'Tahun 2022',
                        data: [
                            <?php foreach($data as $value) {
                                echo '"'.$value->jumlah.'",';
                            }?>
                            // 12, 19, 3, 5, 2, 3
                        ], 
                        // backgroundColor: [
                        //     'rgba(255, 99, 132, 0.2)',
                        //     // 'rgba(54, 162, 235, 0.2)',
                        //     // 'rgba(255, 206, 86, 0.2)',
                        //     // 'rgba(75, 192, 192, 0.2)',
                        //     // 'rgba(153, 102, 255, 0.2)',
                        //     // 'rgba(255, 159, 64, 0.2)'
                        // ],
                        borderColor: [
                            // 'rgba(2, 117, 216, 1)',
                            // 'rgba(54, 162, 235, 1)',
                            // 'rgba(255, 206, 86, 1)',
                            // 'rgba(75, 192, 192, 1)',
                            // 'rgba(153, 102, 255, 1)',
                            // 'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 2
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
        </script>


        <!-- DATEPICKER -->
        <!-- Javascript Bootstrap Datepicker -->
        <script src="<?= base_url(); ?>assets/bootstrap-datepicker.js"></script>

        <!-- CSS Bootstrap Datepicker -->
        <link rel="stylesheet" href="<?= base_url(); ?>assets/bootstrap-datepicker.css">

        <script type="text/javascript">
        $('.datepicker').datepicker();
            
        </script>
        
    </body>
</html>