<?php 
	include_once('conn.php');

	$id = $_POST['id'];

	$getdata = mysqli_query($koneksi, "SELECT * FROM auth_tenant WHERE id='$id'");
	$rows = mysqli_num_rows($getdata);

	$delete = "DELETE FROM auth_tenant WHERE id = '$id'";
	$querydelete = mysqli_query($koneksi, $delete);

	$respose = array();

	$respose = array();
	if($rows > 0)
	{
	  if ($querydelete) {
	    $respose['code'] = 1;
	    $respose['message'] = "Deleted Success";
	  }else{
	    $respose['code'] = 0;
	    $respose['message'] = "Failed to Delete";
	  }
	}else{
	  $respose['code'] = 0;
	  $respose['message'] = "Failed to Delete, data Not Found";
	}


	echo json_encode($respose);

?>