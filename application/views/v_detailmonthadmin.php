<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SIPK | Dashboard   </title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap-datepicker.css">

  <!-- Bootstrap core JavaScript -->
  <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.slim.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap-datepicker.min.js"></script>
  
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
<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
    <div class="container">
      <a class="navbar-brand" href="http://localhost/project/dashboard/admin">SIPK</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/project/report/all"><i class="fas fa-arrow-circle-left"></i></a>
          </li>
        </ul>
    </div>
  </nav>

  <!-- alert    -->
  <div class="mt-5">
  <?php if ($this->session->flashdata("berhasil")) { ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $this->session->flashdata("berhasil"); ?>
                </div>
  <?php  } ?>

  <!-- alert    -->
  <div class="mt-5">
  <?php if ($this->session->flashdata("kosong")) { ?>
                <div class="alert alert-warning" role="alert">
                    <?php echo $this->session->flashdata("kosong"); ?>
                </div>
  <?php  } ?>

  <!-- BreadCrumb -->
  <div class="container">
    <div class="mt-5">
    <nav aria-label="breadcrumb" style="margin-top: 70px; " >
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="http://localhost/project/report/all">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page">Report Bulanan</li>
      </ol>
    </nav>
    </div>
  </div>

  <!-- Page Content -->
  <div class="container">
<div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="card shadow-lg border-0 rounded-lg mt-3 mb-5">
                                    <div class="card-header"><p class="mt-3 h5 lead"><strong>Report Bulan <?= nama_bulan($bulan)?> Tahun <?= $tahun?></strong> <?= $user->nama?></p></div>
                                    <div class="card-body">
                                        <p>Jumlah Report Bulan <?= nama_bulan($bulan)?> sebanyak <?= $jml_data->jumlah ?> Report</p>
                                        <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
                                            <thead>
                                                <tr>
                                                    <th>No. </th>
                                                    <th>Detail</th>
                                                    <th>Deskripsi</th>
                                                    <th>Opsi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                                $no = 1;
                                                $total_jam = 0;
                                                $total_menit = 0;
                                                foreach($data as $d){
                                                    $total_jam = $total_jam + date_diff_custom($d->tanggal_mulai, $d->tanggal_selesai)['hours'];
                                                    $total_menit = $total_menit + date_diff_custom($d->tanggal_mulai, $d->tanggal_selesai)['minutes'];
                                            ?>  
                                                <tr style="font-size:13px;">
                                                    <td><?php echo $no++ ?></td>
                                                    <td class="col-6">
                                                        <strong><?= "Tgl. Input : ".date('Y-m-d', strtotime($d->created_at)) ?></strong><hr><?="Mulai : ". date('H:i', strtotime($d->tanggal_mulai))?><?="&ensp; Selesai : ". date('H:i', strtotime($d->tanggal_selesai)) ?>
                                                        <?= "&ensp; Rentang Waktu : ". ((date_diff_custom($d->tanggal_mulai, $d->tanggal_selesai)['hours']) != '0' ? (date_diff_custom($d->tanggal_mulai, $d->tanggal_selesai)['hours']).' Jam ' : ''). 
                                                        ((date_diff_custom($d->tanggal_mulai, $d->tanggal_selesai)['minutes']) != '0' ? (date_diff_custom($d->tanggal_mulai, $d->tanggal_selesai)['minutes']).' Menit' : '') ?>
                                                    </td>
                                                    <td class="col-4"><?php echo $d->deskripsi?></td>
                                                    <!-- <td class="col-2"><img width="25%" src="<?= base_url(); ?>uploads/<?= $d->gambar ?>."></td> -->
                                                    <td class="col-2">
                                                        <a href="<?= base_url('uploads/' . $d->gambar) ?>" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
                                                        <a href="<?= "http://localhost/project/report/download/".$d->gambar ?>" class="btn btn-sm btn-success"><i class="fa fa-download"></i></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                        <p><strong>Total Jam Kerja : <?= $total_jam?> Jam <?= $total_menit?> Menit</strong></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
</div>
<script>
  $('.datepicker').datepicker();
</script>

</script>
<!-- BOOTSTRAP BUNDLE -->
<script src="<?php echo base_url(); ?>assets/vendor/bootstrap.bundle.min.js"></script>
        
<!-- FONT AWESOME -->
<script src="<?php echo base_url(); ?>assets\vendor\fontawesome\js\all.min.js"></script>

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