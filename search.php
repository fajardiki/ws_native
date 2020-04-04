<?php 

	include "conn.php";

	// place this before any script you want to calculate time
    $time_start = microtime(true);

	$cari = (int) $_GET['msisdn'];

	$query = "SELECT * FROM bridge_log WHERE msisdn='$cari'";
	$query_bridge_log = mysqli_query($koneksi, $query);

	while ($dtat=mysqli_fetch_array($query_bridge_log)) {
		$item[] = array(
			"id"=>$dtat["id"],
			"msisdn"=>$dtat["msisdn"],
			"called"=>$dtat["called"],
			"lat"=>$dtat["lat"],
			"lng"=>$dtat["lng"],
			"area"=>$dtat["area"],
			"ts"=>$dtat["ts"],
			"tenant"=>$dtat["tenant"]
		);
	}

	$time_end = microtime(true);

	$execution_time = $time_end - $time_start;

	if($query_bridge_log) {
	  	$json = array(
			'result'=>'succes',
			'Bridge_Log'=>$item,
			'time'=>$execution_time
		);

		echo json_encode($json);
	} else {
	  	$json = array(
			'result'=>'failed'
		);

		echo json_encode($json);
	}

	
?>