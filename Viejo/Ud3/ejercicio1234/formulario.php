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
    if(isset($_POST["mostrar"])){
        $cnx = conectar();
        $msql1 = "SELECT Name, Population 
                    FROM city 
                    WHERE CountryCode = (SELECT code
                                        FROM country 
                                        WHERE Name = {$_POST['nombre_pais']} AND Population > {$_POST['poblacion']})";
        $consulta = mysqli_query($cnx, $msql1);
        echo "<table>";
        echo "<tr>";
        echo "<th>Nombre</th>";
        echo "<th>Población</th>";
        echo "</tr>";
        while($resultado = mysqli_fetch_assoc($consulta)){
            echo "<tr><td>{$resultado['Name']}</td><td>{$resultado['Population']}</td></tr>";
        }
        echo "</table>";
    }else{ ?>
        <form action="" method="post">
        <table>
            <tr>
                <td>Nombre: </td>
                <td>
                    <input type="text" name="nombre_pais" placeholder="Nombre de país en inglés">
                </td>
            </tr>
            <tr>
                <td>Población mayor de: </td>
                <td><input type="number" name="poblacion"></td>
            </tr>
            <tr>
                <td><input type="submit" name="mostrar" value="Mostrar"></td>
            </tr>
        </table>
    </form>
    <?php
    }
    ?>
</body>

</html>