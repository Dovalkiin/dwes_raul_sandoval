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
        $nombre_pais = $_POST["nombre_pais"];
        $poblacion = $_POST["poblacion"];
        $cnx = conectar();
        $msql1 = "SELECT Name, Population 
                    FROM city 
                    WHERE CountryCode = (SELECT code
                                        FROM country 
                                        WHERE (Name = '$nombre_pais') AND (Population > '$poblacion'))";
        $consulta = mysqli_query($cnx, $msql1);
        $resultado = mysqli_fetch_assoc($consulta);
        while($resultado){
            echo "<tr><td>$resultado[Name]</td><td>$resultado[Population]</td></tr>";
        }
    }else{ ?>
        <form action="" method="post">
=======
    ?>
    <form action="" method="post">
>>>>>>> 73986d335838002fd0ce261e93401c3622da1e6a
        <table>
            <tr>
                <td>Nombre: </td>
                <td>
<<<<<<< HEAD
                    <input type="text" name="nombre_pais" placeholder="Nombre de país en inglés">
=======
                    <input type="text" placeholder="Nombre de país en inglés">
>>>>>>> 73986d335838002fd0ce261e93401c3622da1e6a
                </td>
            </tr>
            <tr>
                <td>Población mayor de: </td>
<<<<<<< HEAD
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
=======
                <td><input type="number"></td>
            </tr>
            <tr>
                <td><input type="button" value="Mostrar"></td>
            </tr>
        </table>
    </form>
>>>>>>> 73986d335838002fd0ce261e93401c3622da1e6a
</body>

</html>