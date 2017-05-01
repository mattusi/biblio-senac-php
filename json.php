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
   		$temp['$row[UserID]'] = $team['UserID'];
    	$temp['$row[UserName]']=$team['UserName'];
    	$temp['$row[UserPWD]']=$team['UserPWD'];
 		$temp['$row[UserEmail]']=$team['UserEmail'];
    //inserting the temporary array inside response
    array_push($response['user'],$temp);
                           
        }
    echo json_encode($response);    
    Conecta::fechar();
?>