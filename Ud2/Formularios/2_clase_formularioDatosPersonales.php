<!DOCTYPE html>
<html lang="es">

<head>
	<title>Curriculum Vitae - Formulario Datos Personales</title>
	<meta charset="UTF-8" />
	<link rel="stylesheet" type="text/css" href="style/style.css" />
</head>

<body>
	<h1>CURRICULUM VITAE</h1>

	<?php
	define ("SEP","#");
	$fichero = "datos.txt";

	if (isset($_POST['enviar'])) {
		echo "<h2>Datos Personales</h2>";		
		$nombre = $_POST['nombre'];
        $fechaNac = $_POST['fechaNac'];
        $tlf = $_POST['tlf'];
        $email = $_POST['email'];
        $direccion = $_POST['direccion'];
        $poblacion = $_POST['poblacion'];
        $cp = $_POST['cp'];
        $provincia = $_POST['provincia'];
        $otros = $_POST['otros'];
		$listaAficiones = "";
        if (isset($_POST['aficiones'])) {
			$aficiones = $_POST['aficiones'];
			$listaAficiones = implode(" ",$aficiones);
        }         

		$lineaFichero = $nombre.SEP.$fechaNac.SEP.$tlf.SEP.$email.SEP.$direccion.SEP.$poblacion.SEP.$cp.SEP.$provincia.SEP.$otros.SEP.$listaAficiones;

		if (file_put_contents($fichero, $lineaFichero, FILE_APPEND | LOCK_EX))
		{
			echo "<h2>REGISTRO INSERTADO CORRECTAMENTE</h2>";
		}
		echo "<a href='".$_SERVER['PHP_SELF'] ."'>Volver al formulario</a>";
	}
	if (isset($_POST['listado']))
	{
		// Leo todas las líneas del fichero
		if ($personas = file($fichero))
		{
			echo "<table>";
			echo "<tr>";
			echo "<th>NOMBRE</th>";
			echo "<th>FECHA NACIMIENTO</th>";
			echo "<th>TELÉFONO</th>";
			echo "<th>EMAIL</th>";
			echo "<th>DOMICILIO</th>";
			echo "<th>LOCALIDAD</th>";
			echo "<th>CÓDIGO POSTAL</th>";
			echo "<th>PROVINCIA</th>";
			echo "<th>AFICIONES</th>";
			echo "<th>OBSERVACIONES</th>";
			echo "</tr>";

			foreach ($personas as $persona)
			{
				$columnas = explode (SEP, $persona);
				echo "<tr>";
				foreach($columnas as $indice => $dato) {
					if ($indice != 10) {
						echo "<td>$dato</td>";
					}
				}
				echo "</tr>";
			}
			echo "</table>";
			echo "<a href='".$_SERVER['PHP_SELF'] ."'>Volver al formulario</a>";
		}
	}
	else {
		?>
	

	<!-- FORMULARIO DATOS PERSONALES -->
	<h2>Formulario Datos Personales</h2>

	<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
		<table id="DatosPersonales">
			<!-- Fila 1 -->
			<tr>
				<th>NOMBRE:</th>
				<td colspan="3"><input name="nombre" type="text" size="60%" /></td>
			<tr>
				<!-- Fila 2 -->
			<tr>
				<th style="width:20%">FECHA NAC:</th>
				<td style="width:30%"><input name="fechaNac" type="date" /></td>
				<th style="width:10%">TLF:</th>
				<td style="width:30%"><input name="tlf" type="tel" /></td>
			<tr>
				<!-- Fila 3 -->
			<tr>
				<th>EMAIL:</th>
				<td colspan="3"><input name="email" type="email" size="60%" /></td>
			<tr>

				<!-- Fila 4 -->
			<tr>
				<th>DIRECCIÓN:</th>
				<td colspan="3"><input name="direccion" type="text" size="60%" /></td>
			<tr>
				<!-- Fila 5 -->
			<tr>
				<th>POBLACIÓN:</th>
				<td><input name="poblacion" type="text" size="20%" /></td>
				<th>CP:</th>
				<td><input name="cp" type="number" size="15%" /></td>
			<tr>
				<!-- Fila 6 -->
			<tr>
				<th>PROVINCIA:</th>
				<td><select name="provincia">
						<option>Albacete</option>
						<option>Alicante</option>
						<option>Almería</option>
						<option selected>Murcia</option>
						<option>Valencia</option>
					</select>
				</td>
				<th rowspan="3">OTROS:</th>
				<td rowspan="3"><textarea name="otros" rows="4" cols="20"></textarea> </td>
			<!-- Fila 7 -->
			<tr>
				<th>AFICIONES:</th>
				<td>
					<input type="checkbox" name="aficiones[]" value="Deportes" />Deportes
					<input type="checkbox" name="aficiones[]" value="Cine" />Cine
					<input type="checkbox" name="aficiones[]" value="Música" />Música
					<input type="checkbox" name="aficiones[]" value="Viajar" />Viajar
					<input type="checkbox" name="aficiones[]" value="Leer" />Leer
				</td>
				<!-- Fila 8 -->
			<tr>
				<th id="botones" colspan="3">
					<!-- Botones -->
					<input type="submit" name="enviar" value="Aceptar" />
					<input type="reset" name="cancelar" value="Cancelar" />					
					<input type="button" name="INFO" value="Información" onclick="window.alert('Esto es un ejemplo de formulario');" />
					<input type="submit" name="listado" value="Listado" formnovalidate />
				</th>
			<tr>

		</table>
	</form>
	<?php
	}	
	?>
</body>

</html>