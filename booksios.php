<?php
    // Classe de conexao ao DB
    require 'conecta.php';
 	
    // Se for um post do formulario vamos tratar 
  
        // variavel para tratar os erros
        $nameError = null;
         
        // obtem o campo de entrada Nome e atribuii para variavel
        $useri = ($_POST['user']);
        // Valida a entrada
        $valid = true;
        if (empty($useri)) {
            echo('Erro de comunicaçao do POST');
            $valid = false;
		}
        echo 'item 1';
        // insert data
        if ($valid) {
        echo 'item2';	
            try {
               	$conexao = Conecta::abrir();
            	$query = $conexao->prepare("SELECT * FROM BRents");
                $query->execute();
                for($i=0; $row = $query->fetch(); $i++){
                	
                	if ($useri == $row[UserID]){
                		echo'Start:' . $row[BookID] . ':' . $row[RentS] . ':' . $row[RentD] . ':end';	
                	
                }
            } catch(PDOException $e) {
				// Se ocorrer erro, apresentar e parar a app 
				die($e->getMessage()); 
        	}
           
        }
    
?>


        