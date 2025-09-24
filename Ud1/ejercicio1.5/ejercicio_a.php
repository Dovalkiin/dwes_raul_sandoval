<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Listado de alumnos</h2>

    <?php
        $alumnos = ["Jose David", "Pablo", "Antonio López", "Juanjo", "José Julián", "Mariano", "Alejandro Valero", "Gonzalo", "Antonio Sánchez", "Juan José", "Juan Fco Hervás", "Israel"];
    ?>
        <?php
            print("<ol>");
            foreach($alumnos as $alumno){
                print("<li>$alumno</li>");
            }
            print("</ol>");
        ?>
</body>
</html>