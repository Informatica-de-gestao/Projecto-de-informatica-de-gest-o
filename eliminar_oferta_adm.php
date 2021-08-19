<?php
session_start();
require("config.php");


$oferta_2 = $_GET['ID_oferta'];
$apagar_2 ="DELETE FROM oferta WHERE ID_oferta = $oferta_2";
$resultado=$link->query($apagar_2);


if ($resultado=$link->query($apagar_2)) {
    echo "O registro da oferta foi excluido";
    header( "location: gerir_oferta_adm.php");
} else {


    echo "Infelizmente não foi possivel eliminarr a oferta";
}

?>

