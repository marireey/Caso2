<?php
    session_start();
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
</head>
<body>
    <center>

        
        <h2> <? echo $_SESSION["error"]; ?> </h2>

        <h4>Vuelva a intentarlo</h4>

        <form action="login.php">
            <input type="submit" value="Volver">
            <input type="hidden" value="si" name="salir">
        </form>
        
    </center>

</body>
</html>