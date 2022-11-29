<?php
//Creates new record as per request
    //Connect to database
    $servername = "localhost";
    $username = "node1";
    $password = "ClimaTecNode1";
    $dbname = "climatec";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Database Connection failed: " . $conn->connect_error);
    }else {
        echo "Connected to mysql database. ";
    }

    if(!empty($_POST['node']) && !empty($_POST['temperature']) && !empty($_POST['humidity']) && !empty($_POST['shadow']) && !empty($_POST['pressure']) && !empty($_POST['altitude'])){
    	$node = $_POST['node'];
    	$temperature = $_POST['temperature'];
        $humidity = $_POST['humidity'];
        $shadow = $_POST['shadow'];
        $pressure = $_POST['pressure'];
        $altitude = $_POST['altitude'];

	    $sql = "INSERT INTO node1 (node, temperature, humidity, shadow, pressure, altitude)
		        VALUES ($node, $temperature, $humidity, $shadow, $pressure, $altitude)";

		if ($conn->query($sql) === TRUE) {
		    echo "OK";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	$conn->close();
?>