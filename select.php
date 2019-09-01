<?php 

	include "conn.php";

	// AUTH SESSION
	$auth_session = "SELECT * FROM auth_session";
	$query_auth_session = mysqli_query($koneksi,$auth_session);

	while ($dt=mysqli_fetch_array($query_auth_session)) {
		$item[] = array(
			"id"=>$dt["id"],
			"ip_address"=>$dt["ip_address"],
			"timestamp"=>$dt["timestamp"],
			"data"=>$dt["data"]
			);
	}

	// AUTH TENANT
	$auth_tenant = "SELECT * FROM auth_tenant";
	$query_auth_tenant = mysqli_query($koneksi,$auth_tenant);

	while ($dtat=mysqli_fetch_array($query_auth_tenant)) {
		$item[] = array(
			"id"=>$dtat["id"],
			"name"=>$dtat["name"],
			"whitelist"=>$dtat["whitelist"],
			"key_public"=>$dtat["key_public"],
			"key_private"=>$dtat['key_private']
			);
	}

	// BRIDGE_LOG
	// $bridge_log = "SELECT * FROM bridge_log";
	// $query_bridge_log = mysqli_query($koneksi,$bridge_log);

	// while ($dtbl=mysqli_fetch_array($query_bridge_log)) {
	// 	$item[] = array(
	// 		"id"=>$dtat["id"],
	// 		"msisdn"=>$dtbl["msisdn"],
	// 		"called"=>$dtbl["called"],
	// 		"lat"=>$dtbl["lat"],
	// 		"ing"=>$dtbl["ing"],
	// 		"area"=>$dtbl["area"],
	// 		"ts"=>$dtbl["ts"],
	// 		"tenant"=>$dtbl["tenant"]
	// 	);
	// }

	$json = array(
		'result'=>'succes',
		'item'=>$item
		);

	


	echo json_encode($json);
?>