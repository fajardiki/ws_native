<?php 
	include_once('conn.php');

	$id = $_POST['id'];

	$msisdn = $_POST['msisdn'];
	$called= $_POST['called'];
	$lat = $_POST['lat'];
	$lng = $_POST['lng'];
	$area = $_POST['area'];
	$ts = $_POST['ts'];
	$tenant = $_POST['tenant'];


	$getdata = mysqli_query($koneksi, "SELECT * FROM bridge_log WHERE id='$id'");
	$rows = mysqli_num_rows($getdata);

	$update = "UPDATE bridge_log SET msisdn='$msisdn', called='$called', lat='$lat', lng='$lng', area='$area', ts='$ts', tenant='$tenant' WHERE id='$id'";
	// $queryupdate = mysqli_query($koneksi, $update);

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