<?php
include 'header.php';
$id1="";
$d1="";
$i='';
$dd='';
$id='';
if(isset($_GET['id'])>0)
{
$id=get_safe_value($_GET['id']);
$row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * from dish where id='$id'"));
//pr($row);
$id1=$row['category_id'];
$d1=$row['dish'];
$i=$row['image'];
$dd=$row['dish_detail'];
}
if(isset($_GET['dish_detail_id']))
{
  $dish_detail_id=get_safe_value($_GET['dish_detail_id']);
  $id=get_safe_value($_GET['id']);
  mysqli_query($conn,"delete from dish_detail where id='$dish_detail_id'");
  redirect('manage_dish1.php?id='.$id);
}
$res_category=mysqli_query($conn,"select * from category where status='1' order by category asc");
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
    <style>
  .mt{
    margin-top:8px;
  }
    </style>
  
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
                    <h3 class="card-title">Manage Dish</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form id="quickForm" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                      <div class="form-group">
                        <label>Category</label>
                        <select name="category_id">
                          <option>Select category</option>
                          <?php
                          while($res1=mysqli_fetch_assoc($res_category))
                          {  if($res1['id']==$category_id)
                          echo "<option value='".$res1['id']."' selected>".$res1['category']."</option>";
                          else
                          echo "<option value='".$res1['id']."'>".$res1['category']."</option>";
                          }
                          ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Dish</label>
                        <input type="text" name="dish" class="form-control" placeholder="Enter dish" value="<?php echo $d1 ?>">
                      </div>
                      <div class="form-group">
                        <label>Dish Details</label>
                        <input type="text" name="dish_detail" class="form-control" placeholder="Enter Dish Details" value="<?php echo $dd ?>">
                      </div>
                      <div class="form-group">
                        <label>Dish Image</label>
                        <input type="file" name="image" class="form-control" placeholder="dish image">
                      </div>
                      <div class="form-group" id="dish_box1">
                        <label>Dish Attributes</label>
                        <?php 
                        $dish_detail_res=mysqli_query($conn,"select * from dish_detail where dish_id='$id'");
                        $i1=1;
                        while($dish_detail_row=mysqli_fetch_assoc($dish_detail_res)){?>
                        <div class="row mt">
                          <div class="col-md-5">
                            <input type="hidden" name="dish_detail_id" class="form-control" value="<?php echo $dish_detail_row['id'] ?>">
                             <input type="text" name="attribute[]" class="form-control" value="<?php echo $dish_detail_row['attributes']?>">
                          </div>
                          <div class="col-md-5">
                             <input type="text" name="price[]" class="form-control" value="<?php echo $dish_detail_row['price'] ?>">
                          </div>
                          
                           <?php if($i1!=1){ ?>
                            <div class="col-md-2"><button type="button" class="btn btn-dark" onclick="remove_more_new('<?php echo $dish_detail_row['id'] ?>')">Remove</button></div>

                          <?php }?>
                      </div>
                      <?php $i1++; }  

                      ?>
                    </div> 
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary" name="update">Update</button>
                      <button type="button" class="btn btn-success" onclick="add_more()">Add more</button> 
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
        if(isset($_POST['update']))
        {
          //prx($_POST);
         $msg="";
        echo $id1=get_safe_value($_POST['category_id']);
        echo $dish=get_safe_value($_POST['dish']);
        echo $dish_d=get_safe_value($_POST['dish_detail']);
        $added_on=Date('y-m-d h:i:s');
        
         if(mysqli_num_rows(mysqli_query($conn,"SELECT * from dish where dish='$dish' && id!='$id'"))>0)
         echo "<script>swal( 'Dish already exists','Dish exists!','error' ).then(function() { window. location = 'dish.php'; });;</script>";
         else
         {
        // $image_ok='';
         $image=$_FILES['image']['name'];
        if($_FILES['image']['tmp_name']!='')
         {
        //$image=$_FILES['image']['name'];
         move_uploaded_file($_FILES['image']['tmp_name'],SERVER_DISH_IMAGE.$_FILES['image']['name']);
        // //$image_ok=", image='$image'";
        $sql="UPDATE dish set category_id='$id1',dish='$dish',dish_detail='$dish_d',image='$image' where id='$id'";
         }
         else
        $sql="UPDATE dish set category_id='$id1',dish='$dish',dish_detail='$dish_d' where id='$id'";
         mysqli_query($conn,$sql);
           $attribute_arr=$_POST['attribute'];
         $price_arr=$_POST['price'];
         $dish_d_id_arr=$_POST['dish_detail_id'];
         foreach($attribute_arr as $key=>$val){
           $attribute=$val;
           $price=$price_arr[$key];
           if(isset($dish_d_id_arr[$key]))
           { $did=$dish_d_id_arr[$key];
             mysqli_query($conn,"update dish_detail set attributes='$attribute',price='$price'where id='$did'"); 
           }
           else{
           mysqli_query($conn,"insert into dish_detail(dish_id,attributes,price,status)values('$id','$attribute',$price,1)");}
         }
        // redirect('dish.php');
         }
        
        }
        ?>
   <input type="hidden" id="add_more" value="1">
        <script>
       function add_more(){
        var add_more=jQuery('#add_more').val();
        add_more++;
        jQuery('#add_more').val(add_more);
        var dish_box='<div class="row mt" id="id'+add_more+'"><div class="col-md-5"><input type="text" name="attribute[]" class="form-control" placeholder="Enter Attributes"></div><div class="col-md-5"><input type="text" name="price[]" class="form-control" placeholder="Enter Price"></div><div class="col-md-2"><button type="button" class="btn btn-dark" onclick=remove_more("'+add_more+'")>Remove</button></div></div>';
             jQuery('#dish_box1').append(dish_box);
       }
       function remove_more(id){
       jQuery('#id'+id).remove();
       }
       function remove_more_new(id){
        var res=confirm('Are you Sure?');
        if(res==true){
          var path=window.location.href;
          window.location.href=path+"&dish_detail_id="+id;
        }
       }
        </script>
      </body>
    </html>