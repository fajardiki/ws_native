<?php 

	include "conn.php";
	include "time_start.php";
	include "cpu_usage.php";
	include "ram_usage.php";

	startTimer();
	
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

	if($query_bridge_log) {
		$json = array(
			'result'=>'succes',
			'Bridge_Log'=>$item,
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