<?php 
	include_once('conn.php');
	include "time_start.php";
	include "cpu_usage.php";
	include "ram_usage.php";

	startTimer();

	$method = $_SERVER['REQUEST_METHOD'];
	$request = explode('/', trim($_SERVER['PATH'],'/'));
	$input = parse_str(file_get_contents('php://input'), $_put);

	$jmlupdate = (int)$_put['jumlahupdate'];
	$msisdn = $_put['msisdn'];
	$called= $_put['called'];
	$lat = $_put['lat'];
	$lng = $_put['lng'];
	$area = $_put['area'];
	$ts = $_put['ts'];
	$tenant = $_put['tenant'];

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

	if($queryupdate) {
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