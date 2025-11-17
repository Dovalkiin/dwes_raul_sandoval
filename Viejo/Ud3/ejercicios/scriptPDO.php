<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/hojaEstilos.css">
    <title>PDO</title>
</head>
<body>
    <?php
        include "funcionesPDO.php";
        include "config.php";

        $cnx = conectar();
        $msql1 = "SELECT Name, Population FROM city WHERE CountryCode = (SELECT Code FROM country WHERE Name = 'Spain') AND (Population > 200000)";
        $res = $cnx->query($msql1) or die($cnx->error);
    ?>
    <table>
        <tr><th>Ciudad</th><th>Población</th></tr>
        <?php
        while($lista = mysqli_fetch_assoc($res)){
            echo "<tr><td>" . $lista['Name'] . "</td><td>" . $lista['Population'] . "</td></tr>";
        }
        ?>
        
    </table>
</body>
</html>