<?php 
	include_once('conn.php');

	$id = $_POST['id'];
	$name = $_POST['name'];
	$whitelist= $_POST['whitelist'];
	$key_public = $_POST['key_public'];
	$key_private = $_POST['key_private'];

	$insert = "INSERT INTO auth_tenant(id,name,whitelist,key_public,key_private) VALUES ('$id', '$name', '$whitelist', '$key_public', '$key_private')";

	$insertto = mysqli_query($koneksi, $insert);

	$response = array();



	if($insertto) {
	  $response['code'] =1;
	  $response['message'] = "Success! Data Inserted";
	} else {
	  $response['code'] =0;
	  $response['message'] = "Failed! Data Not Inserted";
	}


	echo json_encode($response);
?>