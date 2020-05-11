<?php 
	include_once('conn.php');
	include "time_start.php";
	include "cpu_usage.php";
	include "ram_usage.php";

	startTimer();

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

	if($insertto) {
		$json = array(
			'result'=>'succes',
			'request'=>$i,
			'time'=>endTimer()." Second",
			'memory'=>memory().' MB',
			'cpu'=>get_cpu_usage()."%"
		);
	} else {
		$json = array(
			'result'=>'failed',
			'time'=>endTimer()." Second",
			'memory'=>memory().' MB',
			'cpu'=>get_cpu_usage()."%"
		);
	}

	echo json_encode($json);
?>