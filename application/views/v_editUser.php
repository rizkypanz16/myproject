<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Project</title>

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
            <a class="nav-link" href="http://localhost/project/dashboard/admin">Back</a>
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
        <li class="breadcrumb-item"><a href="http://localhost/project/user/data">User</a></li>
        <li class="breadcrumb-item active" aria-current="page">Change Profile</li>
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
                                    <div class="card-header"><h3 class="text-left font-weight-light my-2">Change User Profile</h3></div>
                                    <div class="card-body">
                                        <form action="<?php echo base_url(). 'user/editUser/'.$data->id_user; ?>" method="post">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputFirstName">Nama Lengkap <strong class="text-danger">*</strong></label>
                                                        <input class="form-control py-4" name="nama" type="text" placeholder="Masukan Nama Lengkap" value="<?= $data->nama ?>"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputFirstName">Username <strong class="text-danger">*</strong></label>
                                                        <input class="form-control py-4" name="username" type="text" placeholder="Masukan Username" value="<?= $data->username ?>"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputFirstName">Email <strong class="text-danger">*</strong></label>
                                                        <input class="form-control py-4" name="email" type="text" placeholder="Masukan Email" value="<?= $data->email?>"/>
                                                    </div>
                                                </div>
                                            </div> -->
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputFirstName">No. Hp<strong class="text-danger">*</strong></label>
                                                        <input class="form-control py-4" name="no_telp" type="text" placeholder="Masukan No. Hp" value="<?= $data->no_telp ?>"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    <label class="small mb-1" for="inputFirstName">Role<strong class="text-danger">*</strong></label>
                                                        <select name="pendidikan" class="form-select py-2 form-control" aria-label="Default select example">
                                                            <option >Select Role</option>
                                                            <option value="1" <?= $data->pendidikan == '1' ? 'selected' : '' ?>>SMA / SMK</option>
                                                            <option value="2" <?= $data->pendidikan == '2' ? 'selected' : '' ?>>S1</option>
                                                            <option value="3" <?= $data->pendidikan == '3' ? 'selected' : '' ?>>S2</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputFirstName">Alamat<strong class="text-danger">*</strong></label>
                                                        <textarea name="alamat" class="form-control" rows="3" ><?= $data->alamat ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-2 px-2">
                                                    <input type="submit" class="form-control bg-success text-light" value="Submit">    
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
</div>
<script>
  $('.datepicker').datepicker();
</script>


</body>

</html>