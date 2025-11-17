<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/hojaEstilos.css">
    <title>Docum</title>
</head>

<body>
    <?php
    include "config.php";
    include "functions.php";
    if (empty($_POST["mostrar_datos"])) {
    ?>
        <form action="" method="post">
            <header class="cabecera">
                <h1>Ejercicios Progresivos de PHP con acceso a Bases de Datos</h1>
                <h2>Versión con la biblioteca MYSQLi estilo procedimental</h2>
                <h3>Ejercicio <sub>5</sub> - Ejercicios Progresivos</h3>
            </header>
            <section>
                <table>
                    <tr>
                        <td>Escribe el nombre de país:</td>
                        <td><input type="text" name="pais"></td>
                    </tr>
                    <tr>
                        <td>Escribe la población mínima de la ciudad:</td>
                        <td><input type="number" name="poblacion"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" name="mostrar_datos" value="Mostrar Datos"></td>
                    </tr>
                </table>
            </section>
            <footer>
                <p>Realizado por: Raúl Sandoval López - IES Alcántara - 2024</p>
            </footer>
        </form>
    <?php
    } else {
        $pais = $_POST["pais"];
        $poblacion = $_POST["poblacion"];
        $cnx = conectar();
        $msql1 = "SELECT Name, Population
                  FROM city
                  WHERE CountryCode = (SELECT Code
                                       FROM country
                                       WHERE (Name = '$pais') AND (Population > $poblacion))";
        $consulta = mysqli_query($cnx, $msql1);
    ?>
            <form action="" method="post">
            <header class="cabecera">
                <h1>Ejercicios Progresivos de PHP con acceso a Bases de Datos</h1>
                <h2>Versión con la biblioteca MYSQLi estilo procedimental</h2>
                <h3>Ejercicio <sub>5</sub> - Ejercicios Progresivos</h3>
            </header>
            <section>
                <table>
                    <tr>
                        <th>País</th>
                        <th>Población</th>
                    </tr>
                    <?php
                    while($dato = mysqli_fetch_assoc($consulta)){
                        echo "<tr><td>" . $dato["Name"] . "</td><td>" . $dato["Population"] . "</td></tr>";
                    }
                    ?>
                    <tr>
                        <td colspan="2"><input type="submit" name="mostrar_datos" value="Mostrar Datos"></td>
                    </tr>
                </table>
            </section>
            <footer>
                <p>Realizado por: Raúl Sandoval López - IES Alcántara - 2024</p>
            </footer>
        </form>

    <?php
    }
    ?>
</body>

</html>