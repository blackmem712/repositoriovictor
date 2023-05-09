<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>titulo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">CLINICA IFRO</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
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
                            <a class="nav-link" href="">Médico</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link">Consultas</a>
                        </li>
                    </ul>
                </div>
                
            </div>
        </nav>
    </header>
    <main>
        <div class="container">
            <?php
            spl_autoload_register(function ($class) {
                require_once "./Classes/{$class}.class.php";
            });
            if(filter_has_var(INPUT_GET,'id')){
                $medico = new Medico();
                $id= filter_input(INPUT_GET,'id'); 
                echo $id;
                $pacEdict = $medico->buscar('idPac',$id);  
            }


            if (filter_has_var(INPUT_POST, 'btnGravar')) {
                
            

            $medico = new Medico();


             $medico->setEspecialidadeMed(filter_input(INPUT_POST, 'sltEspecialidade'));
             $medico->setNomeMed(filter_input(INPUT_POST, 'txtNome'));
             $medico->setCrmMed(filter_input(INPUT_POST, 'txtCRM'));        
             $medico->setEmailMed(filter_input(INPUT_POST, 'txtEmail'));
             $medico->setCelularMed(filter_input(INPUT_POST, 'txtCelular'));

           
            if (empty($id)) {
                $medico->inserir();
            } else {
                $medico->atualizar('idMed', $id);
            }
        }
            ?>

            <form class="row g-3" action="<?php echo
                htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                 <div class="col-md-4">
                    <label for="sltEspecialidade" class="form-label">especialidade</label>
                    <select id="sltEspecialidade" class="form-select" name="sltEspecialidade">
                        <?php $espSel = isset($medEdict ->EspecialidadeMed)?
                        $medEdict->EspecialidadeMed: null ?>
                        <option value="" selected hidden>Escolha...</option>  
                        <?php
                        
                        $especialidade = new Especialidade;
                        $dadosBanco = $especialidade-> listar();
                        while ($row = $dadosBanco->fetch_object()){ 
                        ?>
                        <option value="<?php echo $row->idEsp ?>"
                        <?php
                        if ($espSel === $row->idEsp){
                            echo 'select';
                        }
                        ?>
                        >
                        <?php
                           echo $row->NomeEsp 
                        ?>
                        </option> 
                        <?php } ?>  
                    </select>
                </div>
                <div class="col-12">
                    <label for="txtNome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="txtNome" placeholder="Digite seu nome..."
                        name="txtNome" value="<?php echo isset($pacEdict->nomeMed)?$pacEdict->nomeMed:null?>"  >
                </div>
                <div class="col-md-6">
                    <label for="txtCRM" class="form-label">CRM</label>
                    <input type="text" class="form-control" id="txtCRM" name="txtCRM"
                    value="<?php echo isset($pacEdict->crmMed)?$pacEdict->crmMed:null?>">
                </div>
 
                <div class="col-12">
                    <label for="txtEmail" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="txtEmail" placeholder="Digite seu email..."
                        name="txtEmail"  
                        value="<?php echo isset($pacEdict->emailMed)?$pacEdict->emailMed:null?>">
                </div>
                <div class="col-md-6">
                    <label for="txtCelular" class="form-label">Celular</label>
                    <input type="text" class="form-control" id="txtCelular" name="txtCelular"
                    value="<?php echo isset($pacEdict->celularMed)?$pacEdict->celularMed:null?>">
                </div>
                
                <div class="col-12">
                    <button type="submit" class="btn btn-primary" name="btnGravar">Gravar</button>
                </div>
            </form>
        </div>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>