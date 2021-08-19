<?php
session_start();
require("config.php");

/* Ver se o formulário foi submetido */

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ID_oferta = filter_input(INPUT_POST, 'r_ID_oferta');
    $Titulo = filter_input(INPUT_POST, 'r_Titulo');
    $Vagas = filter_input(INPUT_POST, 'r_Vagas');
    $Descricao= filter_input(INPUT_POST, 'r_Descricao');
    $Regime= filter_input(INPUT_POST, 'r_Regime');
    $Categoria_Salarial = filter_input(INPUT_POST, 'r_Categoria_Salarial');
    $Empresa_ID_empresa = filter_input(INPUT_POST, 'r_Empresa_ID_empresa');
    $Estado = filter_input(INPUT_POST, 'r_Estado');
    $Area_id_Area = filter_input(INPUT_POST, 'r_Area_id_Area');
    $Data_Criacao = filter_input(INPUT_POST, 'r_Data_Criacao');
    $Local_ID_local= filter_input(INPUT_POST, 'r_Local_ID_local');
    $Tipo_da_Oferta_ID_tipo= filter_input(INPUT_POST, 'r_Tipo_da_Oferta_ID_tipo');




    /* validar os dados recebidos do formulario */
    if (empty($Titulo)){
        echo "Todos os campos do formulário devem conter valores ";
        exit();
    }
}
else{
    echo " ERRO - Não foi possível executar a operação editar. ";
    exit();
}


/* texto sql da sql*/
$sql = "UPDATE oferta SET  Titulo ='$Titulo', Vagas=$Vagas, Descricao='$Descricao', Regime='$Regime', Categoria_Salarial='$Categoria_Salarial', Empresa_ID_empresa=' $Empresa_ID_empresa', Estado='$Estado', Area_idArea='$Area_id_Area', Data_Criacao='$Data_Criacao', Local_ID_local='$Local_ID_local', Tipo_da_Oferta_ID_tipo='$Tipo_da_Oferta_ID_tipo' where ID_oferta=$ID_oferta ";

/* executar a sql e testar se ocorreu erro */
if (!$link->query($sql)) {
    echo " ERRO - Falha ao executar a sql: \"$sql\" <br>" . $link->error;
    $link->close();  /* fechar a ligação */
}
else{
    /* percorrer os registos (linhas) da tabela e mostrar na página */
    header("location: gerir_oferta_adm.php");
}
$link->close();  /* fechar a ligação */
?>

