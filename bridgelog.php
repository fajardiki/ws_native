<?php 

	include "conn.php";

	// place this before any script you want to calculate time
    $time_start = microtime(true);

	// AUTH TENANT
	$bridge_log = "SELECT * FROM bridge_log";
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

	// AUTH SESSION
	$auth_session = "SELECT * FROM auth_session";
	$query_auth_session = mysqli_query($koneksi,$auth_session);

	while ($dt=mysqli_fetch_array($query_auth_session)) {
		$itemsession[] = array(
			"id"=>$dt["id"],
			"ip_address"=>$dt["ip_address"],
			"timestamp"=>$dt["timestamp"],
			"data"=>$dt["data"]
			);
	}

	$time_end = microtime(true);

	$execution_time = round(($time_end - $time_start), 3);

	$result = number_format($execution_time,3);

	$json = array(
		'result'=>'succes',
		'Bridge_Log'=>$item,
		'Auth_Session'=>$itemsession,
		'Time'=>$execution_time
	);

	echo json_encode($json);
?>