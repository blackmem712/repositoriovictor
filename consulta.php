<?php

spl_autoload_register(function($class){

    require_once ".Classes/{$class}.class.php";
});
if (filter_has_var(INPUT_POST,'pacienteCon')){
    $idPac = filter_input(INPUT_POST,'pacieteCon');

}else{
    ?>
    <script>
        alert("Nenhum paciente selecionado");
        window.location
    </script>
}



















?>