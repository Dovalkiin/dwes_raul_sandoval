<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesiones</title>
</head>
<body>
    <h1>Bienvenido a nuestra página Web</h1>
    <?php
    session_start();
    if(isset($_SESSION["visitas"])){
        echo "Nos has realizado las siguientes visitas: </br>";
        foreach ($_SESSION["visitas"] as $visita){
            echo "Día: " . $visita["fecha"] . " - Hora: " . $visita["hora"] . "</br>";
        }
    }else{
        $_SESSION["visitas"] = [];
        echo "¡Es tu primera vez, no lo puedo creer!";
    }
    $_SESSION["visitas"][] = ["fecha" => date("j-n-Y"),
                              "hora" => date("H:i:s")];
    ?>
    <form action="" method="post">
        <input type="submit" value="Limpiar registro" name="limpiar">
    </form>
    <?php
    if (isset($_POST["limpiar"])) {
    session_destroy();
    header("Location: " . $_SERVER["PHP_SELF"]);
    exit;
    }
    ?>
</body>
</html>