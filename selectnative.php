<?php 
	include "conn.php";
	include "time_start.php";
	include "cpu_usage.php";
	include "ram_usage.php";
	
	startTimer();

	$limit = $_GET['limit'];
	
	for ($i=1; $i <= $limit; $i++) { 
		$bridge_log = "SELECT * FROM bridge_log WHERE id=$i";
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
	}
	
	$json = array(
		'result'=>'succes',
		'Bridge_Log'=>$item,
		'request'=>$i,
		'time'=>endTimer()." Sec",
		'memory'=>memory().' MB',
		'cpu'=>get_cpu_usage()."%"	
	);

	echo json_encode($json);
?>