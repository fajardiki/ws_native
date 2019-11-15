<?php 

	include "conn.php";

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

	$json = array(
		'result'=>'succes',
		'Auth_Tenant'=>$item
		);

	


	echo json_encode($json);
?>