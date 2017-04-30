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
    		echo "Row count: " . count($result) . ".";
			}
		catch(Exception $e){
    		die(var_dump($e));
			}
		 ?>
	</body>
</html>
