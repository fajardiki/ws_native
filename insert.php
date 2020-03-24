<?php 
	include_once('conn.php');

	// $id = $_POST['id'];
	$time_start = microtime(true);

	$jmlinput = (int)$_POST['jumlahinsert'];
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
	$maxulang = $lastid+$jmlinput;

	for ($i=$lastid; $i < $maxulang; $i++) { 
		$insert = "INSERT INTO bridge_log VALUES ('$i', '$msisdn', '$called', '$lat', '$lng', '$area', '$ts', '$tenant')";
		$insertto = mysqli_query($koneksi, $insert);
	}

	$time_end = microtime(true);

	$execution_time = $time_end - $time_start;

	if($insertto) {
	  $response['result'] ="Success";
	  $response['time'] = $execution_time;
	} else {
	  $response['result'] ="Failed";
	  $response['time'] = $execution_time;
	}


	echo json_encode($response);
?>