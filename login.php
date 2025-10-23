<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <style>
        * {
            background-color: #101628ff ;
            font-family:"Lucida Sans Unicode";
            color:#fff;
            border-radius: 7px;
            }

        #user{
            font-size: 22px;
            padding: 4px;
            text-align: center;
            letter-spacing:0.6px;
            margin-left:32px;
        }

        #us{
            margin:10px;
            background: #ffffffff;
            color: #090c10ff;
            font-size: 13px;
            
        }
        #password {
            font-size: 22px;
            margin:4px;
            border-top: 20px;
            letter-spacing:0.6px;          
        }

        #pass {
            font-size: 13px;
            margin:15px;
            background: #fff ;
            color: #090c10ff ;
        }

        #checkbox {
            margin:20px;
            font-size: 17px;
        }

        .boton {
            border-radius:15px;
            background-color: #4c7be1ff;    
            font-size: 15px;
            color: #fff;
            border-color: #4c7be1ff;
            width: 95px;
            height: 30px;
        }

        .boton:hover {
           border-radius:15px;
            background-color: #4c7be1ff;
            font-size: 16px;
            color: #fff;
            border-color: #4c7be1ff;
            width: 98px;
            height: 33px;  
        }
       

    </style>
</head>
<body>
    <?php
        session_start();
        if(isset($_REQUEST["salir"])) {
            session_unset();
            (isset($_COOKIE["user"]))? setcookie("user", $_COOKIE["user"], time()-150) : "";
            (isset($_COOKIE["password"]))? setcookie("password", $_COOKIE["password"], time()-150) : "";
        }
    ?>
    <?php if(isset($_SESSION["user"]) && isset($_SESSION["password"])): ?>
        <?php header("Location: inicio.php") ?>
    <?php else: ?>
        <?php if(isset($_COOKIE["user"]) && isset($_COOKIE["password"])): ?>
            <?php header("Location: inicio.php") ?>
        <?php else: ?>
            <br/><br/><br/><br/>
            <form action="inicio.php" method="post">
                <div style="text-align: center; margin: 24px 0 12px 0; position: relative; padding: 14px;">
                    <label id="user" for="txtNom"><b>Usuario</b></label>
                    <input id="us" type="text" placeholder="Nombre de usuario" name="user" required><br/>

                    <label id="password" for="txtPass"><b>Contraseña</b></label>
                    <input id="pass" type="password" placeholder="Ingresa contraseña" name="password" required><br/>

                    <input id="checkbox" type="checkbox" name="recordar">Recuerdame
                    <br/>
                    <button class="boton" type="submit">Login</button>
                </div>
            </form>
        <?php endif;?>
    <?php endif; ?>
</body>
</html>