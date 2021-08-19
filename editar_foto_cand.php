<?php
session_start();
require("config.php");

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
}

if(isset($_SESSION["loggedin"])){
    if($_SESSION["loggedin"] == true && $_SESSION["Tipo_utilizador_ID_tipo"]!=2){
        header("location: perfil_candidato.php");
    }
}



if(!empty($_POST['imagem'])) {

    /*imagens*/
    print_r($_FILES);
    $imagem = $_FILES['imagem'];

    $imagemName = $_FILES['imagem']['name'];
    $imagemTmpName = $_FILES['imagem']['tmp_name'];
    $imagemSize = $_FILES['imagem']['size'];
    $imagemError = $_FILES['imagem']['error'];
    $imagemType = $_FILES['imagem']['type'];

    $imagemExt = explode('.', $imagemName);
    $imagemActualExt = strtolower(end($imagemExt));

    $allowed = array('jpg', 'jpeg', 'png', 'pdf');
    /*
    print_r($_FILES);
    $video = $_FILES['video'];
    $videoName = $_FILES['video']['name'];
    $videoTmpName = $_FILES['video']['tmp_name'];
    $videoSize = $_FILES['video']['size'];
    $videoError = $_FILES['video']['error'];
    $videoType = $_FILES['video']['type'];

    $videoExt = explode('.', $videoName);
    $videoActualExt = strtolower(end($videoExt));

    $allowed = array('mp4');
video*/
    $sql = "INSERT INTO utilizador( imagens) VALUES (".$imagem['name'].")";
    if (!mysqli_query($link, $sql)) {
        print_r(mysqli_error($link));


        if (in_array($imagemActualExt, $allowed)) {
            if ($imagemError === 0) {
                if ($imagemSize < 1000000) {
                    $imagemNameNew = uniqid('', true) . "." . $imagemActualExt;
                    $imagemDestination = 'imagem/' . $imagemNameNew;
                    move_uploaded_file($imagemTmpName, $imagemDestination);
                    //header("Location:cadastro_produtos.php");
                } else {
                    echo "Sua imagens e muito grande";
                }
            } else {
                echo " Houve um erro ao fazer o upload";
            }
        } else {
            echo "Não podes fazer upload deste tipo de imagens";
        }
        /*video
        if (in_array($videoActualExt, $allowed)) {
            if ($videoError === 0) {
                if ($videoSize < 1000000) {
                    $videoNameNew = uniqid('', true) . "." . $videoActualExt;
                    $videoDestination = 'video/' . $videoNameNew;
                    move_uploaded_file($videoTmpName, $videoDestination);
                    //header("Location:cadastro_produtos.php");
                } else {
                    echo "Seu video e muito grande";
                }
            } else {
                echo " Houve um erro ao fazer o upload";
            }
        } else {
            echo "Não podes fazer upload deste tipo de video";
        }
*/


    }

    header("Location:receita.php");

}



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
                        <span class="user-img"><img class="rounded-circle" src="assets/img/user.jpg" width="40" alt="Admin">
							<span class="status online"></span></span>
                    <span>Perfil</span>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="profile.html">Meu Perfil</a>
                    <a class="dropdown-item" href="Ca.html">Editar Perfil</a>
                    <a class="dropdown-item" href="change-password.html">Alterar Password</a>
                    <a class="dropdown-item" href="../../Login/login.html">Logout</a>
                </div>
            </li>
        </ul>
        <div class="dropdown mobile-user-menu float-right">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="profile.html">Meu Perfil</a>
                <a class="dropdown-item" href="Ca.html">Editar Perfil</a>
                <a class="dropdown-item" href="change-password.html">Alterar Password</a>
                <a class="dropdown-item" href="../../Login/login.html">Logout</a>
            </div>
        </div>
    </div>
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="menu-title">Principal</li>
                    <li>
                        <a href="profile.html"><i class="fa fa-user"></i> <span>Perfil</span></a>
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
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-7 col-6">
                    <h4 class="page-title">Foto</h4>
                </div>
                <a href=""> <button>Cancelar</button></a>
                <a> <button>Guardar Alterações</button></a>
            </div>
            <div class="card-box profile-header">
                <div class="row">
                    <div class="col-md-12">
                        <div class="profile-view">
                            <div class="profile-img-wrap">
                                <div class="profile-img">
                                     <a href="#"><img class="avatar" src="imagem/yuri.png" alt=""></a>
                                    <a href="perfil_candidato.php?acao=add&id=" class="photo"><?php echo '<img src="./imagem/'.$result['imagem'].'" height="250px"/>' ?></a>

                                </div>

                            </div>
                            <div class="profile-basic">

                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="profile-info-left">
                                            <h5 class="user-name m-t-0 mb-10">Foto Actual </h5>

                                        </div>

                                        <input id="file" name="file" type="file" />
                                    </div>
                                    <div class="col-md-7">
                                        <ul class="personal-info">


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