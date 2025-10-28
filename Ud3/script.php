<?php
require "config.php";
require "funciones.php";
require "cabecera.php";
    echo "<div class='tabla>";
    echo "<table>";
        $cnx = conectar();
        $msql1 = "SELECT Name, Population
        FROM city 
        WHERE CountryCode = (SELECT Code
                            FROM country
                            WHERE Name = 'Spain') AND (Population > 200000)";


        $consulta = mysqli_query($cnx, $msql1);

        while ($lista = mysqli_fetch_assoc($consulta)) {
            print("<tr><td>" . $lista['Name'] . "</td>" . "<td>" . $lista['Population'] . "</td>" . "</tr>");
        }
    echo "</table>";
    echo "</div>";
require "pie.php";