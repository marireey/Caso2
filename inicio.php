<?php 
    $usuario = "1234";
    $password = "abc";
    session_start();
    
    if(isset($_SESSION["user"]) && isset($_SESSION["password"])) {
        if($_SESSION["user"] == $usuario && $_SESSION["password"] == $password) {
            echo "Sesion iniciada por sesion";
            if(isset($_COOKIE["user"]) && isset($_COOKIE["password"])) {
                setcookie("user", $_SESSION["user"], time()+150);
                setcookie("password", $_SESSION["password"], time()+150);
            } else {
                setcookie("user", $_SESSION["user"], time()-150);
                setcookie("password", $_SESSION["password"], time()-150);
            }
        } else {
            header("Location: login.php");
        }
    } else if(isset($_COOKIE["user"]) && isset($_COOKIE["password"])) {
        if($_COOKIE["user"] == $usuario && $_COOKIE["password"] == $password) {
            echo "Sesion iniciada por cookie";
            $_SESSION["user"] = $_COOKIE["user"];
            $_SESSION["password"] = $_COOKIE["password"];
        } else {
            setcookie("user", "1234", time()-150);
            setcookie("password", "abc", time()-150);
            header("Location: login.php");
        }
    } else if($_REQUEST["user"] == $usuario && $_REQUEST["password"] == $password) {
        echo "Sesion iniciada por login";
        if(isset($_REQUEST["recordar"])) {
            $_SESSION["user"] = $_REQUEST["user"];
            $_SESSION["password"] = $_REQUEST["password"];
            setcookie("user", $_SESSION["user"], time()+150);
            setcookie("password", $_SESSION["password"], time()+150);
        }
    } else if(isset($_REQUEST["user"]) && isset($_REQUEST["password"])){
         if ($_REQUEST["user"] != $usuario && $_REQUEST["password"] != $password) {
        $_SESSION["error"] = "Usuario y contraseña inválidos";
        header('Location: error.php');
        } elseif ($_REQUEST["user"] != $usuario) {
        $_SESSION["erroruser"] = "Usuario inválido";
        header('Location: error.php');
         } elseif ($_REQUEST["password"] != $password) {
        $_SESSION["errorpass"] = "Contraseña inválida";
        header('Location: error.php');
        } else {
    header("Location:login.php");
}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            background-color: #869febff;
            font-family:"Lucida Sans Unicode";
            color:#fff;
        }
        h1 {
            font-size: 60px; 
            
        }
        .boton {
            border-radius:11px;
            background-color: #b7e14cff;    
            font-size: 15px;
            color: #345616ff;
            border-color: #b7e14cff;
            width: 145px;
            height: 30px;
        }

        .boton:hover {
           border-radius:11px;
            background-color: #b7e14cff;
            font-size: 18px;
            color: #345616ff;
            border-color: #b7e14cff;
            width: 150px;
            height: 33px;  
        }

    </style>
</head>
<body>
    <center>
    <h1>¡Bienvenido
        <?php
        echo $usuario;
        ?>!
    </h1>
    <form action="login.php">
        <input class="boton" type="submit" value="Cerrar sesion">
        <input type="hidden" value="si" name="salir">
    </form>
</center>
</body>
</html>

