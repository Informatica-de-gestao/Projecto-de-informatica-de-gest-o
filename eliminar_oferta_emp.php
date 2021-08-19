<?php
session_start();
require("config.php");


$oferta = $_GET['ID_oferta'];
$apagar ="DELETE FROM oferta WHERE ID_oferta = $oferta";
$resultado=$link->query($apagar);


if ($resultado=$link->query($apagar)) {
    echo "O registro da oferta foi excluido";
    header( "location: oferta_e.php");
} else {


    echo "Infelizmente não foi possivel eliminarr a oferta";
}

?>

