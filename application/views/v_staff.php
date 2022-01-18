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

        <!-- Load file plugin Chart.js -->
        <script src="<?= base_url(); ?>assets/chartjs/dist/Chart.js"></script>
    </head>
    <?php
    function date_diff_custom($d1, $d2)
    {
        $d1 = (is_string($d1) ? strtotime($d1) : $d1);
        $d2 = (is_string($d2) ? strtotime($d2) : $d2);
        $diff_secs = abs($d1 - $d2);
        $base_year = min(date("Y", $d1), date("Y", $d2));
        $diff = mktime(0, 0, $diff_secs, 1, 1, $base_year);
        return array(
            "years" => date("Y", $diff) - $base_year,
            "months_total" => (date("Y", $diff) - $base_year) * 12 + date("n", $diff) - 1,
            "months" => date("n", $diff) - 1,
            "days_total" => floor($diff_secs / (3600 * 24)),
            "days" => date("j", $diff) - 1,
            "hours_total" => floor($diff_secs / 3600),
            "hours" => date("G", $diff),
            "minutes_total" => floor($diff_secs / 60),
            "minutes" => (int) date("i", $diff),
            "seconds_total" => $diff_secs,
            "seconds" => (int) date("s", $diff)
        );
    }
?>
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
            <a class="navbar-brand ps-3" href="http://localhost/project/dashboard/staff">SIPK</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <div class="col-md-9"></div>
            <div class="btn-group">
                <p class=" lead text-white mt-1"><?php $username = $this->session->userdata('username'); echo($username);?></p>
                <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <!-- <li><a class="dropdown-item" href="http://localhost/project/user/profile">Profile</a></li> -->
                            <li><hr class="dropdown-divider" /></li>
                            <li><a class="dropdown-item" href="http://localhost/project/signon/logout" onclick="return confirm('Apakah Anda benar-benar mau keluar ?')" data-toggle="modal" data-target="#exampleModal">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- Modal -->
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
                </div>
            </div>
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
                            <!-- <a class="nav-link mt-2" href="http://localhost/project/report/monthly">
                                <div class="sb-nav-link-icon"><i class="fas fa-tasks"></i></div>
                                Monthly Report
                            </a> -->
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
                        <div class="alert alert-success" role="alert">
                        <strong>Hi <?php $username = $this->session->userdata('username'); echo($username);?>!</strong> Welcome Back
                        </div>

                        <div class="row">
                            <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <div class="card mb-3">
                                        <div class="card-header">
                                            <i class="fas fa-list-ol"></i> Data Report Karyawan
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
                            </div>
                        </div>
                        <div class="container">
                                    <div class="card shadow-lg border-0 rounded-lg mt-3 mb-5">
                                        <!-- TABLE -->
                                        <div class="card-header"><strong class="h4">Report Pekerjaan  </strong><p class="lead btn btn-light btn btn-outline-dark btn-sm mt-2"><?= $this->session->userdata('username');?></p></div>
                                        <div class="card-body">
                                            <!-- ALERT -->
                                            <div class="alert alert-info col-lg-4" role="alert">
                                                <strong>  Report Pekerjaan Bulanan</strong>
                                            </div>
                                            <!-- FORM -->
                                            <div class="col-lg-12">
                                                <form class="mt-4 mb-4" action="<?php echo base_url(). 'report/detail_monthly'; ?>">
                                                    Bulan
                                                    <select name="bulan" class="btn btn-light btn btn-outline-dark">
                                                    <option value="1">Januari</option>
                                                    <option value="2">Februari</option>
                                                    <option value="3">Maret</option>
                                                    <option value="4">April</option>
                                                    <option value="5">Mei</option>
                                                    <option value="6">Juni</option>
                                                    <option value="7">Juli</option>
                                                    <option value="8">Agustus</option>
                                                    <option value="9">September</option>
                                                    <option value="10">Oktober</option>
                                                    <option value="12">November</option>
                                                    <option value="12">Desember</option>
                                                    </select>
                                                    <select name="tahun" class="btn btn-light btn btn-outline-dark">
                                                        <?php
                                                        $mulai= date('Y') - 50;
                                                        for($i = $mulai;$i<$mulai + 100;$i++){
                                                            $sel = $i == date('Y') ? ' selected="selected"' : '';
                                                            echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                    <input type="submit" class="btn btn-light btn btn-outline-dark" value="Lihat">
                                                </form>
                                            </div>
                                            
                                            <hr>
                                            
                                            <!-- ALERT -->
                                            <div class="alert alert-secondary col-lg-4" role="alert">
                                                <strong>  Report Semua Pekerjaan</strong>
                                            </div>
                                            <!-- TABLE -->
                                            <div class="col-lg-12">
                                                <div class="table-responsive">
                                                     
                                                    <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
                                                        <thead>
                                                            <tr>
                                                                <th># </th>
                                                                <th>Detail</th>
                                                                <th>Waktu</th>
                                                                <th>Deskripsi</th>
                                                                <th>Opsi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                            $no = 1;
                                                            foreach($pekerjaan as $d){
                                                            ?>
                                                            <tr style="font-size:13px;">
                                                                <td><?php echo $no++ ?></td>
                                                                <td class="col-4">
                                                                    <strong><?="&nbsp;". $d->proyek?></strong><br><?="&nbsp;". $d->instansi ?>
                                                                </td>
                                                                <td class="col-3">
                                                                    <?= "Tgl. Input : ".date('Y-m-d', strtotime($d->created_at)) ?><br>
                                                                    <?="Mulai : ". date('H:i', strtotime($d->tanggal_mulai))?><?="&ensp; Selesai : ". date('H:i', strtotime($d->tanggal_selesai)) ?>
                                                                    <?= "&ensp; Rentang Waktu : ". ((date_diff_custom($d->tanggal_mulai, $d->tanggal_selesai)['hours']) != '0' ? (date_diff_custom($d->tanggal_mulai, $d->tanggal_selesai)['hours']).' Jam ' : ''). 
                                                                    ((date_diff_custom($d->tanggal_mulai, $d->tanggal_selesai)['minutes']) != '0' ? (date_diff_custom($d->tanggal_mulai, $d->tanggal_selesai)['minutes']).' Menit' : '') ?>
                                                                </td>
                                                                <td class="col-3"><?php echo $d->deskripsi?></td>
                                                                <!-- <td class="col-2"><img width="25%" src="<?= base_url(); ?>uploads/<?= $d->gambar ?>."></td> -->
                                                                <td class="col-2">
                                                                    <a href="<?= base_url('uploads/' . $d->gambar) ?>" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
                                                                    <a href="<?= "http://localhost/project/report/download/".$d->gambar ?>" class="btn btn-sm btn-success"><i class="fa fa-download"></i></a>
                                                                </td>
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
                        <!-- <div class="px-4 pt-2 bg-success text-white border rounded">
                            <p class="lead"><strong>Hi User!</strong> Welcome Back</p>
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
        
        <!-- FONT AWESOME -->
        <script src="<?php echo base_url(); ?>assets\vendor\fontawesome\js\all.min.js"></script>

        <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
        
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
                type: 'line',
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
                            'rgba(2, 117, 216, 1)',
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
    </body>
</html>