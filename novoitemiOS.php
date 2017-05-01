<?php
    // Classe de conexao ao DB
    require 'conecta.php';
 
    // Se for um post do formulario vamos tratar 
    if ( !empty($_POST)) {
        // variavel para tratar os erros
        $nameError = null;
         
        // obtem o campo de entrada Nome e atribuii para variavel
        $name = $_POST['nome'];
         
        // Valida a entrada
        $valid = true;
        if (empty($name)) {
            $nameError = 'Por favor, entre com o Nome';
            $valid = false;
        }
         
        // insert data
        if ($valid) {
            try {
                $conexao = Conecta::abrir();
            	$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            	$conexao->beginTransaction();
            	$sql = "INSERT INTO Users (UserName) values (?)";
            	$query = $conexao->prepare($sql);
            	$query->execute(array($name));
            	$conexao->commit(); 
            	Conecta::fechar();
            } catch(PDOException $e) {
				// Se ocorrer erro, apresentar e parar a app 
				die($e->getMessage()); 
        	}
            header("Location: status.php?nome=" . $name . "&stat=N");
        }
    }
?>


        