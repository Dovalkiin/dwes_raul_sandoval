<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/hojaEstilos.css">
    <title>Document</title>
</head>

<body>
    <table>
        <?php
        require "config.php";
        require "funciones.php";
        $cnx = conectar();
        $msql1 = "SELECT Name, Population
        FROM city 
        WHERE CountryCode = (SELECT Code
                            FROM country
                            WHERE Name = 'Spain') AND (Population > 200000)";


        $consulta = mysqli_query($cnx, $msql1);

        while ($lista = mysqli_fetch_assoc($consulta)) {
            print("<tr><td>" . $lista['Name'] . "</td>" . "<td>" . $lista['Population'] . "</td>" . "</tr>");
            print("</br>");
        }

        ?>
    </table>
</body>

</html>