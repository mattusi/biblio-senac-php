<?php
class Conecta {
	// Dados da conexao - propriedades da classe
    private static $dbNome = 'bibliodb' ;
    private static $dbServidor = 'tcp:bibliodb.database.windows.net,1433';
    private static $dbUsuario = 'mattusi@bibliodb.database.windows.nett';
    private static $dbSenha = '12345678Casa';
     
    // Objeto de conexao
    private static $cont = null;
     
    public function __construct() {
        die('Init nao eh permitido');
    }
     
    public static function abrir()
    {
       // Uma conexão para ser utilizada por toda a aplicação
       // Se nao exsite a conexao, vamos tentar criar uma nova
       if ( null == self::$cont ) {     
        try {
          self::$cont =  new PDO( "sqlsrv:Server=".self::$dbServidor.";"."Database=".self::$dbNome, self::$dbUsuario, self::$dbSenha); 
          // se fosse uma conexao com o MySQL a string de conexao seria: mysql:host ao inves de sqlsrv:Server= | dbname= as inves de Database="
        }
        catch(PDOException $e) {
          // Se ocorrer erro de conexão, apresentar e parar a app 
          die($e->getMessage()); 
        }
       }
       return self::$cont;
    }
     
    public static function fechar() {
        self::$cont = null;
    }
}
?>