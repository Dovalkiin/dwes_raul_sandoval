<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen</title>
</head>
<body>
    <form action="" method="post">
    <label>Juegos: </label>
    <select name="precio_juegos" multiple>
        <option value="Assasins Creed">Assasins Creed</option>
        <option value="FarCry">FarCry</option>
        <option value="Spiderman">Spiderman</option>
    </select>
    <input type="submit" name="submit" value="Cuánto vale?">
    </form>
    <?php
    $precios = ["Assasins Creed" => 30,
                "FarCry" => 15,
                "Spiderman" => 40];

    if(isset($_POST["submit"])){
        foreach ($_post["precio_juegos"] as $juego){
            $precio_juegos = $precios[$juego];
            echo $precio_juegos;
        }
    }
    ?>
</body>
</html>