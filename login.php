

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
   
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index2.html"><b>Admin</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <img src="https://image.freepik.com/free-vector/fast-food-advertising-composition_1284-17372.jpg" height="348px">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Log in</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="username" required="" name="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" required="" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>

          </div>

        </div>
         <!-- <div class="msg"><?php echo $msg ?></div> -->
        <div class="row">
          
          <!-- /.col -->
          <div class="col-4">
       
            <input type="submit" name="submit" class="btn btn-primary btn-block" value="log in">
          </div>
          <!-- /.col -->
        </div>
      </form>

      
     
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
<?php
session_start();
include 'database.php';
include 'fun.php';
if (isset($_POST['submit'])) {
  # code...
   $u=get_safe_value($_POST['username']);
   $p=get_safe_value($_POST['password']);
   $q="SELECT * from admin where username='$u' && password='$p'";
   $res=mysqli_query($conn,$q);
   if(mysqli_num_rows($res)>0)
   {
        $row=mysqli_fetch_assoc($res);
        $_SESSION['is_login']='yes';
        $_SESSION['name']=$row['name'];
        redirect('index.php');
   }
   else
  echo "<script>swal( 'Invalid login details!','Invalid!','error' ).then(function() { window. location = 'login.php'; });;</script>";
}
?>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
