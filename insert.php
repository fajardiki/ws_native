<?php 
	include_once('conn.php');

	// $id = $_POST['id'];

	$msisdn = $_POST['msisdn'];
	$called= $_POST['called'];
	$lat = $_POST['lat'];
	$lng = $_POST['lng'];
	$area = $_POST['area'];
	$ts = $_POST['ts'];
	$tenant = $_POST['tenant'];

	$id = mysqli_query($koneksi, "SELECT MAX(id) as id FROM bridge_log");

	while ($dt=mysqli_fetch_array($id)) {
		$row = $dt['id'];
	}

	$lastid = $row+1;


	$insert = "INSERT INTO bridge_log VALUES ('$lastid', '$msisdn', '$called', '$lat', '$lng', '$area', '$ts', '$tenant')";

	$insertto = mysqli_query($koneksi, $insert);

	if($insertto) {
	  $response['code'] =1;
	  $response['message'] = "Success! Data Inserted";
	} else {
	  $response['code'] =0;
	  $response['message'] = "Failed! Data Not Inserted";
	}


	echo json_encode($response);
?>