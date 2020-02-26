<?php 

	include "conn.php";

	// place this before any script you want to calculate time
    $time_start = microtime(true);

	// AUTH TENANT
	$bridge_log = "SELECT * FROM bridge_log LIMIT 1000000";
	$query_bridge_log = mysqli_query($koneksi,$bridge_log);

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

	$execution_time = round(($time_end - $time_start), 3);

	$result = number_format($execution_time,3);

	$json = array(
		'result'=>'succes',
		'Bridge_Log'=>$item,
		'Time'=>$execution_time
	);

	echo json_encode($json);
?>