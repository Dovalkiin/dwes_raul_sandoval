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
            $alumnos =  array ("José David", "Pablo", "Antonio López", "Juanjo", "José Julián", "Mariano", "Alejandro Valero", "Gonzalo", "Antonio Sánchez", "Juan José", "Juan Fco Hervás", "Israel", "Eliana", "Miriam", "Alejandro Gómez", "Enrique", "Alejandro Vicente", "Alejandro Barba", "Manuel", "José Manuel", "Jesús", "Alexandru", "Juan Fco Ponce","David Villa", "David Ruiz", "Sergio");
            $alumnos_fila = 6;
            $fila = 1;

            foreach($alumnos as $clave => $alumno){
                if($clave % $alumnos_fila == 0){
                    if($fila > 1){
                        echo "</tr>";
                        echo "</td>";
                    }
                    echo "<tr>";
                    echo "<th>Fila $fila</th>";
                    $fila++;
                }
                echo "<td>$alumno</td>";
            }
            echo "</tr>";
        ?>
    </table>
</body>
</html>