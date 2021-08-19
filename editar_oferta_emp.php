<?php
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

<body>
<div class="main-wrapper">
    <div class="header">
        <div class="header-left">
            <a href="index.html" class="logo">
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
                    <span>Perfil</span>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="PerfillEmpresa.html">Meu Perfil</a>
                    <a class="dropdown-item" href="EditarPerfil_e.html">Editar Perfil</a>
                    <a class="dropdown-item" href="change-password.html">Alterar password</a>
                    <a class="dropdown-item" href="login_e.html">Logout</a>
                </div>
            </li>
        </ul>
        <div class="dropdown mobile-user-menu float-right">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="PerfillEmpresa.html">Meu Perfil</a>
                <a class="dropdown-item" href="EditarPerfil_e.html">Editar Perfil</a>
                <a class="dropdown-item" href="change-password.html">Alterar password</a>
                <a class="dropdown-item" href="login_e.html">Logout</a>
            </div>
        </div>
    </div>
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="menu-title">Principal</li>
                    <li>
                        <a href="PerfillEmpresa.html"><i class="fa fa-user"></i> <span>Perfil</span></a>
                    </li>
                    <li>
                        <a href="AddOferta.html"> <span>Inserir Ofertas </span></a>
                    </li>
                    <li>
                        <a href="Candidaturas_e.html"> <span>Candidaturas </span></a>
                    </li>
                    <li>
                        <a href="Oferta_e.html"> <span>Ofertas</span></a>
                    </li>

                </ul>
            </div>
        </div>
    </div>

    <?php

    /* Verificar se foi enviado o pedido para eliminar  */

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $id = filter_input(INPUT_GET, 'id');
        $operacao = filter_input(INPUT_GET, 'operacao');

        /* validar os dados recebidos através do pedido */
        if (empty($id) && $operacao!="editar"){

            echo " Nada para editar!! ";
        }

    }
    else{




    }


    /* estabelece a ligação à base de dados */
    require("config.php");

    /* definir o charset utilizado na ligação */
    $link->set_charset("utf8");

    /* texto sql da consulta*/
    $editar = "SELECT oferta.*, empresa.*, area.*, tipo_da_oferta.*, local.* FROM oferta INNER JOIN empresa ON empresa.ID_empresa = oferta.Empresa_ID_empresa INNER JOIN area ON area.idArea = oferta.Area_idArea INNER JOIN tipo_da_oferta ON tipo_da_oferta.ID_tipo = oferta.Tipo_da_Oferta_ID_tipo INNER JOIN local ON local.ID_local = oferta.Local_ID_local  WHERE ID_oferta = '$id' ";

    /* executar a consulta e testar se ocorreu erro */
    if (!$resultado = $link->query($editar)) {
        echo ' Falha na consulta: '. $link->error;
        $link->close();  /* fechar a ligação */
    }
    else{
    /* buscar os dados do registo */
    $row = $resultado->fetch_assoc();

    ?>





    <div class="page-wrapper">

        <div class="content">
            <div class="row">
                <div class="col-sm-7 col-6">
                    <h4 class="page-title">Alteração da Oferta </h4>
                </div>
                <form method="post" action="edit_oferta_emp.php">
                <a href="perfil_Empresa.php"> <button style="background-color: #229bc6; color: #fff;" class="btn account-btn">Cancelar</button></a>
                <a> <button type="submit" style="background-color: #229bc6; color: #fff;" class="btn account-btn">Guardar Alterações</button></a>

                <div class="card-box profile-header">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="profile-view">

                                <div class="page-wrapper">
                                    <div class="content">
                                        <div class="row">
                                            <div class="col-lg-8 offset-lg-2">
                                                <form>
                                                    <div class="row">
                                                        <div class="col-sm-9">
                                                            <div class="form-group">
                                                                <label>Titulo <span class="text-danger"></span></label>
                                                                <input name="r_Titulo" class="form-control" type="text" value="<?=$row['Titulo']?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <div class="form-group">
                                                                <label>Vagas<span class="text-danger"></span></label>
                                                                <input name="r_Vagas" class="form-control" type="text" value="<?=$row['Titulo']?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <div class="form-group">
                                                                <label>Tipo de Oferta<span class="text-danger"></span></label>
                                                                <input name="r_Tipo_da_Oferta_ID_tipo" class="form-control" type="text" value="<?=$row['Tipo']?>">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-9">
                                                            <div class="form-group">
                                                                <label>Descrição</label>
                                                                <input name="r_Descricao" class="form-control " value="<?=$row['Descricao']?>" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <div class="form-group">
                                                                <label>Categoria Salarial</label>
                                                                <input name="r_Categoria_Salarial" class="form-control " value="<?=$row['Categoria_Salarial']?>" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <div class="form-group">
                                                                <label>Regime</label>
                                                                <input name="r_Regime" class="form-control " value="<?=$row['Regime']?>" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <div class="form-group">
                                                                <label>Empresa</label>
                                                                <input name="r_Empresa_ID_empresa" class="form-control " value="<?=$row['Nome']?>" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label>Estado</label>
                                                                <input name="r_Estado" class="form-control " value="<?=$row['Estado']?>" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <div class="form-group">
                                                                <label>Local de Trabalho</label>
                                                                <input name="r_Local_ID_local" class="form-control " value="<?=$row['Local']?>" type="text">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-9">
                                                            <div class="form-group">
                                                                <label>Área</label>
                                                                <input name="r_Area_id_Area" class="form-control " value="<?=$row['Area']?>" type="text">
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="form-group">
                                                        <label>Data de Criação</label>
                                                        <input name="r_Data_Criacao" id="date" value="<?=$row['Data_Criacao']?>" type="date">
                                                    </div>
                                                        <input name="r_ID_oferta" class="form-control " value="<?=$row['ID_oferta']?>" type="hidden">
                                            </div>

                                                </form>
                                                <?php
                                                    $resultado->free();/* libertar o resultado */

                                                    $link->close();       /* close a ligação */
                                                    }
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
