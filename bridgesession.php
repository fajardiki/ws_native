<?php 

	include "conn.php";

	// AUTH TENANT
	$bridge_session = "SELECT * FROM bridge_session";
	$query_bridge_session = mysqli_query($koneksi,$bridge_session);

	while ($dtat=mysqli_fetch_array($query_bridge_session)) {
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
		'Bridge_Session'=>$item
	);

	echo json_encode($json);
?>