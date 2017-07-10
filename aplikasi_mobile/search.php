<?php  
	$username ="rivkieyc_user";
	$password ="musiraya26";
	$hostname = "localhost";
	$database_name = "rivkieyc_gojek";
	
	$con = mysqli_connect($hostname , $username, $password);
	$selected = mysqli_select_db($con, $database_name);
	$cari = isset($_REQUEST['cari']) ? $_REQUEST['cari'] : '';

	if ($cari != null) {
		$result = mysqli_query($con, "SELECT * FROM pustaka WHERE nama_buku LIKE "."'%".$cari."%'");
	} else {
		$result = mysqli_query($con, "SELECT * FROM pustaka");
	}
	
	$json_response = array();
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {  
                 $json_response[] = $row;
	}
	
	echo json_encode(array('buku' => $json_response));  
?>
