<!DOCTYPE html>
<html lang="pt">
<html>
	<head>
		<title>Grid</title> 
	</head>
	<body>	
	   <div>
            <div >
                <h3>Grid dos Usuarios</h3>
            </div>
            <div>
            	<p>
                    <a href="novoitem.php">Novo Usuario</a>
                </p>
            </div> 
            <div>
                <table border=1 width="50%">
                    <tr>
                      <td>ID</td>
                      <td>Usuarios</td>
                      <td colspan=3 align=center>Opções</td>
                    </tr>
                  <?php
                   include 'conecta.php';
                   $conexao = Conecta::abrir();
                   $query = $conexao->prepare("SELECT UserID,UserName, UserEmail FROM Users ORDER BY UserName");
                   $query->execute();
                   for($i=0; $row = $query->fetch(); $i++){
                            echo '<tr>';
                            echo '<td>' . $row[UserID] . '</td>';
                            echo '<td>' . $row[UserName] . '</td>';
                            echo '<td>' . $row[UserEmail] . '</td>'; 
                            echo '<td><a href="leritem.php?id='.$row[UserID].'">Detalhes</a></td>';
                            echo '<td><a href="atualizaritem.php?id='.$row[UserID].'">Atualizar</a></td>';
                            echo '<td><a color=red href="apagaritem.php?id='.$row[UserID].'">Apagar<a></td>';
                            echo '</tr>';
                   }
                   Conecta::fechar();
                  ?>
            </table>
        </div>
    </body>
</html> 

