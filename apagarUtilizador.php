<?php

session_start();
require("config.php");


$utilizador = $_GET['ID_utilizador'];
$apagar = "DELETE FROM utilizador WHERE ID_utilizador = $utilizador";
$resultado = $link->query($apagar);

/* texto sql da sql*/
if ($resultado['ID_tipo'] == 1) {
    echo " Erro - Não pode fazer esta operação. ";
    echo ' <br> <a href="gerir_utilizador.php"> Voltar a gerir  utilizador  </a>';
    exit();
}


if ($resultado = $link->query($apagar)) {
    echo "O registro foi apagado";
    header("location: gerir_utilizador.php");
} else {


    echo "Infelizmente não é possivel excluir";

    header("location: gerir_utilizador.php");
}


