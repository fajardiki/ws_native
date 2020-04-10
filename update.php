<?php 
	include_once('conn.php');

	$method = $_SERVER['REQUEST_METHOD'];
	$request = explode('/', trim($_SERVER['PATH'],'/'));
	$input = parse_str(file_get_contents('php://input'), $_put);

	$time_start = microtime(true);

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

	$time_end = microtime(true);
	$execution_time = $time_end - $time_start;

	$respose = array();

	if($queryupdate) {
	  $respose['result'] = "Succes";
	  $respose['time'] = $execution_time;
	} else {
	  $respose['result'] = "Failed";
	  $respose['time'] = $execution_time;
	}

	echo json_encode($respose);

?>