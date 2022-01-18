<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SIPK | Login</title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark" >
    <div class="container">
      <a class="navbar-brand" href="http://localhost/project">SIPK - <small>Sistem Informasi Pelaporan Kinerja</small></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </nav>

  <!-- Page Content -->

  <!-- alert    -->
  <div class="mt-5">
  <?php if ($this->session->flashdata("msg")) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $this->session->flashdata("msg"); ?>
                </div>
  <?php  } ?>
  
  </div>
  
  <div class="container">
      <div class="row">
        <div class="col-md-12 mt-3">
        <nav aria-label="breadcrumb" style="margin-top: 10px;">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="http://localhost/project">Beranda</a></li>
            <li class="breadcrumb-item active" aria-current="page">Login</li>
          </ol>
        </nav>
        </div>
      </div>
    </div>
  
  <!-- form login-->
  <div class="container">
    <div class="row justify-content-start">
        <div class="col-md-8">
            <!-- <div class="jumbotron pt-4 pb-4">
            </div> -->
            <img class="card-img-top" width="70%" src="<?php echo base_url(); ?>assets/img/work1.jpg" alt="Project">
        </div>
        <div class="col-md-4">
            <div class="card bg-light shadow-lg border-0 rounded-lg">
                <div class="card-header py-3"><h3 class="text-center font-weight-light">Login</h3></div>
                <div class="card-body">
                    <form action="<?php echo site_url('signon/auth');?>" method="post">
                        <div class="form-group">
                            <label class="small mb-1 mt-4" for="username">Username</label>
                            <input class="form-control py-2" name="username" type="text" placeholder="Masukan Username" />
                        </div>
                        <div class="form-group mt-4">
                            <label class="small mb-1" for="password">PIN</label>
                            <input class="form-control py-2" name="password" type="password" placeholder="Masukan PIN" />
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between mt-1 mb-0">
                            <div class="container">
                                <div class="row mt-2">
                                    <div class="col-md-9"></div>
                                    <div class="col-md-1"></div>
                                    <div class="my-1">
                                        <input class="form-control" type="submit" value="Login">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <!-- <a href="http://localhost/project/signon/register">Daftar</a> -->
                    <div class="py-1 my-2 text-muted">Copyright © 2021</div>
                </div>
            </div>
        </div>
    </div>
</div>


  <!-- Bootstrap core JavaScript -->
  <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.slim.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>