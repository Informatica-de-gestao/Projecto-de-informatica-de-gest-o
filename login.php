<?php
// Initialize the session
session_start();

// Check if the perfil_users is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"])){
    if($_SESSION["loggedin"] == true && $_SESSION["Tipo_utilizador_ID_tipo"]== 1) {
        header("location: perfil_adm.php");                                      //adm
    }else{

       header("location: perfil_candidato.php");
    }

}


// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$username  = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){


    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Digite o nome de utilizador.";
    } else{
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if(empty(trim($_POST["Password"]))){
        $password_err = "Por favor, insira sua senha.";
    } else{
        $password = trim($_POST["Password"]);
    }

    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT utilizador.ID_utilizador, username, Password, Tipo_utilizador_ID_tipo FROM utilizador  inner join tipo_utilizador on utilizador.Tipo_utilizador_ID_tipo = tipo_utilizador.ID_tipo  WHERE username = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = $username;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store resultado
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){
                    // Bind resultado variables

                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password, $tipo);
                    if(mysqli_stmt_fetch($stmt)){
                        $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

                        if(password_verify($password, $hashed_password)) {
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["ID_utilizador"] = $id;
                            $_SESSION["Tipo_utilizador_ID_tipo"] = $tipo;
                            $_SESSION["username"] = $username;

                            // Redirect perfil_users to welcome page
                            if($tipo==1) {

                                header("location:  perfil_adm.php ");
                            }else{
                                header("location: perfil_candidato.php");
                            }

                        }


                        else{
                            // Display an error message if password is not valid
                            $password_err = "A senha que você digitou não era válida.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "Nenhuma conta encontrada com esse nome de utilizador.";
                }
            } else{
                echo "Opa! Algo deu errado. Por favor, tente novamente mais tarde.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);

}


?>
<!DOCTYPE html>
<html lang="pt-PT">


<!-- login23:11-->
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
<div class="main-wrapper account-wrapper" >
    <a class="navbar-brand js-scroll-trigger" href="#page-top"><a href="index.php">AJUDA.IPB</a>
        <div class="account-page">
            <div class="account-center">
                <div class="account-box">

                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  method="post"
                          class="form-signin">
                        <div class="account-logo">
                            <a href="../Candidato/profile.html"><img src="assets/img/ipb.png" alt=""></a>
                        </div>
                        <div class="form-group <?php echo (!empty($username_err)) ? 'erro no utilizador' : '';?>">
                            <label>Nome do Utilizador </label>
                            <input type="text" name="username" autofocus="" id="<?php echo $username; ?>"
                                   class="form-control">
                            <span class=" help-block"><?php echo $username_err; ?></span>

                        </div>
                        <div class="form-group <?php echo (!empty($password_err)) ? 'erro no password' : '';?>">
                            <label>Senha</label>
                            <input type="password" name="Password"  id="<?php echo $password; ?>"
                                   class="form-control">
                            <span class="help-block "><?php echo $password_err; ?></span>

                        </div>

                        <div class="form-group text-center">
                            <button style="background-color: #820053; color: #fff;" type="submit" class="btn account-btn">Entrar</button>
                        </div>
                        <div class="text-left register-link">
                            Não tens a conta? <a href="registar.php">Registra já</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>
<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/app.js"></script>
</body>


<!-- login23:12-->
</html>


