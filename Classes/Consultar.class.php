<?php
// Recupere o nome do médico pesquisado
$nome_medico = $_POST["nome_medico"];

// Execute a consulta SQL para obter as informações do médico
$sql = "SELECT * FROM medico WHERE nome = '$nome_medico'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "<table>
        <tr>
            <th>Nome</th>
            <th>Especialidade</th>
            <th>CRM</th>
            <th>Telefone</th>
        </tr>";
        while($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>".$row["nomeMed"]."</td>
            <td>".$row["especialidadeMed"]."</td>
            <td>".$row["crmMed"]."</td>
            <td>".$row["celularMed"]."</td>
        </tr>";
        }
        echo "
    </table>";
    } else {
    echo "Nenhum médico encontrado com esse nome.";
    }