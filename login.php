<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MIS Core | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
   <?php
      if(isset($_POST['login'])){
        include 'inc/inc-mis-core.php';
        include 'function/fun.php';

      $username =addslashes(trim($_POST['username']));
      $password = addslashes(trim($_POST['password']));

      // pastikan username dan password adalah berupa huruf atau angka.
      if (!ctype_alnum($username) OR !ctype_alnum($password)) {
        echo "<div class='alert alert-danger alert-dismissible'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                  <h5><i class='icon fas fa-ban'></i> Login Gagal</h5>
                 Username & Password tidak sesuai...
                </div> ";
      }
      else {
        // ambil data dari tabel user untuk pengecekan berdasarkan inputan username dan passrword
        $query = mysqli_query($conn, "SELECT u.*,a.nama_hakakses,c.nama_cabang FROM tbl_user u inner join tbl_hakakses a on u.hakakses=a.kode_hakakses
        inner join tbl_cabang c on u.id_cabang=c.id_cabang
        WHERE u.username='$username' AND u.password='$password'")
                        or die('Ada kesalahan pada query user: '.mysqli_error($conn));
        $rows  = mysqli_num_rows($query);

        // jika data ada, jalankan perintah untuk membuat session
        if ($rows > 0) {
          $data  = mysqli_fetch_assoc($query);

          session_start();
          $_SESSION['id_user']   = $data['id_user'];
          $_SESSION['id_cabang']   = $data['id_cabang'];
          $_SESSION['nama_lengkap']  = $data['nama_lengkap'];
          $_SESSION['hak_akses']  = $data['hakakses'];
          $_SESSION['nama_cabang'] = $data['nama_cabang'];
          
          
          // lalu alihkan ke halaman user
          header("Location: index.php?module=GeneralDashboard");
        }else {
         echo "<div class='alert alert-danger alert-dismissible'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                  <h5><i class='icon fas fa-ban'></i> Login Gagal</h5>
                 Username & Password tidak sesuai...
                </div> ";
        }
      }
      }
    ?>
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="index.php" class="h1"><b>MIS</b>Core</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="#" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username"  id="login-username"  placeholder="Username" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control"  id="login-password"  name="password" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <!-- <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div> -->
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="login" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

     
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
