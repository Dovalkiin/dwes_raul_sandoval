<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $var1 = 10;
        $var2 = "Esto es una cadena";
        echo "<ul>";
        echo "<li>La variable var1 es de tipo entero?</li>" . is_integer($var1);
        echo "<li>La variable var1 es de tipo entero?</li>" . is_integer($var2);
        echo "<li>La variable var1 es de tipo cadena?</li>" . is_string($var2);
        echo "</ul>"
    ?>
</body>
</html>