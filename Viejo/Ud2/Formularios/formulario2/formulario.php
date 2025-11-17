<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/hojaEstilos.css">
    <title>Formulario</title>
</head>

<body>
    <?php
    
    if (isset($_POST["aceptar"])) {
        $nombre = $_POST["nombre"];
        $fecha = $_POST["fecha"];
        $telefono = $_POST["telefono"];
        $correo = $_POST["correo"];
        $direccion = $_POST["direccion"];
        $poblacion = $_POST["poblacion"];
        $cp = $_POST["cp"];
        $provincia = $_POST["provincia"];
        $otros = $_POST["otros"];

        echo "<ul>";
        echo "<li>NOMBRE: $nombre </li>";
        echo "<li>FECHA NACIMIENTO: $fecha </li>";
        echo "<li>TELÉFONO: $telefono </li>";
        echo "<li>EMAIL: $correo </li>";
        echo "<li>DIRECCIÓN: $direccion </li>";
        echo "<li>POBLACIÓN: $poblacion </li>";
        echo "<li>C.P.: $cp </li>";
        echo "<li>PROVINCIA: $provincia </li>";
        echo "<li>OTROS: $otros </li>";
        echo "<li>AFICIONES:</li>";
        echo "<ul>";
        $aficiones = $_POST["aficiones"];
        foreach ($aficiones as $aficion) {
            echo "<li>$aficion</li>";
        }
        echo "</ul>";
        echo "</ul>";
    } else {

    ?>
        <h1>CURRICULUM VITAE</h1>
        <h2>Formulario Datos Personales</h2>
        <form action="formulario.php" method="post">
            <table>
                <tr>
                    <th><label>NOMBRE:</label></th>
                    <td><input type="text" name="nombre"></td>
                </tr>
                <tr>
                    <th><label>FECHA NAC:</label></th>
                    <td><input type="date" name="fecha"></td>
                    <th><label>TLF:</label></th>
                    <td><input type="number" name="telefono"></td>
                </tr>
                <tr>
                    <th><label>EMAIL:</label></th>
                    <td><input type="email" name="correo"></td>
                </tr>
                <tr>
                    <th><label>DIRECCIÓN:</label></th>
                    <td><input type="text" name="direccion"></td>
                </tr>
                <tr>
                    <th><label>POBLACIÓN:</label></th>
                    <td><input type="text" name="poblacion"></td>
                    <th><label>CP:</label></th>
                    <td><input type="number" name="cp"></td>
                </tr>
                <tr>
                    <th><label>PROVINCIA:</label></th>
                    <td>
                        <select name="provincia">
                            <option value="Murcia">Murcia</option>
                            <option value="Toledo">Toledo</option>
                            <option value="Valencia">Valencia</option>
                        </select>
                    </td>
                    <th rowspan="3"><label>OTROS:</label></th>
                    <td rowspan="3"><textarea name="otros"></textarea></td>
                </tr>
                <tr>
                    <th><label>AFICIONES:</label></th>
                    <td>
                        <input type="checkbox" value="deportes" name="aficiones[]">Deportes
                        <input type="checkbox" value="cine" name="aficiones[]" checked="checked">Cine
                        <input type="checkbox" value="musica" name="aficiones[]">Música
                        <input type="checkbox" value="viajar" name="aficiones[]">Viajar
                        <input type="checkbox" value="leer" name="aficiones[]">Leer
                    </td>
                </tr>
                <tr>
                    <th colspan="2">
                        <input type="submit" value="Aceptar" class="botones" name="aceptar">
                        <input type="reset" value="Cancelar" class="botones">
                        <input type="button" value="Información" class="botones" name="info" onclick="window.alert('Esto es un ejemplo de formulario');">
                    </th>
                </tr>
            </table>

        </form>
    <?php
    }
    ?>
</body>

</html>