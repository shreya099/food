<?php
function pr($x)
{ 
	echo '<pre>';
	print_r($x);

	# code...
}
function prx($x)
{ 
	echo '<pre>';
	print_r($x);
	die();
	
	# code...
}
function get_safe_value($str)
{  global $conn;
   $str=mysqli_real_escape_string($conn,$str);
   return $str;
}
function redirect($link){
	?>
	<script>
		window.location.href='<?php echo $link ?>';
	</script>

	<?php
	die();
}
?>