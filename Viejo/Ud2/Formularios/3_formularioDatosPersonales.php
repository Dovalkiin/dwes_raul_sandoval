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
	define("SEPARADOR", "#");
	$nombreDirectorio = "uploads/";
	$fotoPorDefecto = "default.webp";
	$ficheroDatos = "datos.txt";
	$URLfotoPorDefecto = $nombreDirectorio . $fotoPorDefecto;

	function calcularEdad($fechaNacimiento)
	{
		$fechaActual = new DateTime();
		$fechaNac = new DateTime($fechaNacimiento);
		$edad = $fechaActual->diff($fechaNac);
		return $edad->y; // Devuelve solo los años
	}

	//////////////////////////////////////////////////////////////////////////
	// si el formulario ha sido enviado
	//    validar formulario
	// finsi
	// si el formulario ha sido enviado y los datos son correctos
	//    procesar formulario
	// si no
	//    mostrar formulario
	// finsi
	//////////////////////////////////////////////////////////////////////////
	
	// Comprobar errores
	$error = false;
	$aficiones = array();

	if (isset($_POST['insertar'])) {
		// Con htmlspecialchars evitamos interpretar posibles elementos HTML que introduzca el usuario
		$nombre = htmlspecialchars($_POST['nombre']);
		$tlf = htmlspecialchars($_POST['tlf']);
		$email = htmlspecialchars($_POST['email']);
		$direccion = htmlspecialchars($_POST['direccion']);
		$poblacion = htmlspecialchars($_POST['poblacion']);
		$cp = htmlspecialchars($_POST['cp']);
		$provincia = htmlspecialchars($_POST['provincia']); // Aquí no haría falta htmlspecialchars ya que es un valor que proporcionamos nosotros
		$otros = htmlspecialchars($_POST['otros']);
		// Generamos una lista con las aficiones
		$afi = "";
		if (isset($_POST['aficiones'])) {
			$aficiones = (!empty($_POST['aficiones'])?$_POST['aficiones']:array());

			$afi = htmlspecialchars(implode(" ", $aficiones));// Aquí no haría falta htmlspecialchars ya que es un valor que proporcionamos nosotros
	
			/*foreach ($aficiones as $aficion) {
				$afi .= $aficion . " ";
			}
			$afi = trim($afi);*/
		}

		// Compruebo si es mayor de edad
		$fechaNac = $_POST['fechaNac'];
		$edad = calcularEdad($fechaNac);
		if ($edad < 18) {
			$errores["fechaNac"] = "¡Debe ser mayor de edad para registrarse!";
			$error = true;
		} else {
			$errores["fechaNac"] = "";
		}

		// Compruebo si el formato de la foto es JPEG, GIF o PNG
		// PROCESAMOS LA FOTO
		// Subir fichero
		$copiarFichero = false;
		$nombreFichero = '';
		$nombreCompleto = '';
		// Copiar fichero en directorio de ficheros subidos
		// Se renombra para evitar que sobreescriba un fichero existente
		// Para garantizar la unicidad del nombre se añade una marca de tiempo
		if (is_uploaded_file($_FILES['foto']['tmp_name'])) {

			// Comprobar el tipo de imagen
			$tipo = $_FILES['foto']['type'];
			if (($tipo != "image/jpeg") && ($tipo != "image/pjpeg") && ($tipo != "image/gif") && ($tipo != "image/png")) {
				$errores["foto"] = "¡La imagen debe ser JPEG, GIF o PNG!";
				$error = true;
			} else {
				$errores["foto"] = "";
			}

			if (!empty($errores["foto"])) {
				$copiarFichero = false;
			} else {
				$copiarFichero = true;
			}

			$nombreFichero = $_FILES['foto']['name'];
			// Si ya existe un fichero con el mismo nombre, renombrarlo
			$nombreCompleto = $nombreDirectorio . $nombreFichero;
			if (is_file($nombreCompleto)) {
				$idUnico = time();
				$nombreFichero = $idUnico . "-" . $nombreFichero;
				$nombreCompleto = $nombreDirectorio . $nombreFichero;
			}
		}


		// Mover fichero de imagen a su ubicación definitiva
		if ($copiarFichero) {
			move_uploaded_file($_FILES['foto']['tmp_name'], $nombreCompleto);
		}
		// FIN PROCESAMIENTO FOTO
	}
	// Si los datos son correctos, procesar formulario
	if (isset($_POST['insertar']) && $error == false) {

		echo "<h2>Datos Personales</h2>";


		/* No mostramos los datos en pantalla, los insertaremos en el fichero de texto
		echo "<ul>";
		echo "<li>NOMBRE: $nombre</li>";
		echo "<li>FECHA NACIMIENTO: $fechaNac</li>";
		echo "<li>TELÉFONO: $tlf</li>";
		echo "<li>EMAIL: $email</li>";
		echo "<li>DIRECCIÓN: $direccion</li>";
		echo "<li>POBLACIÓN: $poblacion</li>";
		echo "<li>C.P.: $cp</li>";
		echo "<li>PROVINCIA: $provincia</li>";
		echo "<li>OTROS: $otros</li>";
		echo "<li>AFICIONES: ";
		if (isset($_POST['aficiones'])) {
			$aficiones = $_POST['aficiones'];
			echo "<ul>";
			foreach ($aficiones as $aficion) {
				echo "<li>$aficion</li>"; 
			}
			echo "</ul>";
		} else {
			echo "No ha seleccionado ninguna afición.";
		}
		echo "</li>";
		echo "</ul>";
		*/

		// Generamos la línea a insertar en el fichero de texto
		$linea = $nombre . SEPARADOR . $fechaNac . SEPARADOR . $tlf . SEPARADOR . $email . SEPARADOR . $direccion . SEPARADOR . $poblacion . SEPARADOR . $cp . SEPARADOR . $provincia . SEPARADOR . $otros . SEPARADOR . $afi . SEPARADOR . $nombreCompleto . SEPARADOR . PHP_EOL;		
		// FILE_APPEND para añadir al contenidos del fichero
		// LOCK_EX para evitar que alguien más escriba al mismo tiempo
		if ((is_writable($ficheroDatos)) && (file_put_contents($ficheroDatos, $linea, FILE_APPEND | LOCK_EX))) {
			echo "<h2>REGISTRO INSERTADO CORRECTAMENTE</h2>";
		} else {
			echo "<span class='errores'>ERROR: No se pudo escribir en el fichero</span>";
		}
		print ("<br><a href=" . $_SERVER['PHP_SELF'] . ">Volver al formulario</a>\n");

	} else if (isset($_POST['listado'])) {
		// Se leen los datos del fichero. Cada línea será una celda del array
		if ((is_readable($ficheroDatos)) && ($arrayPersonas = file($ficheroDatos))) {
			// Se escribe la cabecera de la tabla
			print ("<h2>LISTADO PERSONAS</h2>\n");
			print ("<table id='DatosPersonales' border='1'>\n");
			print ("<tr>\n");
			print ("<th>NOMBRE</th>\n");
			print ("<th>FECHA NACIMIENTO</th>\n");
			print ("<th>TELÉFONO</th>\n");
			print ("<th>EMAIL</th>\n");
			print ("<th>DOMICILIO</th>\n");
			print ("<th>LOCALIDAD</th>\n");
			print ("<th>CÓDIGO POSTAL</th>\n");
			print ("<th>AFICIONES</th>\n");
			print ("<th>OBSERVACIONES</th>\n");
			print ("<th>FOTO</th>\n");
			print ("</tr>\n");


			// Se recorren cada una de las personas del array
			foreach ($arrayPersonas as $persona) {

				// Se convierte los campos del formato CSV (delimitador #) para 1 persona
				$arrayDatosPersona = explode(SEPARADOR, $persona);
				//str_getcsv($persona,SEPARADOR);
	
				// Se recogen los campos de 1 persona por orden 
				$nombre = $arrayDatosPersona[0];  //nombre
				$fechaNacimiento = $arrayDatosPersona[1]; //fechaNac
				$telefono = $arrayDatosPersona[2]; //tlf
				$email = $arrayDatosPersona[3];  //email
				$domicilio = $arrayDatosPersona[4]; //direccion
				$localidad = $arrayDatosPersona[5]; //poblacion
				$codigoPostal = $arrayDatosPersona[6]; //cp
				$provincia = $arrayDatosPersona[7]; //provincia
				$otros = $arrayDatosPersona[8]; //otros
				$aficiones = $arrayDatosPersona[9]; //aficiones
			 	
				// Si no tenemos su foto, podemos una por defecto
				$foto = (!empty($arrayDatosPersona[10]) ? $arrayDatosPersona[10] : $URLfotoPorDefecto); //foto
	
				// Se muestran los datos del formulario de 1 persona (1 fila)
				print ("<tr>\n");
				print ("<td>$nombre</td>\n");
				print ("<td>$fechaNacimiento</td>\n");
				print ("<td>$telefono</td>\n");
				print ("<td>$email</td>\n");
				print ("<td>$domicilio</td>\n");
				print ("<td>$localidad</td>\n");
				print ("<td>$codigoPostal</td>\n");
				print ("<td>$aficiones</td>\n");
				print ("<td>$otros</td>\n");
				print ("<td><img style='width:150px' src='$foto'></td>\n");
				print ("</tr>\n");
			}

			print ("</table>\n");
		} else {
			echo "<span class='errores'>ERROR: No se pudo leer el fichero</span>";
		}

		print ("<br><a href=" . $_SERVER['PHP_SELF'] . ">Volver al formulario</a>\n");
	} else {
		?>


			<!-- FORMULARIO DATOS PERSONALES -->
			<h2>Formulario Datos Personales</h2>

			<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
				<table id="DatosPersonales">
					<!-- Fila 1 -->
					<tr>
						<th>NOMBRE:</th>
						<td colspan="3"><input name="nombre" type="text" size="60%" required
								value="<?= isset($_POST['insertar']) ? $nombre : '' ?>"></td>
					<tr>
						<!-- Fila 2 -->
					<tr>
						<th style="width:20%">FECHA NAC:</th>
						<td style="width:30%">
							<input name="fechaNac" type="date" required
								value="<?= isset($_POST['insertar']) ? $fechaNac : '' ?>">
							<?php
							if (isset($errores["fechaNac"]) && ($errores["fechaNac"] != "")) {
								print ("<br/><span class='errores'>" . $errores["fechaNac"] . "</span>");
							}
							?>
						</td>
						<th style="width:10%">TLF:</th>
						<td style="width:30%"><input name="tlf" type="tel" required
								value="<?= isset($_POST['insertar']) ? $tlf : '' ?>"></td>
					<tr>

						<!-- Fila 3 -->
					<tr>
						<th style="width:20%">EMAIL:</th>
						<td style="width:30%"><input name="email" type="email" size="60%" required
								value="<?= isset($_POST['insertar']) ? $email : '' ?>"></td>
						<th style="width:10%">FOTO:</th>
						<td style="width:30%"><input name="foto" type="file" />
							<?php
							if (isset($errores["foto"]) && ($errores["foto"] != "")) {
								print ("<br/><span class='errores'>" . $errores["foto"] . "</span>");
							}
							?>
						</td>
					<tr>

						<!-- Fila 4 -->
					<tr>
						<th>DIRECCIÓN:</th>
						<td colspan="3"><input name="direccion" type="text" size="60%"
								value="<?= isset($_POST['insertar']) ? $direccion : '' ?>"></td>
					<tr>
						<!-- Fila 5 -->
					<tr>
						<th>POBLACIÓN:</th>
						<td><input name="poblacion" type="text" size="20%"
								value="<?= isset($_POST['insertar']) ? $poblacion : '' ?>"></td>
						<th>CP:</th>
						<td><input name="cp" type="number" size="15%" value="<?= isset($_POST['insertar']) ? $cp : '' ?>"></td>
					<tr>
						<!-- Fila 6 -->
					<tr>
						<th>PROVINCIA:</th>
						<?php
						// Generamos el campo select desde PHP
						$provincias = array("Albacete", "Alicante", "Almería", "Murcia", "Valencia");
						echo "<td><select name='provincia'>";
						foreach ($provincias as $prov) {
							if (isset($_POST['insertar']) && ($prov == $provincia)) {
								echo "<option selected>$prov</option>";
							} else {
								echo "<option>$prov</option>";
							}
						}
						echo "</select></td>";
						?>
						<!-- Otra forma de hacerlo sin PHP
					<td><select name="provincia">
							<option>Albacete</option>
							<option>Alicante</option>
							<option>Almería</option>
							<option selected>Murcia</option>
							<option>Valencia</option>
						</select>
					</td>
					-->
						<th rowspan="3">OTROS:</th>
						<td rowspan="3"><textarea name="otros" rows="4"
								cols="20"><?= isset($_POST['insertar']) ? $otros : '' ?></textarea> </td>
						<!-- Fila 7 -->
					<tr>
						<th>AFICIONES:</th>
						<td>
							<?php
							// Generamos el campo checkbox desde PHP
							// Si se marca más de una afición, se envían en un array
							$listaAficiones = array("Deportes", "Cine", "Música", "Viajar", "Leer");
							foreach ($listaAficiones as $aficion) {
								if (isset($_POST['insertar']) && (in_array($aficion, $aficiones))) {
									echo "<input type='checkbox' name='aficiones[]' value='$aficion' checked='checked'/>$aficion";
								} else {
									echo "<input type='checkbox' name='aficiones[]' value='$aficion'/>$aficion";
								}
							}

							?>
							<!-- Generamos los checkbox sin PHP -->
							<!--
						<input type="checkbox" name="aficiones[]" value="Deportes" />Deportes
						<input type="checkbox" name="aficiones[]" value="Cine" />Cine
						<input type="checkbox" name="aficiones[]" value="Música" />Música
						<input type="checkbox" name="aficiones[]" value="Viajar" />Viajar
						<input type="checkbox" name="aficiones[]" value="Leer" />Leer
					-->
						</td>
						<!-- Fila 8 -->
					<tr>
						<th id="botones" colspan="3">
							<!-- Botones -->
							<input type="submit" name="insertar" value="Insertar" />
							<input type="reset" name="cancelar" value="Cancelar" />
							<input type="button" name="info" value="Información"
								onclick="window.alert('Esto es un ejemplo de formulario');" />
							<input type="submit" name="listado" id="listado" value="Listado" formnovalidate />
						</th>
					<tr>
				</table>
			</form>
			<!-- //Otra opción en vez de usar el atributo formnovalidate en el submit
		<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
			<input type="submit" name="listado" id="listado" value="Listado" />
		</form>
		-->
		<?php
	}
	?>
</body>

</html>