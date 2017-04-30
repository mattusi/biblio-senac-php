<html>
	<head>
		<title>Teste do PHP no Azure</title> 
	</head>
	<body> 
		<?php echo '<p>Hello World !!</p>';
		//SQL database information
		$host = "tcp:bibliodb.database.windows.net,1433";
		$user = "mattusi@bibliodb.database.windows.net";
		$pwd = "12345678Casa";
		$db = "bibliodb";
 
		try {
    		$conn = new PDO( "sqlsrv:Server= $host ; Database = $db ", $user, $pwd);
    		$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
 
    		$sqlQuery = $conn->query("SELECT * FROM USERS");
    		$result = $sqlQuery->fetchAll();
    		//echo "Row count: " . array($result) . ".";
    		echo json_encode($result);
    		
    		$resultArray = array();
			$tempArray = array();
 
			// Loop through each row in the result set
			while($row = $result->fetch_object())
			{
			// Add each row into our results array
				$tempArray = $row;
	    		array_push($resultArray, $tempArray);
			}
 		// Finally, encode the array to JSON and output the results
		echo json_encode($resultArray);
			}
		catch(Exception $e){
    		die(var_dump($e));
			}
		
		 ?>
	</body>
</html>
