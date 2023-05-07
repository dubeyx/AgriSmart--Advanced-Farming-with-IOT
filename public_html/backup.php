<?php

       $dbhost = 'localhost';                // db host
	   $dbuser = 'id20551940_iot';            // my sql user name
	   $dbpass = 'Z>DT^2$fdCzj/)3p';            // db password
	   $dbname = "id20551940_project";
	   $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);
		$query = "SELECT * FROM irri";
		if (!$result = mysqli_query($conn, $query)) {
		    exit(mysqli_error($con));
		}
		 
		$users = array();
		if (mysqli_num_rows($result) > 0) {
		    while ($row = mysqli_fetch_assoc($result)) {
		        $users[] = $row;
		    }
		}
		 
		header('Content-Type: text/csv; charset=utf-8');
		header('Content-Disposition: attachment; filename=irrigation.csv');
		$output = fopen('php://output', 'w');
		fputcsv($output, array('id', 'TEMP','HUMIDITY','SOIL MOISTURE','RAIN DROP', 'DETECTION','Date & Time'));
		 
		if (count($users) > 0) {
		    foreach ($users as $row) {
		        fputcsv($output, $row);
		    }
		}
?>