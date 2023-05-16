<?php
$input_busca = $_POST["input_busca"];

// Realizar a busca no banco de dados
$query = "SELECT * FROM paciente WHERE nome LIKE '$input_busca%'";
$resultado = mysqli_query($conexao, $query);

if (mysqli_num_rows($resultado) > 0) {
    // Pacientes encontrados, exibir os resultados
    while ($row = mysqli_fetch_assoc($resultado)) {
        $nome_paciente = $row['nome'];
        // Exibir os resultados encontrados
        echo "Nome do paciente: $nome_paciente<br>";
    }
} else {
    echo "Nenhum paciente encontrado.";
}

// Realizar a busca para médicos
$query_medico = "SELECT * FROM medico WHERE nome LIKE '$input_busca%'";
$resultado_medico = mysqli_query($conexao, $query_medico);

if (mysqli_num_rows($resultado_medico) > 0) {
    // Médicos encontrados, exibir os resultados
    while ($row_medico = mysqli_fetch_assoc($resultado_medico)) {
        $nome_medico = $row_medico['nome'];
        // Exibir os resultados encontrados
        echo "Nome do médico: $nome_medico<br>";
    }
} else {
    echo "Nenhum médico encontrado.";
}

// Fechar a conexão com o banco de dados
mysqli_close($conexao);