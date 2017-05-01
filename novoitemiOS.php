<?php
    // Classe de conexao ao DB
    require 'conecta.php';
 	
    // Se for um post do formulario vamos tratar 
  
        // variavel para tratar os erros
        $nameError = null;
         
        // obtem o campo de entrada Nome e atribuii para variavel
        $name = ($_POST['nome']);
        $email = ($_POST['email']);
        $pwd = ($_POST['pwd']);
        // Valida a entrada
        $valid = true;
        if (empty($name)) {
            $nameError = 'Por favor, entre com o Nome';
            $valid = false;

         
        // insert data
        if ($valid) {
            try {
                $conexao = Conecta::abrir();
            	$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            	$conexao->beginTransaction();
            	$sql = "INSERT INTO Users VALUES ('$name', '$email', '$pwd');";
            	$query = $conexao->prepare($sql);
            	$conexao->commit(); 
            	Conecta::fechar();
            } catch(PDOException $e) {
				// Se ocorrer erro, apresentar e parar a app 
				die($e->getMessage()); 
        	}
           
        }
    }
?>


        