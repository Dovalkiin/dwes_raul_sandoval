<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Operaciones matemáticas</h2>
    <?php
        if(isset($_GET["num1"]) && isset($_GET["num2"])){
            $num1 = $_GET["num1"];
            $num2 = $_GET["num2"];
            echo "<ul>";
            echo "<li>Suma: $num1 + $num2 = " . $num1 + $num2 . "</li>";
            echo "<li>Resta: $num1 - $num2 = " . $num1 - $num2 . "</li>";
            echo "<li>Multiplicación: $num1 x $num2 = " . $num1 * $num2 . "</li>";
            echo "<li>División: $num1 / $num2 = " . $num1 / $num2 . "</li>";
            echo "</ul>";
            echo "<a></a>";
        }else{        
    ?>
    <form action="operaciones_GET.php" method="get">
        <label for="num1">Introduce el primer número: </label>
        <input type="number" name="num1">
        </br></br>
        <label for="num2">Introduce el primer número: </label>
        <input type="number" name="num2">
        </br></br>
        <button type="submit">Enviar</button>
    </form>
            <?php
            }
            ?>
</body>
</html>