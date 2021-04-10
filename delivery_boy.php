<?php
 
include 'header.php';
if(isset($_GET['type']) && $_GET['type']!=='' && isset($_GET['id']) && $_GET['id']>0){
$type=get_safe_value($_GET['type']);
$id=get_safe_value($_GET['id']);

if($type=='de' || $type=='a' )
{ $s=1;
	if($type=='de')
		$s=0;
	mysqli_query($conn,"UPDATE dilevery_boy SET status='$s' where id='$id'");
	//redirect('category.php');
}
}

$q="SELECT * from dilevery_boy order by id";
$res=mysqli_query($conn,$q);
 
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
        <div class="row mb-2" style="margin-bottom:13px!important">
          <div class="col-sm-6">
            <h1>Delivery Boy Table</h1>
            
          </div>

       
        </div>
        <div class="col-sm-6">
            
             <a href="manage_delivery.php"><button class="btn btn-primary">Add Delivery Boy</button></a>
          </div><br>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
             
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th width="5%">S.no</th>
                    <th width="25%">Name</th>
                    <th width="20%">Mobile no</th>
                    <th width="15%">Added on</th>
                    <th width="30%">Action</th>  
                  </tr>
                  </thead>
                  <tbody>
                  	<?php if(mysqli_num_rows($res)>0){
                   $i=1;
                   while($row=mysqli_fetch_assoc($res)){
                  		?>
                  <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $row['name'] ?>
                    </td>
                   
                    <td><?php echo $row['mobile'] ?></td>
                   <td><?php 
                   $datestr=strtotime($row['added_on']);
                    echo date('d-m-Y',$datestr); ?>
                   
                    </td> 
                   	<td>
                  <a href="manage_delivery.php?id=<?php echo $row['id']?>"><button class="btn btn-info">Edit</button></a>
                  <?php
                  if($row['status']==1) {?>
                  	 <a href="?id=<?php echo $row['id']?>&type=de"><button class="btn btn-success">Active</button></a>
                  	 <?php
                  	}else{

                  		?>
                     <a href="?id=<?php echo $row['id']?>&type=a"><button class="btn btn-warning">Deactive</button></a>

                 <?php }?>
                   
                 
                <?php $i++; }} else { ?>
                  <tr>
                 <td colspan="5">no data</td>
                  </tr>
                <?php }?>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
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
</body>
</html>
