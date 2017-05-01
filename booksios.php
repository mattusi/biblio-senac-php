<?php
    // Classe de conexao ao DB
    require 'conecta.php';
 	
    // Se for um post do formulario vamos tratar 
  
        // variavel para tratar os erros
        $nameError = null;
         
        // obtem o campo de entrada Nome e atribuii para variavel
        $userid = ($_POST['userid']);
        // Valida a entrada
        $valid = true;
        if (empty($userid)) {
            echo('Erro de comunicaçao do POST');
            $valid = false;
		}
         
        // insert data
        if ($valid) {
        	
            try {
               	$conexao = Conecta::abrir();
            	$query = $conexao->prepare("SELECT * FROM BRents ORDER BY RentID");
                $query->execute();
                for($i=0; $row = $query->fetch(); $i++){
                	
                	if ($userid == $row[UserID]){
                		echo'Start:' . $row[BookID] . ':' . $row[RentS] . ':' . $row[RentD];	
                	
                }
            } catch(PDOException $e) {
				// Se ocorrer erro, apresentar e parar a app 
				die($e->getMessage()); 
        	}
           
        }
    
?>


        