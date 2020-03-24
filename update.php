<?php 
	include_once('conn.php');

	$time_start = microtime(true);

	$jmlupdate = (int)$_POST['jumlahupdate'];
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

	$lastid = $row;
	$maxulang = $lastid-$jmlupdate;

	for ($i=$lastid; $i > $maxulang; $i--) { 
		$getdata = mysqli_query($koneksi, "SELECT * FROM bridge_log WHERE id='$i'");
		$rows = mysqli_num_rows($getdata);

		$update = "UPDATE bridge_log SET msisdn='$msisdn', called='$called', lat='$lat', lng='$lng', area='$area', ts='$ts', tenant='$tenant' WHERE id='$i'";
		$queryupdate = mysqli_query($koneksi, $update);
	}

	$time_end = microtime(true);
	$execution_time = $time_end - $time_start;

	$respose = array();

	if($queryupdate) {
	  $respose['result'] = "Succes";
	  $respose['Time'] = $execution_time;
	} else {
	  $respose['result'] = "Failed";
	  $respose['Time'] = $execution_time;
	}

	echo json_encode($respose);

?>