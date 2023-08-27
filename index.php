<!DOCTYPE html>
<html lang="en">

<head>

  <title>Pemantauan Kolam Ikan</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      setInterval(function() {
        $("#suhu").load('ceksuhu.php');
        $("#ketinggian").load('cekketinggian.php');
        $("#cekph").load('cekph.php'); // Mengambil data pH dari cekph.php
        $("#ceksuhu").load('ceksuhu.php');
        $("#ketsuhu").load('ketsuhu.php');
        $("#cekketinggian").load('cekketinggian.php');
        $("#ket").load('ketketinggian.php');
        $("#ketph").load('ketph.php'); // Mengambil keterangan pH dari ketph.php
        $("#tabelsensor").load('tabelsensor.php');
      }, 2000);
    });
  </script>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>
<style>
  .tengah {
    width: 50%;
    margin: 0 auto;
  }
</style>

<body class="hold-transition sidebar-mini layout-fixed">

  <?php
  session_start();
  if ($_SESSION['status'] != "login") {
    header("location:login.php?pesan=belum_login");
  }
  ?>


  <div class="wrapper">

    <!-- Preloader -->
    <!--div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60"> 
    </div> -->

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>


      </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <a class="brand-link">
        <img src="dist/img/logo.png" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light" style="font-size: 17px;">Pemantauan Kolam Ikan</span>
      </a>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Home</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="data.php?cari=" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Data Pemantauan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
  </div>
  </aside>


  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="text-center">
          <div class="col">
            <h1>Pemantauan Kolam Ikan</h1><br><br>
          </div>
        </div>
      </div>

      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-2 col-6">
            </div>
            <div class="col-lg-3 col-6">
              <div class="small-box bg-info">
                <div class="inner">
                  <p style="font-size: 25px;">Ketinggian</p>
                  <h3 style="font-size: 50px;"> <span id="cekketinggian"></span> cm</h3>
                  <h3 style="font-size: 20px;" id="ket"> </h3>
                </div>
                <div class="icon">
                  <i class="fas fa-water"></i>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-6">
              <div class="small-box bg-info">
                <div class="inner">
                  <p style="font-size: 25px;">Suhu</p>
                  <h3 style="font-size: 50px;"><span id="ceksuhu"></span> <b style="font-size: 45px;"> ℃</b></h3>
                  <h3 style="font-size: 20px;"><span id="ketsuhu"></span> </h3>
                </div>
                <div class="icon">
                  <i class="fas fa-thermometer-three-quarters"></i>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="small-box bg-info">
                <div class="inner">
                  <p style="font-size: 25px;">pH</p>
                  <h3 style="font-size: 50px;"><span id="cekph"></span></h3>
                  <h3 style="font-size: 20px;"><span id="ketph"></span></h3>
                </div>
                <div class="icon">
                  <i class="fas fa-flask"></i>
                </div>
              </div>
            </div>
            <!-- <?php include 'tabelsensor.php' ?> -->
            <div class="col-sm-3 col-6">
            </div>
            <div class="col-lg-6 col-6">
              <div class="card">
                <div class="card-header">
                  <div>
                    <h3 class="card-title">Data Rata-rata Pemantauan Kolam Ikan per Hari</h3>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Suhu</th>
                        <th>Ketinggian</th>
                        <th>pH</th> <!-- Menambahkan kolom pH -->
                        <th>Waktu</th>
                      </tr>
                    </thead>
                    <tbody id="tabelsensor">

                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                  <ul class="pagination pagination-sm m-0 float-right">
                    <li class="page-item"><a class="page-link" href="#">«</a></li>
                  </ul>
                </div>
              </div>

            </div>
          </div>
      </section>
    </div>

  </div>



</body>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summsernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
</html>
