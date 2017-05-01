 <?php
    include 'conecta.php';
    $response = array();
    $response['user'] = array();
    $conexao = Conecta::abrir();
    $query = $conexao->prepare("SELECT * FROM Users ORDER BY UserID");
    $query->execute();
    for($i=0; $row = $query->fetch(); $i++){
         $temp = array();
 
    //inserting the team in the temporary array
   		$row['UserID'] = $team['UserID'];
    	$row['UserName']=$team['UserName'];
    	$row['UserPWD']=$team['UserPWD'];
 		$row['UserEmail']=$team['UserEmail'];
    //inserting the temporary array inside response
    array_push($response['user'],$temp);
                           
        }
    echo json_encode($response);    
    Conecta::fechar();
?>