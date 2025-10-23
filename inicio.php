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
    } else if(isset($_REQUEST["user"]) && ($_REQUEST["password"])){
        if($_REQUEST["user"] != $usuario && $_REQUEST["password"] != $password){
            header('Location:error.php');
        } elseif($_REQUEST["user"] != $usuario) {
            header('Location:erroruser.php');
        } elseif($_REQUEST["password"] != $password){
            header('Location:errorpass.php');
        } else {
         $_SESSION["error"] == "Se debe iniciar sesión para acceder";
        header("Location: error.php");
        }
   } else {
    header('Location:login.php');
}
 
?>
<center>
    <h1>Bienvenido
        <?php
        echo $usuario;
        ?>
    </h1>
    <form action="login.php">
        <input type="submit" value="Cerrar sesion">
        <input type="hidden" value="si" name="salir">
    </form>
</center>
