<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Pacientes</title>
</head>

<body>

    <body>
        <header>
            <nav class="navbar bg-dark navbar-expand-lg" data-bs-theme="dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Clinica IFRO</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="especialidadeGer.php">Especidade</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="pacienteGer.php">Paciente</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Médico</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link">Consultas</a>
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
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">Insta</th>
                </tr>
            </thead>
            <tbody>
                <?php
                spl_autoload_register(function($class){
                    require_once "./Classes/{$class}.class.php";
                }); 
                $paciente = new Paciente();
                $dadosBanco = $paciente->listar();
                while($row = $dadosBanco->fetch_object()){
                    ?>
                <tr>
                    <td>
                        <a href="#" class="btn btn-secondary">
                            <span
                                class="material-symbols-outlined">
                                delete
                            </span>
                        </a>
                    </td>
                    <td>
                        <img src="imagemPac/<?php echo $row->fotoPac;?>" alt="Foto do paciente <?
                        php echo $row->nomePac; ?>" class="imgRed">
                    </td>
                    <td>@mdo</td>
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