<?php 

	include "conn.php";

	// place this before any script you want to calculate time
    $time_start = microtime(true);

    $limit = $_GET['limit'];
    // $limit = 10;

	// AUTH TENANT
	$bridge_log = "SELECT * FROM bridge_log LIMIT $limit";
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

	$execution_time = $time_end - $time_start;

	$json = array(
		'result'=>'succes',
		'Bridge_Log'=>$item,
		'time'=>$execution_time
	);

	// 'Auth_Session'=>$itemsession,

	echo json_encode($json);
?>