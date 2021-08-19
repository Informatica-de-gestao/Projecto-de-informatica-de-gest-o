<?php
require_once ("config.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">


<!-- profile22:59-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/ipb.png">
    <title>AJUDA.IPB</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>


<?php
//$cand = "SELECT *FROM utilizador WHERE Tipo_utilizador_ID_tipo = 1" ;

$id=$_SESSION["ID_utilizador"];
/* definir o charset utilizado na ligação */



$sql = "SELECT * FROM utilizador WHERE ID_utilizador = '$id'";
$result = $link->query($sql);


$bus= $result->fetch_assoc();
$Nome  = $bus['Nome'];
$username  = $bus['username'];
$Telefone = ( $bus['Telefone']);
$Email  = $bus['Email'];
$Morada  = $bus['Morada'];
$Localidade  = $bus['Localidade'];
$cp = $bus['Codigo_Postal'];
$Nif = $bus['Nif'];




/*
   // $sql = "UPDATE utilizador SET Nome='Doe' WHERE ID_utilizador=29";
    $id=29;
    $username="yuri";
    $Nome='Yuri gue';
    $Email= "yuriunns@gmail.com";
    $sql = "UPDATE utilizador SET Nome='$Nome',Email='$Email' WHERE ID_utilizador=$id";
echo $sql;


    $result=mysqli_prepare($link, $sql);

    if (mysqli_query($link, $sql)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($link);
    }

    mysqli_close($link);


    echo 'hhnjnjnjf';
*/


?>



<body>


<div class="main-wrapper">
    <div class="header">
        <div class="header-left">
            <a href="index.php" class="logo">
                <img src="assets/img/ipb.png" width="120" height="60" alt=""> <span>AJUDA.IPB</span>
            </a>
        </div>
        <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
        <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
        <ul class="nav user-menu float-right">
            <li class="nav-item dropdown has-arrow">
                <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img"><img class="rounded-circle" src="assets/img/user.jpg" width="40" alt="Admin">
							<span class="status online"></span></span>
                    <span><?php echo"$username" ?></span>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="perfil_adm.php">Meu Perfil</a>
                    <a class="dropdown-item" href="editar_perfil_adm.php">Editar Perfil</a>
                    <a class="dropdown-item" href="alterar_password.php">Alterar Password</a>
                    <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
            </li>
        </ul>
        <div class="dropdown mobile-user-menu float-right">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="perfil_adm.php">Meu Perfil</a>
                <a class="dropdown-item" href="editar_perfil_adm.php">Editar Perfil</a>
                <a class="dropdown-item" href="alterar_password.php">Alterar Password</a>
                <a class="dropdown-item" href="logout.php">Logout</a>
            </div>
        </div>
    </div>
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="menu-title">Principal</li>
                    <li>
                        <a href="perfil_adm.php"><i class="fa fa-user"></i> <span>Perfil</span></a>
                    </li>
                    <li>
                        <a href="../../assets/Instruction%20Manual%20for%20Safety%20and%20Comfort.pdf"><i class="fa fa-book"></i> <span>CV</span></a>
                    </li>
                    <li>
                        <a href="Orfertas_emprego.html"> <span>Ofertas Emprego/Estagio </span></a>
                    </li>
                    <li>
                        <a href="CandidaturaAluno.html"> <span>Candidaturas</span></a>
                    </li>

                </ul>
            </div>
        </div>
    </div>



    <?php

    /* Verificarmos  se foi enviado o pedido   */

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $id = filter_input(INPUT_GET, 'id');
        $operacao = filter_input(INPUT_GET, 'operacao');

        /* validar os dados recebidos através do pedido */
        if (empty($id) && $operacao!="Edit"){

            echo " Nada para editar!! ";
        }

    }
    else{ }




    /* estabelece a ligação à base de dados */
    require_once "config.php";

    $utilizador = $_SESSION['ID_utilizador'];
    /* texto sql da sql*/
    $Edit = "SELECT * FROM utilizador  WHERE ID_utilizador = '$utilizador'";

    /* executar a sql e testar se ocorreu erro */
    if (!$resultado = $link->query($Edit)) {
        echo ' Falha na sql: '. $link->error;
        $link->close();  /* fechar a ligação */
    }
    else {
        /* buscar os dados do registo */
        $row = $resultado->fetch_assoc();
    }
    ?>


    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-7 col-6">
                    <h4 class="page-title">Edição de Dados Pessoais </h4>
                </div>
                <form action="edit_adm.php" method="POST" class="form-signin">


                    <fieldset>

                <a href="perfil_adm.php"> <button style="background-color: #229bc6; color: #fff;" class="btn account-btn">Cancelar</button></a>

                        <button style="background-color: #229bc6; color: #fff;" class="btn account-btn" type="submit"  >Guardar Alterções</button>

                <div class="card-box profile-header">
                    <div class="row">
                        <div class="col-md-15">
                            <div class="profile-view">

                                <div class="page-wrapper">
                                    <div class="content">
                                        <div class="row">
                                            <div class="col-lg-8 offset-lg-2">

                                                    <h3 class="page-title">Contactos</h3>
                                                    <div class="row">
                                                        <div class="col-sm-9">
                                                        <div class="form-group">
                                                            <label>Username</label>
                                                            <input class="form-control" type="text" name="y_username" value=" <?=$row['username']?>">
                                                        </div>
                                                        </div>


                                                        <div class="col-sm-9">
                                                            <div class="form-group">
                                                                <label>Nome <span class="text-danger"></span></label>
                                                                <input class="form-control" type="text" name="y_Nome" value=" <?=$row['Nome']?>  ">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <div class="form-group">
                                                                <label>Email<span class="text-danger"></span></label>
                                                                <input class="form-control" type="text" name="y_Email" value=" <?=$row['Email']?> ">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <div class="form-group">
                                                                <label>Telefone<span class="text-danger"></span></label>
                                                                <input class="form-control" type="text" name="y_Telefone" value=" <?=$row['Telefone']?>  ">
                                                            </div>
                                                            <h3 class="page-title">Endereço Postal</h3>
                                                        </div>

                                                        <div class="col-sm-9">
                                                            <div class="form-group">
                                                                <label>Morada</label>
                                                                <input class="form-control " name="y_Morada" value=" <?=$row['Morada']?> " type="text">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <div class="form-group">
                                                                <label>Código Postal</label>
                                                                <input class="form-control " name="y_Codigo_Postal" value=" <?=$row['Codigo_Postal']?>  " type="text">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <div class="form-group">
                                                                <label>Localidade</label>
                                                                <input class="form-control " name="y_Localidade" value=" <?=$row['Localidade']?>  "type="text">
                                                            </div>
                                                    </div>
                                                        <div class="col-sm-9">
                                                            <div class="form-group">
                                                                <label>Nif</label>
                                                                <input class="form-control " name="y_Nif" value=" <?=$row['Nif']?>  "type="text">
                                                            </div>

                                                            </div>

                                                        </div>
                                                 </fieldset>
                                                </form>
                <?php

                    $resultado->free();/* libertar o resultado! */
                    $link->close();     /* fecha a ligação! */


                    ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
</div>
<div class="sidebar-overlay" data-reff=""></div>
<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.slimscroll.js"></script>
<script src="assets/js/app.js"></script>
</body>


<!-- profile23:03-->
</html>