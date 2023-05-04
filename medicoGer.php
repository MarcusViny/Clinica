<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Estilos/stylo.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>medicos</title>
</head>

<body id="meu-body">
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
                            <a class="nav-link " href="especialidadeGer.php#">Especialidade</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="especialidade.php">Consultar Especialidade</a>
                        </li>
                        <li class="nav-item <?php if (basename($_SERVER['PHP_SELF']) == 'pacienteGer.php') echo 'active'; ?>">
                            <a class="nav-link" href="pacienteGer.php">Paciente</a>
                        </li>
                        <li class="nav-item">
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
    <main>
        <div class="container mt-3">
            <div class="input-container">
                <?php
                spl_autoload_register(function ($class) {
                    require_once "./Classes/{$class}.class.php";
                });
                if (fiLter_has_var(INPUT_GET, "id")) {
                    $id = filter_input(INPUT_GET, 'id');
                    $medico = new Medico();
                    $editMed = $medico->buscar('idMed', $id);
                }
                if (fiLter_has_var(INPUT_GET, "idDel")) {
                    $medico = new medico();
                    $id = filter_input(INPUT_GET, 'idDel');
                    if ($medico->deletar('idMed', $id)) {
                        header("location:medico.php");
                    }
                }
                if (filter_has_var(INPUT_POST, 'btnGravar')) {

                    $medico = new medico();
                    $id = filter_input(INPUT_POST, 'txtId');
                    $medico->setIdMed($id);
                    $medico->setNomeMed(filter_input(INPUT_POST, 'txtNome'));
                    $medico->setCrmMed(filter_input(INPUT_POST, 'txtCrm'));
                    $medico->setEspecialidadeMed(filter_input(INPUT_POST, 'txtEspecialidade'));
                    $medico->setEmailMed(filter_input(INPUT_POST, 'txtEmail'));
                    $medico->setCelularMed(filter_input(INPUT_POST, 'txtCelular'));
                    if (empty($id)) {
                        $medico->inserir();
                    } else {
                        $medico->atualizar('idMed', $id);
                    }
                } ?>
                <form class="row g-3" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="txtId" value="<?php echo isset($editMed->idMed) ? $editMed->idMed : null; ?>">
                    <input type="hidden" name="nomeAntigo" value="<?php isset($editMed->fotoMed) ? $editMed->fotoMed : null; ?>">
                    <div class="col-12">
                        <label for="txtNome" class="form-label">Nome <span class="required">*</span></label>
                        <input type="text" class="form-control" id="txtNome" placeholder="Digite seu nome..." name="txtNome" value="<?php echo isset($editMed->nomeMed) ? $editMed->nomeMed : null; ?>" required>
                    </div>
                    <div class="col-md-12">
                        <label for="txtCrm" class="form-label">Crm <span class="required">*</span> </label>
                        <input type="text" class="form-control" id="txtCrm" placeholder="Digite seu Crm..." name="txtCrm" value="<?php echo isset($editMed->crmMed) ? $editMed->crmMed : null; ?>">
                    </div>
                    <div class="col-md-12">
                        <label for="txtEspecialidade" class="form-label">Especialidade</label>
                        <input type="text" class="form-control" id="txtEspecialidade" placeholder="Digite sua Especialidade..." name="txtEspecialidade" value="<?php echo isset($editMed->crmMed) ? $editMed->especialidadeMed : null; ?>">
                    </div>
                    <div class="col-12">
                        <label for="txtEmail" class="form-label">E-mail </label>
                        <input type="email" class="form-control" id="txtEmail" placeholder="Digite seu email..." name="txtEmail" value="<?php echo isset($editMed->emailMed) ? $editMed->emailMed : null; ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="txtCelular" class="form-label">Celular <span class="required">*</span></label>
                        <input type="text" class="form-control" id="txtCelular" name="txtCelular" value="<?php echo isset($editMed->celularMed) ? $editMed->celularMed : null; ?>">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary" name="btnGravar">Gravar</button>
                    </div>
                </form>
            </div>
            <style>
                .input-container {
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
                    padding: 20px;
                }
            </style>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="Estilos/email.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>