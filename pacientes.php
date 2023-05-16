<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="Estilos/stylo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Relatorio Pacientes</title>
</head>

<body id="meu-body">

    <body>
        <header>
            <nav class="navbar bg-dark navbar-expand-lg" data-bs-theme="dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="index.php">Clinica IFRO</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="especialidadeGer.php#">Especialidade</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="especialidade.php">Consultar Especialidade</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="pacienteGer.php">Paciente</a>
                            </li>
                            <li class="nav-item <?php if (basename($_SERVER['PHP_SELF']) == 'pacientes.php') echo 'active'; ?>">
                                <a class="nav-link" href="pacientes.php">Relatorio de Pacientes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="consultar.php">Consultar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="medico.php">Medico</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
    </body>
    <main>
        <table class="table table-dark table-striped-columns">
            <thead>
                <tr>
                    <th scope="col">Acão</th>
                    <th scope="col">img</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">Data de Nascimento </th>
                </tr>
            </thead>
            <tbody>
                <?php
                spl_autoload_register(function ($class) {
                    require_once "./Classes/{$class}.class.php";
                });
                $paciente = new Paciente();
                if (filter_has_var(INPUT_POST, 'txtPesquisar')) {
                    $parametro = filter_input(INPUT_POST, 'txtPesquisar');
                    $where = "where (nomePac like '%$parametro%' ) or (emailPac like '%$parametro%' )";
                    $dadosBanco =  $paciente->listar($where);
                } else {
                    $dadosBanco =  $paciente->listar();
                }
                while ($row = $dadosBanco->fetch_object()) {
                ?>
                    <tr>
                        <td class="align-middle">
                            <a href="pacienteGer.php?id=<?php echo $row->idPac ?>
                                " class="btn btn-info">
                                <span class="material-symbols-outlined">
                                    edit_square
                                </span>
                            </a>
                            <a href="pacienteGer.php?idDel=<?php echo $row->idPac ?>
                                " class="btn btn-danger" onclick="return confirm('Deseja realmente excluir o registro')">
                                <span class="material-symbols-outlined">
                                    delete
                                </span>
                            </a>
                            <form action="consultar.php" method="post" style="display: inline-block;">
                                <input type="hidden" name="pacienteCon" value="<?php echo $row->idPac ?>">
                                <button type="submit" class="btn btn-success">
                                    <span class="material-symbols-outlined">
                                        description
                                    </span>
                                </button>
                            </form>
                        </td>
                        <td>
                            <img src="imagemPac/<?php echo $row->fotoPac; ?>" class="imgred" alt="Adicione uma image">
                            <!-- <?php echo $row->nomePac; ?> -->
                        </td>
                        <td>
                            <?php echo $row->nomePac; ?>
                        </td>
                        <td>
                            <?php echo $row->cidadePac; ?>
                        </td>
                        <td>
                            <?php echo $row->nascimentoPac; ?>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <div class="coll-12">
            <a href="pacienteGer.php" class="btn btn-primary">
                <span class="material-smbols-outlined">
                    Adicione um novo paciente
                </span>
            </a>
        </div>
    </main>
</body>

</html>