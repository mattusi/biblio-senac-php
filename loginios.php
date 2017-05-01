<?php
    // Classe de conexao ao DB
    require 'conecta.php';
 	
    // Se for um post do formulario vamos tratar 
  
        // variavel para tratar os erros
        $nameError = null;
         
        // obtem o campo de entrada Nome e atribuii para variavel
        $email = ($_POST['email']);
        $pwd = ($_POST['pwd']);
        // Valida a entrada
        $valid = true;
        if (empty($email)) {
            echo('Por favor, entre com o Nome');
            $valid = false;
		}
         
        // insert data
        if ($valid) {
        	echo $pwd;
            try {
               	$conexao = Conecta::abrir();
            	$query = $conexao->prepare("SELECT * FROM Users ORDER BY UserID");
                $query->execute();
                for($i=0; $row = $query->fetch(); $i++){
                	
                	if ($email == $row[UserEmail]){
                		if ($pwd == $row[UserPWD]){
                			echo'OK:' . $row[UserID] . ':' . $row[UserName] . ':end';
                		}
                	}
                	
                }
            } catch(PDOException $e) {
				// Se ocorrer erro, apresentar e parar a app 
				die($e->getMessage()); 
        	}
           
        }
    
?>


        