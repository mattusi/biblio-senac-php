<?php
    // Classe de conexao ao DB
    require 'conecta.php';
 	
    // Se for um post do formulario vamos tratar 
  
        // variavel para tratar os erros
        $nameError = null;
         
        // obtem o campo de entrada Nome e atribuii para variavel
        $bookbarcode = ($_POST['name']);
        $userid = ($_POST['userid']);
        // Valida a entrada
        $valid = true;
        if (empty($userid)) {
            echo('Por favor, entre com o Nome');
            $valid = false;
		}
         
        // insert data
        if ($valid) {
        	
            try {
                $conexao = Conecta::abrir();
            	$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            	$conexao->beginTransaction();
            	$sql = "INSERT INTO BRents VALUES ('$userid', '$bookbarcode');";
            	echo $sql;
            	$query = $conexao->prepare($sql);
            	$query->execute();
            	$conexao->commit(); 
            	Conecta::fechar();
            } catch(PDOException $e) {
				// Se ocorrer erro, apresentar e parar a app 
				die($e->getMessage()); 
        	}
           
        }
    
?>


        