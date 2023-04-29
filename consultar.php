<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="Estilos/stylo.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Consultar Especialidade</title>
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
                                <a class="nav-link" href="especialidadeGer.php">Especialidade</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="especialidade.php">Consultar Especialidade</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="pacienteGer.php">Paciente</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="pacientes.php">Relatorio de Pacientes</a>
                            </li>
                            <li class="nav-item <?php if (basename($_SERVER['PHP_SELF']) == 'consultar.php') echo 'active'; ?>">
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
        <form class method="POST" action="consulta-paciente.php">
            <label for="busca">Buscar paciente:</label>
            <input type="text" name="busca" id="busca">
            <button type="submit">Buscar</button>
        </form>
    </main>
</body>

</html>