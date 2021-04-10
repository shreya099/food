<?php
include 'header.php';
//prx(SERVER_DISH_IMAGE);
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
$res_category=mysqli_query($conn,"select * from category where status='1' order by category asc")
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
                        
                        <div class="row">
                          <div class="col-md-5">
                            <input type="text" name="attribute[]" class="form-control" placeholder="Enter Attributes">
                          </div>
                          <div class="col-md-5">
                            <input type="text" name="price[]" class="form-control" placeholder="Enter Price">
                          </div>
                          <div class="col-md-2">
                            
                          </div>
                        </div>
                        
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
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
        { 
          $msg="";
        $id1=get_safe_value($_POST['category_id']);
        $dish=get_safe_value($_POST['dish']);
        $dish_d=get_safe_value($_POST['dish_detail']);
        $added_on=Date('y-m-d h:i:s');
        if(mysqli_num_rows(mysqli_query($conn,"SELECT * from dish where dish='$dish'"))>0)
        echo "<script>swal( 'Dish already exists','Dish exists!','error' ).then(function() { window. location = 'manage_dish.php'; });;</script>";
        else
        {$image=$_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'],SERVER_DISH_IMAGE.$_FILES['image']['name']);
        mysqli_query($conn,"INSERT into dish(category_id,dish,dish_detail,status,image) values ('$id1','$dish','$dish_d',1,'$image')");
        $attribute_arr=$_POST['attribute'];
        $price_arr=$_POST['price'];
        foreach($attribute_arr as $key=>$val){
          $attribute=$val;
          $price=$price_arr[$key];
          echo $sql="insert into dish_detail(dish_id,attributes,price,status)values('','$attribute','$price',1)";
        }

        }
        
        //redirect('dish.php');
        
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
        </script>
      </body>
    </html>