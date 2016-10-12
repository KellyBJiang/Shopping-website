<?php
    // open mysql connection
	//echo function_exists('mysql_error')?'yes':'no'; echo "<br>";
	echo "Start connecting to DB >>> " . "<br>";
    $host = "database2.cs.tamu.edu";
    $username = "jiangbing";
    $password = "19891126jb";
    $dbname = "jiangbing-P1_image_gallary";
    $mysql = mysql_connect($host, $username, $password); 
	
	if(!$mysql){
    echo "Error: Unable to connect to MySQL." . "<br>";
    echo "Debugging errno: " . mysql_errno() . "<br>";
    echo "Debugging error: " . mysql_error() . "<br>";
    exit;
    }

    echo "Success: A proper connection to MySQL was made!" . "<br>";
    echo "Host information: " . mysql_get_host_info($mysql) . "<br>";

	//use database
	mysql_select_db($dbname, $mysql) or die('Unable to use dbname: ' . mysql_error());
	
    // use prepare statement for insert query
    /*if($stmt = $mysqli->prepare('INSERT INTO images(rsln_w, rsln_h, ctgy, format, file) VALUES (?, ?, ?, ?, ?)')){
		
        // bind variables to insert query params
        $stmt->bind_param('ddsss', $rsln_w, $rsln_h, $ctgy, $format, $file);
    
        // read json file
        $filename = './json_data/pets/cats_50.json';
        $json = file_get_contents($filename);   
    
        //convert json object to php associative array
        $data = json_decode($json, true);
    
        // loop through the array
        foreach ($data['d']['results'] as $row) {
            // get the employee details
			$rsln_w = $row['Width']; 
			$rsln_h = $row['Height'];
			$ctgy = "pets";
			$format = $row['ContentType'];
			$file = $row['MediaUrl'];
            
            
            // execute insert query
            $stmt->execute();
        }
		
		//close statement
		$stmt->close();
    }
	*/
	
	/*
    // read json file
	$filename = './json_data/logs.json';
	$json = file_get_contents($filename);   

	//convert json object to php associative array
	$data = json_decode($json, true);

	// loop through the array
	foreach ($data['d']['results'] as $row) {
		// get the camera details
		$date = $row['date'];
		$loca = $row['loca'];
		$weather = $row['weather'];
		$weather = $row['weather'];
		$iso = $row['iso'];
		$st_t = $row['st_t'];
		$end_t = $row['end_t'];
		$id_camera = $row['id_camera'];
		
		//query stmt
		$stmt = "INSERT INTO logs(date, loca, weather, iso, st_t, end_t, id_camera) VALUES ('$date', '$loca', '$weather', '$iso', '$st_t', '$end_t', $id_camera)";
		//echo $stmt . "<br>";
		mysql_query($stmt) or die('Invalid query: ' . mysql_error());
	}
	*/
	

	//update images.id_log
	for ($x = 0; $x <= 49; $x++) {
		$log_in = 255 + $x;
    $stmt = "update images set id_log = $log_in where id_img % 50 = $x;";
	mysql_query($stmt) or die('Invalid query: ' . mysql_error());
} 
	
	
    //close connection
    mysql_close($mysql);
	echo "Success: Close database." . "<br>";
?>