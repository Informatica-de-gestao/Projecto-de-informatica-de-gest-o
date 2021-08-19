<?php

//Dados da bases de dados


define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'ajuda');


$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
// Check connection
if($link === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());
}

return new PDO(sprintf("mysql:host=%s;dbname=%s", DB_SERVER, DB_NAME), DB_USERNAME, DB_PASSWORD,
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

?>


