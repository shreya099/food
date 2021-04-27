   <?php

include 'header.php';
$code1="";
$type1="";
$id='';
$value='';
$min_v='';
$expired_on='';
if(isset($_GET['id'])>0)
{
  $id=get_safe_value($_GET['id']);
  $row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * from coupon_code where id='$id'"));
  //pr($row);
  $code1=$row['coupon_code'];
$type1=$row['coupon_type'];
$value=$row['coupon_value'];
$min_v=$row['cart_min_value'];
$expired_on=$row['expired_on'];



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
                    <h3 class="card-title">Manage Coupon Code</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form id="quickForm" method="post">
                    <div class="card-body">
                      <div class="form-group">
                        <label>Coupon code</label>
                        <input type="text" name="coupon_code" class="form-control" placeholder="Enter coupon code" value="<?php echo $code1 ?>">
                      </div>
                      <div class="form-group">
                        <label>Coupon type</label>
                       <select name="coupon_type" class="form-control"> 
                        <option value="">Select type</option>
                        <?php
                         $arr=array('P'=>'Percentage','F'=>'Fixed');
                         foreach ($arr as $key => $val) {
                           # code...
                          if($key==$type1)
                          echo "<option value='".$key."'selected>".$val."</option>";
                         else
                          echo "<option value='".$key."'>".$val."</option>";
                         }
                        ?>
                       
                        
                       </select>
                      </div>
                        <div class="form-group">
                        <label>Coupon value</label>
                        <input type="text" name="coupon_value" class="form-control" placeholder="coupon value" value="<?php echo $value ?>">
                      </div>
                       
                        <div class="form-group">
                        <label>Cart min value</label>
                        <input type="text" name="cart_min_value" class="form-control" placeholder="cart min value" value="<?php echo $min_v ?>">
                      </div>
                       
                        <div class="form-group">
                        <label>Expired on</label>
                        <input type="date" name="expired_on" class="form-control" placeholder="expired on" value="<?php echo $expired_on ?>">
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
        <!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
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
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
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
$c1=get_safe_value($_POST['coupon_code']);
$t1=get_safe_value($_POST['coupon_type']);
$v=get_safe_value($_POST['coupon_value']);
$mv=get_safe_value($_POST['cart_min_value']);
$e=get_safe_value($_POST['expired_on']);

$added_on=Date('y-m-d h:i:s');
 if($id=='')
  $sql="SELECT * from coupon_code where coupon_code='$c1'";
 else
 $sql="SELECT * from coupon_code where coupon_code='$c1' && $id!='$id'";

if(mysqli_num_rows(mysqli_query($conn,$sql))>0)
 echo "<script>swal( 'Coupon code already exists','This coupon code exists!','error' ).then(function() { window. location = 'manage_coupon.php'; });;</script>";
 else
 {
 if($id=='')
 mysqli_query($conn,"INSERT into coupon_code(coupon_code,coupon_type,coupon_value,cart_min_value,expired_on,status) values ('$c1','$t1','$v','$mv','$e',1)");
 else

if(mysqli_num_rows(mysqli_query($conn,"SELECT * from coupon_code where coupon_code='$c1' && $id!='$id'"))>0)
 echo "<script>swal( 'Coupon code already exists','This coupon code exists!','error' ).then(function() { window. location = 'manage_coupon.php'; });;</script>";
else 
mysqli_query($conn,"UPDATE coupon_code set coupon_code='$c1',coupon_type='$t1',coupon_value='$v',cart_min_value='$mv',expired_on='$e' where id='$id'");
 redirect('coupon_code.php');
}
}


?>
      </body>
    </html>