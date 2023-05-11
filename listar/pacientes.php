<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="css/layout.css">
    <title>Pacientes</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Clinica IFRO</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="#" href="pacientes.php">Paciente</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="#" href="especialidade.php">especialidade</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="medico.php">Médico</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link">Consultas</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="mt-3">
        <div class="container mt-3">
            <div class="d-flex flex-row-reverse">
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="col-md-6">
              <div class="input-group mb-3">
                <div class="form-floating">
                    <input type="text" class="form-control" id="txtPesquisar" placeholder="Pesquisar" name="txtPesquisar">
                    <label for="pesquisar">Pesquisar</label>
                </div>
                <button class="btn btn-outline-secondary" type="submit" id="btnPesquisar" name="btnPesquisar">
                    <span class="material-symbols-outlined">
                        search
                    </span>
                </button>
              </div>
            </form>
            </div>
        </div>
           
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th>Açoẽs</th>
                        <th>Foto</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Celular</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    spl_autoload_register(function ($class) {
                        require_once "./Classes/{$class}.class.php";
                    });
                    $paciente = new Paciente();

                    if(filter_has_var(INPUT_POST,"txtPesquisar")){
                        $parametro = filter_input(INPUT_POST,'txtPesquisar');
                        $where = "where (nomePac like '%$parametro%') or (emailPac like '%$parametro%')";
                        $dadosBanco = $paciente->listar($where);
                    }else{
                        $dadosBanco = $paciente->listar();
                    }

                    while($row = $dadosBanco->fetch_object()){
                    ?>
                    <tr>
                        <td>
                            <a href="pacienteGer.php?id=<?php echo $row->idPac ?>" class="btn btn-info">
                                <span class="material-symbols-outlined">
                                    edit_square
                                </span>
                            </a>
                            <a href="#" class="btn btn-danger">
                                <span class="material-symbols-outlined">
                                    delete
                                </span>
                            </a>
                        </td>
                        <td>
                            <img src="imagesPac/<?php echo $row->fotoPac;?>" alt="Foto do paciente <?php echo $row->nomePac; ?>" class="imgred">
                        </td>
                        <td><?php echo $row->nomePac; ?></td>
                        <td><?php echo $row->emailPac; ?></td>
                        <td><?php echo $row->celularPac; ?></td>
                    </tr>
                    <?php 
                } ?>
                </tbody>
            </table>
            <div class="col-12">
                <a href="pacienteGer.php" class="btn btn-primary">Novo Paciente</a>
            </div>
        </div>
    </main>

</body>

</html>