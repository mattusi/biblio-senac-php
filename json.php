 <?php
    include 'conecta.php';
    $response = array();
    $response['user'] = array();
    $conexao = Conecta::abrir();
    $query = $conexao->prepare("SELECT * FROM Users ORDER BY UserID");
    $query->execute();
    for($i=0; $row = $query->fetch(); $i++){
        $response[] = $row;
		 
   
                           
        }
    echo json_encode($response);    
    Conecta::fechar();
?>