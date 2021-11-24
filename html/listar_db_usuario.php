

<table border="1" width="100%">
    <tr>
    	<th>ID</th>
        <th>nome</th>
        <th>matricula</th>
        <th>setor</th>
        <th>login</th>
		<th>senha</th>

    </tr>
    <?php


include('conexao.php');
  try {



        $stmt = $conexao->prepare("SELECT * FROM usuario");
            if ($stmt->execute()) {
                while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                    echo "<tr>";
                    echo "<td>".$rs->id."</td><td>".$rs->nome."</td><td>".$rs->matricula."</td><td>".$rs->setor."</td><td>".$rs->login."</td><td>".$rs->senha
                               ."</td><td><center><a href=\"\">[Alterar]</a>"
                               ."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
                               ."<a href=\"\">[Excluir]</a></center></td>";
                    echo "</tr>";
                }
            } else {
                echo "Erro: Não foi possível recuperar os dados do banco de dados";
            }
    } catch (PDOException $erro) {
        echo "Erro: ".$erro->getMessage();
    }
    ?>
</table>
