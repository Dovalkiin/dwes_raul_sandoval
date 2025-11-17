<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookies</title>
</head>
<body>
    <h1>Bienvenido a nuestra página Web</h1>
    <?php
    setcookie("fecha", date("j-n-Y"), time()+5);
    setcookie("hora", date("H:i:s"), time()+5);
    if(isset($_COOKIE["fecha"]) && isset($_COOKIE["fecha"])){
        echo "Nos visitaste por última vez el " . $_COOKIE["fecha"] . " a las " . $_COOKIE["hora"];
    }else{
        echo "¡Es tu primera vez, no lo puedo creer!";
    }
    ?>
</body>
</html>