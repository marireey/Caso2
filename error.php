<?php
    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <style>
        *{
            background-color: #cd3645ff;
            font-family:"Lucida Sans Unicode";
            color: #fff;
        }

        h2 {
            font-size: 25px;
            margin-top:70px;
        }

        .boton {
            margin-top: 20px;
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
        <?php
        if (isset($_SESSION["error"])) {
            echo "<h2> &#10062 " . $_SESSION["error"] . " &#10062". "<br>Vuelva a intentarlo</h2>";
        } elseif (isset($_SESSION["erroruser"])) {
            echo "<h2> &#10062 " . $_SESSION["erroruser"] . " &#10062" . " <br>Vuelva a intentarlo</h2>";
        } elseif (isset($_SESSION["errorpass"])) {
            echo "<h2> &#10062 "  . $_SESSION["errorpass"] . " &#10062" . "<br>Vuelva a intentarlo</h2>";
        } else {
            header("Location: login.php");
        }
        ?>

        <form action="login.php">
            <input class="boton" type="submit" value="Volver">
            <input type="hidden" value="si" name="salir">
        </form>
        
    </center>

</body>
</html>