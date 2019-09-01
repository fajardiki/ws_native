<?php 
	include_once('conn.php');

	$id = $_POST['id'];

	$name = $_POST['name'];
	$whitelist= $_POST['whitelist'];
	$key_public = $_POST['key_public'];
	$key_private = $_POST['key_private'];

	$getdata = mysqli_query($koneksi, "SELECT * FROM auth_tenant WHERE id='$id'");
	$rows = mysqli_num_rows($getdata);

	$update = "UPDATE auth_tenant SET whitelist='$whitelist', key_public='$key_public', key_private='$key_private' WHERE id='$id'";
	$queryupdate = mysqli_query($koneksi, $update);

	$respose = array();

	if($rows > 0) {
	  if($queryupdate) {
	    $respose['code'] = 1;
	    $respose['message'] = "Updated Success";
	  } else {
	    $respose['code'] = 0;
	    $respose['message'] = "Updated Failed";
	  }
	} else {
	  $respose['code'] = 0;
	  $respose['message'] = "Updated Failed, Not data selected";
	}

	echo json_encode($respose);

?>