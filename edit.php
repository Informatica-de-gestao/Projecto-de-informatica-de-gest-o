<?php
require_once ("config.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_SESSION["ID_utilizador"];
    $username = filter_input(INPUT_POST, 'x_username');
    $Nome = filter_input(INPUT_POST, 'x_Nome');
    $Email = filter_input(INPUT_POST, 'x_Email');
    $Telefone = filter_input(INPUT_POST, 'x_Telefone');
    $Morada = filter_input(INPUT_POST, 'x_Morada');
    $Localidade = filter_input(INPUT_POST, 'x_Localidade');
    $Codigo_Postal= filter_input(INPUT_POST, 'x_Codigo_Postal');
    $Nif= filter_input(INPUT_POST, 'x_Nif');
    $Habilitacoes= filter_input(INPUT_POST, 'x_Habilitacoes');
   






    if (empty($username)){
        echo "Todos os campos do formulário devem conter valor! ";
        exit();
    }

}
else{
    echo "  Não foi possível edita!. ";
    exit();
}


$Edit ="UPDATE utilizador SET username='$username', Nome='$Nome', Email= '$Email', Telefone='$Telefone',Morada='$Morada',Localidade='$Localidade' ,Codigo_Postal='$Codigo_Postal',Nif='$Nif'   WHERE ID_utilizador = '$id'";

if (!$link->query($Edit)) {
    echo " Falha ao executar a consulta: \"$Edit\" <br>" . $link->error;
    $link->close();  /* fechar a ligação */

} else {

    header( "location:perfil_candidato.php");
    $link->close();
}

?>