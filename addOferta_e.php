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
            <a href="index.php" class="logo">
                <img src=assets/img/ipb.png" width="120" height="60" alt=""> <span>AJUDA.IPB</span>
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
                    <a class="dropdown-item" href="perfil_Empresa.php">Meu Perfil</a>
                    <a class="dropdown-item" href="editar_perfil_empresa.php">Editar Perfil</a>
                    <a class="dropdown-item" href="change-password.html">Alterar password</a>
                    <a class="dropdown-item" href="login_e.html">Logout</a>
                </div>
            </li>
        </ul>
        <div class="dropdown mobile-user-menu float-right">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="perfil_Empresa.php">Meu Perfil</a>
                <a class="dropdown-item" href="editar_perfil_empresa.php">Editar Perfil</a>
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
                        <a href="editar_perfil_empresa.php"><i class="fa fa-user"></i> <span>Perfil</span></a>
                    </li>
                    <li>
                        <a href="AddOferta.html"> <span>Inserir Ofertas </span></a>
                    </li>
                    <li>
                        <a href="Candidaturas_e.html"> <span>Candidaturas </span></a>
                    </li>
                    <li>
                        <a href="addOferta_e.php"> <span>Ofertas</span></a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-7 col-6">
                    <h4 class="page-title">Ofertas</h4>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="profile-basic">
                        <div class="row">
                            <div class="col-md-5">
                                <a class="text-muted">Ainda não foram introduzido qualquer Ofetas .</a>
                                <a class="text-muted">Para adicionar uma Oferta, precione o botão "Adicionar".</a>
                            </div>

                            <a href="InserirOfertas.html"> <button >Adicionar</button></a>



                            <div class="sidebar-overlay" data-reff=""></div>
                            <script src="assets/js/jquery-3.2.1.min.js"></script>
                            <script src="assets/js/popper.min.js"></script>
                            <script src="assets/js/bootstrap.min.js"></script>
                            <script src="assets/js/jquery.slimscroll.js"></script>
                            <script src="assets/js/app.js"></script>
</body>


<!-- profile23:03-->
</html>