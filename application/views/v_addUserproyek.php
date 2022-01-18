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
            <a class="nav-link" href="http://localhost/project/proyek"><i class="fas fa-arrow-circle-left"></i></a>
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
        <li class="breadcrumb-item"><a href="http://localhost/project/dashboard/admin">Beranda</a></li>
        <li class="breadcrumb-item"><a href="http://localhost/project/proyek">Proyek</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Tenaga Ahli</li>
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
                                    <div class="card-header"><h3 class="text-left font-weight-light my-2">Tambah Tenaga Ahli </h3></div>
                                    <div class="card-body">
                                        <form action="<?php echo base_url(). 'proyek/addUser'; ?>" method="post">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                <input class="form-control py-4" name="id_proyek" type="hidden"  value="<?= $detail->id_proyek ?>" readonly="true"/>
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputFirstName">Nama Proyek <strong class="text-danger">*</strong></label>
                                                        <input class="form-control py-4" name="proyek" type="text" placeholder="Masukan Nama Proyek" value="<?= $detail->proyek ?>" readonly="true"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputFirstName">Nama Instansi <strong class="text-danger">*</strong></label>
                                                        <select name="instansi" class="form-select py-2 form-control" aria-label="Default select example" disabled="true">
                                                            <option selected>Select Instansi</option>
                                                            <?php foreach($instansi as $value) {
                                                              echo '<option value="'.$value->id_instansi.'" '.($value->id_instansi == $detail->id_instansi ? 'selected' : '').' >'.$value->instansi.'</option>';
                                                            } ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputFirstName">Nama User <strong class="text-danger">*</strong></label>
                                                        <select name="user" class="form-select py-2 form-control" aria-label="Default select example">
                                                            <option selected>Pilih Tenaga Ahli</option>
                                                            <?php foreach($user as $value) {
                                                              echo '<option value="'.$value->id_user.'">'.$value->nama.'</option>';
                                                            } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-2 px-2">
                                                    <!-- <input type="submit" class="form-control bg-success text-light" value="<i class="fas fa-plus-circle"></i>Tambah">     -->
                                                    <!-- <input type="submit" class="form-control bg-success text-light" value="<i class="fas fa-plus-circle"></i>Tambah">     -->
                                                    <button type="submit" class="btn btn-success mb-4">
                                                      <i class="fas fa-plus-circle"></i> Tambah 
                                                  </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
      <!-- TABLE -->
      <div class="row">
        <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-striped w-100 dt-responsive nowrap mb-4" id="dataTable">
                <thead>
                    <tr style="font-size:14px;">
                        <th>#</th>
                        <th>Proyek</th>
                        <th>Tenaga Ahli</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $no = 1;
                    foreach($user_proyek as $u){
                    ?>
                    <tr style="font-size:13px;">
                        <td><?php echo $no++ ?></td>
                        <td>
                          <strong><?= $u->proyek ?></strong><hr>
                          <?= "Instansi : ".$u->instansi?>
                        </td>
                        <td><strong><?= $u->nama ?></strong></td>
                        <td>
                          <a href="http://localhost/project/proyek/tambah_task/<?= $u->id?>" class="btn btn-xs btn-success"><i class="fas fa-plus-circle"></i> task</a>
                          <a href="http://localhost/project/proyek/hapus_user_proyek/<?= $u->id?>" onclick="return confirm('Apakah Anda benar-benar mau menghapusnya ?')" class="btn btn-xs btn-danger"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>

<script>
  $('.datepicker').datepicker();
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