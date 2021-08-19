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
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>AJUDA.IPB</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>

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
                        <span class="user-img"><img class="rounded-circle" src="/assets/img/user.jpg" width="40" alt="Admin">
							<span class="status online"></span></span>
                    <span>Perfil</span>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="perfil_Empresa.php">Meu Perfil</a>
                    <a class="dropdown-item" href="editar_perfil_empresa.php">Editar Perfil</a>
                    <a class="dropdown-item" href="alterar_password_empresa.php">Alterar password</a>
                    <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
            </li>
        </ul>
        <div class="dropdown mobile-user-menu float-right">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="perfil_Empresa.php">Meu Perfil</a>
                <a class="dropdown-item" href="editar_perfil_empresa.php">Editar Perfil</a>
                <a class="dropdown-item" href="alterar_password_empresa.php">Alterar password</a>
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
                        <a href="perfil_Empresa.php"><i class="fa fa-user"></i> <span>Perfil</span></a>
                    </li>
                    <li>
                        <a href="../Empresa/AddOferta.html"> <span>Inserir Ofertas </span></a>
                    </li>
                    <li>
                        <a href="Candidaturas_e.html"> <span>Candidaturas </span></a>
                    </li>
                    <li>
                        <a href="oferta_e.php"> <span>Ofertas</span></a>
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

    $empresa = $_SESSION['ID_empresa'];
    /* texto sql da sql*/
    $Edit = "SELECT * FROM empresa  WHERE ID_empresa = '$empresa'";

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
                    <h4 class="page-title">Edição de Dados da Empresa </h4>
                </div>

                <form action="edit_emp.php" method="POST" class="form-signin">

                    <fieldset>
                <a href="perfil_Empresa.php"> <button style="background-color: #229bc6; color: #fff;" class="btn account-btn">Cancelar</button></a>
                <a> <button style="background-color: #229bc6; color: #fff;" class="btn account-btn" type="submit">  Guardar Alterações</button></a>

                <div class="card-box profile-header">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="profile-view">

                                <div class="page-wrapper">
                                    <div class="content">
                                        <div class="row">
                                            <div class="col-lg-8 offset-lg-2">
                                                <form>
                                                    <h6 class="page-title">Contactos</h6>
                                                    <div class="row">
                                                        <div class="col-sm-9">
                                                            <div class="form-group">
                                                                <label>Nome <span class="text-danger"></span></label>
                                                                <input class="form-control" name="z_Nome" type="text" value="<?=$row['Nome']?>">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-9">
                                                            <div class="form-group">
                                                                <label>Username <span class="text-danger"></span></label>
                                                                <input class="form-control" name="z_username" type="text" value="<?=$row['username']?>">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-9">
                                                            <div class="form-group">
                                                                <label>Nif<span class="text-danger"></span></label>
                                                                <input class="form-control" name="z_Nif" type="text" value="<?=$row['Nif']?>">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-9">
                                                            <div class="form-group">
                                                                <label>Email<span class="text-danger"></span></label>
                                                                <input class="form-control" name="z_Email" type="text" value="<?=$row['Email']?>">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-9">
                                                            <div class="form-group">
                                                                <label>Telefone<span class="text-danger"></span></label>
                                                                <input class="form-control" name="z_Telefone" type="text" value="<?=$row['Telefone']?>">
                                                            </div>
                                                        </div>

                                                        <div>
                                                            <h6 class="page-title">Endereço Postal</h6>
                                                        </div>

                                                        <div class="col-sm-9">
                                                            <div class="form-group">
                                                                <label>Morada</label>
                                                                <input class="form-control " name="z_Morada"  value="<?=$row['Morada']?>" type="text">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-9">
                                                            <div class="form-group">
                                                                <label>Código Postal</label>
                                                                <input class="form-control " name="z_Codigo_Postal" value="<?=$row['Codigo_Postal']?>" type="text">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-9">
                                                            <div class="form-group">
                                                                <label>Localidade</label>
                                                                <input class="form-control " name="z_Localidade" value="<?=$row['Localidade']?>" type="text">
                                                            </div>
                                                        </div>

                                                    <h6 class="page-title">Informação da Empresa</h6>
                                                    <div class="col-sm-9">
                                                        <div class="form-group">
                                                            <label>Área</label>
                                                            <input class="form-control " value="" type="text">
                                                        </div>
                                                    </div>
                                              </fieldset>
                                                </form>

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