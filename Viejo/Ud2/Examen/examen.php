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
    <select name="precio_juegos[]" multiple>
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
    $suma_total = 0;
    if(isset($_POST["submit"])){
        $juegos = $_POST["precio_juegos"]??[];
        foreach ($juegos as $juego){
            $suma_total += $precios[$juego];
        }
    }
    echo $suma_total;
    ?>
</body>
</html>