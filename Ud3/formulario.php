<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    require "config.php";
    require "funciones.php";
    ?>
    <form action="" method="post">
        <table>
            <tr>
                <td>Nombre: </td>
                <td>
                    <input type="text" placeholder="Nombre de país en inglés">
                </td>
            </tr>
            <tr>
                <td>Población mayor de: </td>
                <td><input type="number"></td>
            </tr>
            <tr>
                <td><input type="button" value="Mostrar"></td>
            </tr>
        </table>
    </form>
</body>

</html>