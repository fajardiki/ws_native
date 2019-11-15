<?php 

	include "conn.php";

	// AUTH TENANT
	$bridge_log = "SELECT * FROM bridge_log LIMIT 150000, 150000";
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

	$json = array(
		'result'=>'succes',
		'Bridge_Log2'=>$item
	);

	echo json_encode($json);
?>