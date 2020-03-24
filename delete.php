<?php 
	include_once('conn.php');
	$time_start = microtime(true);

	$jmldel = (int)$_GET['jmldel'];

	$id = mysqli_query($koneksi, "SELECT MAX(id) as id FROM bridge_log");

	while ($dt=mysqli_fetch_array($id)) {
		$row = $dt['id'];
	}

	$lastid = $row;
	$maxulang = $lastid-$jmldel;

	for ($i=$lastid; $i > $maxulang; $i--) { 
		$delete = "DELETE FROM bridge_log WHERE id = '$i'";
		$querydelete = mysqli_query($koneksi, $delete);
	}

	$time_end = microtime(true);
	$execution_time = round(($time_end - $time_start), 3);

	$respose = array();

	if ($querydelete) {
	  $respose['message'] = "Deleted Success";
	  $respose['time'] = $execution_time;
	} else {
	  $respose['message'] = $jmldel;
	  $respose['time'] = $execution_time;
	}

	echo json_encode($respose);

?>