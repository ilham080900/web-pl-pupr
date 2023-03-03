<?php

require 'function.php';

if ( isset($_POST["register"])){

  if ( registrasi($_POST) > 0){
    echo "<script>
            alert('user baru berhasil dibuat');
          </script>";
          header("Location: login.php");
  } else {
  echo mysqli_error($conn);
}
}



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>PUPR Kab. Bogor</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet" />
  </head>

  <body class="bg-gradient-success">
    <div class="container">
      <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-6 col-md-6">
      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg-12">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Buat Akun Baru!</h1>
                </div>

                <form class="user" action="" method="POST">
                <div class="modal-body">

                  <div class="form-group row">
                    <div class="col mb-3 mb-sm-0">
                    <input type="text" name="username" class="form-control form-control-user" placeholder="Username" />
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="email" name="email" class="form-control form-control-user" placeholder="Email Address" />
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input type="password" name="password" class="form-control form-control-user" placeholder="Password" />
                    </div>
                    <div class="col-sm-6">
                      <input type="password" name="confirmpassword" class="form-control form-control-user" placeholder="Repeat Password" />
                    </div>
                  </div>
                  <button type="submit" name="register" class="btn btn-success btn-user btn-block"> Daftar Akun Baru </button>

                  <hr />
                  <a href="https://accounts.google.com/" class="btn btn-google btn-user btn-block"> <i class="fab fa-google fa-fw"></i> Masuk Dengan Google </a>
                  <a href="https://m.facebook.com/login/" class="btn btn-facebook btn-user btn-block"> <i class="fab fa-facebook-f fa-fw"></i> Masuk Dengan Facebook </a>
                </div>
                </form>
                
                <hr />
                <div class="text-center">
                  <a class="small" href="forgot-password.html">Lupa Password?</a>
                </div>
                <div class="text-center">
                  <a class="small" href="login.html">Sudah Punya Akun? Masuk!</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
  </body>
</html>
