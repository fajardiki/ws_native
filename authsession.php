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

	$json = array(
		'result'=>'succes',
		'Auth_Session'=>$item
		);

	


	echo json_encode($json);
?>