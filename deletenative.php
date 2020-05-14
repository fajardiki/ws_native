<?php 
	include_once('conn.php');
	include "time_start.php";
	include "cpu_usage.php";
	include "ram_usage.php";

	startTimer();

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

	if ($querydelete) {
		$json = array(
			'result'=>'succes',
			'request'=>$i,
			'time'=>endTimer()." Sec",
			'memory'=>memory().' MB',
			'cpu'=>get_cpu_usage()."%"
		);
	} else {
		$json = array(
			'result'=>'failed',
			'time'=>endTimer()." Sec",
			'memory'=>memory().' MB',
			'cpu'=>get_cpu_usage()."%"
		);
	}

	echo json_encode($json);

?>