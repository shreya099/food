   <?php

include 'header.php';
$n1="";
$m1="";
$id='';
$p='';
if(isset($_GET['id'])>0)
{
  $id=get_safe_value($_GET['id']);
  $row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * from dilevery_boy where id='$id'"));
  //pr($row);
  $n1=$row['name'];
$m1=$row['mobile'];
$p=$row['password'];


}
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
  </head>
  <!-- Main content -->
  <body>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
      
            </div>
            
          </div>
          </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <!-- left column -->
              <div class="col-md-12">
                <!-- jquery validation -->
                <div class="card card-dark">
                  <div class="card-header">
                    <h3 class="card-title">Manage Delivery Boy</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form id="quickForm" method="post">
                    <div class="card-body">
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter name" value="<?php echo $n1 ?>">
                      </div>
                      <div class="form-group">
                        <label>Mobile</label>
                        <input type="text" name="mobile" class="form-control" placeholder="Mobile number" value="<?php echo $m1 ?>">
                      </div>
                       <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo $p ?>">
                      </div>
                      
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </div>
                  </form>
                </div>
                <!-- /.card -->
              </div>
              <!--/.col (left) -->
              <!-- right column -->
              <div class="col-md-6">
              </div>
              <!--/.col (right) -->
            </div>
            <!-- /.row -->
            </div><!-- /.container-fluid -->
          </section>
          <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <!-- /.content-wrapper -->
        <script src="plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- DataTables  & Plugins -->
        <script src="plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
        <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="plugins/jszip/jszip.min.js"></script>
        <script src="plugins/pdfmake/pdfmake.min.js"></script>
        <script src="plugins/pdfmake/vfs_fonts.js"></script>
        <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
        <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
        <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
        <!-- AdminLTE App -->
        <script src="dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="dist/js/demo.js"></script>
        <!-- Page specific script -->
        <script>
        $(function () {
        $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        });
        });
        </script>
        <?php

if(isset($_POST['submit']))
{ $msg="";

$n=get_safe_value($_POST['name']);
$m=get_safe_value($_POST['mobile']);
$p1=get_safe_value($_POST['password']);
$added_on=Date('y-m-d h:i:s');
 if($id=='')
  $sql="SELECT * from dilevery_boy where mobile='$m'";
 else
 $sql="SELECT * from dilevery_boy where mobile='$m' && $id!='$id'";

if(mysqli_num_rows(mysqli_query($conn,$sql))>0)
 echo "<script>swal( 'Category already exists','Cateory exists!','error' ).then(function() { window. location = 'delivery_boy.php'; });;</script>";
 else
 {
 if($id=='')
 mysqli_query($conn,"INSERT into dilevery_boy(name,mobile,password,status) values ('$n','$m','$p1',1)");
 else

if(mysqli_num_rows(mysqli_query($conn,"SELECT * from dilevery_boy where mobile='$m' && $id!='$id'"))>0)
 echo "<script>swal( 'This phone number already exists','Number exists!','error' ).then(function() { window. location = 'delivery_boy.php'; });;</script>";
else
mysqli_query($conn,"UPDATE dilevery_boy set name='$n',mobile='$m' where id='$id'");
 redirect('delivery_boy.php');
}
}


?>
      </body>
    </html>