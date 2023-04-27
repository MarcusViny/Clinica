<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Estilos/stylo.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Especialidade</title>
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
                            <a class="nav-link active" aria-current="page" href="especialidadeGer.php#">Especialidade</a>
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
                    $especialidade = new Especialidade();
                    $editEsp = $especialidade->buscar('idEsp', $id);
                }
                if (fiLter_has_var(INPUT_GET, "idDel")) {
                    $especialidade = new Especialidade();
                    $id = filter_input(INPUT_GET, 'idDel');
                    if ($especialidade->deletar('idEsp', $id)) {
                        header("location:especialidade.php");
                    }
                }
                if (filter_has_var(INPUT_POST, 'btnGravar')) {
                    $especialidade = new Especialidade();
                    $id = filter_input(INPUT_POST, 'txtId');
                    $especialidade->setIdEsp($id);
                    $especialidade->setNomeEsp(filter_input(INPUT_POST, 'txtNome'));
                    $especialidade->setSelecEsp(filter_input(INPUT_POST, 'sltEsp'));

                    if (empty($id)) {
                        $especialidade->inserir();
                    } else {
                        $especialidade->atualizar('idEsp', $id);
                    }
                } ?>
                <form class="row g-3" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="txtId" value="<?php echo isset($editEsp->idEsp) ? $editEsp->idEsp : null; ?>">
                    <div class="col-12">
                        <label for="txtNome" class="form-label">Nome <span class="required">*</span></label>
                        <input type="text" class="form-control" id="txtNome" placeholder="Digite seu nome..." name="txtNome" value="<?php echo isset($editEsp->nomePac) ? $editEsp->nomePac : null; ?>">
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Ativo   
                        </label>
                    </div>
                    <div class="form-check" style="display: inline-block;">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Inativo
                        </label>
                    </div>
                    <div class="col-md-4">
                        <label for="sltEsp" class="form-label">Especialidade</label>
                        <?php $espSelec = isset($editEsp->SelecEsp) ?
                            $editEsp->SelecEsp : null; ?>
                        <select id="sltEsp" class="form-select" name="sltEsp">
                            <option value="" selected hidden>Escolha...</option>
                            <option value="E.M.M.T" <?php if ($espSelec == "E.M.M.T") {
                                                        echo 'selected';
                                                    } ?>>Especialização médica e mercado de trabalho</option>
                            <option value="R.M.T.E" <?php if ($espSelec == "R.M.T.E") {
                                                        echo 'selected';
                                                    } ?>>Residência Médica e Título de Especialista</option>
                            <option value="E.M.A.A.F.A" <?php if ($espSelec == "E.M.A.A.F.A") {
                                                            echo 'selected';
                                                        } ?>>Especialidades médica, áreas de atuação e formas de acesso</option>
                            <option value="E.A" <?php if ($espSelec == "E.A") {
                                                    echo 'selected';
                                                } ?>>Especialista em Acupuntura.
                            </option>
                            <option value="E.A.I" <?php if ($espSelec == "E.A.I") {
                                                        echo 'selected';
                                                    } ?>>Especialista em Alergia e Imunologia</option>
                            <option value="E.A" <?php if ($espSelec == "E.A") {
                                                    echo 'selected';
                                                } ?>>Especialista em Anestesiologista.
                            </option>
                            <option value="E.ANGI" <?php if ($espSelec == "E.ANGI") {
                                                        echo 'selected';
                                                    } ?>>Especialista em Angiologia.
                            </option>
                        </select>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary" name="btnGravar">Gravar</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>