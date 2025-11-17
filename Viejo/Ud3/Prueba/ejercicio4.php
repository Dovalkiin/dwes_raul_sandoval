<?php
$titulo = "Ejercicio 4 - Ejercicios Progresivos";
require("includes/cabecera.php");
?>
<table>
	<tr>
		<th>Ciudad</th>
		<th>Población</th>
	</tr>
	<?php
	//nos conectamos a mysql
	$cnx = conectar();
	//consulta.
	$sql = "select Name, Population from city where CountryCode = (select Code from country where Name = 'Spain') and (Population > 200000)";

	$res = mysqli_query($cnx, $sql) or die(mysqli_error($cnx));
	$conta = 1;
	if (mysqli_num_rows($res) > 0) {
		//mostramos los datos.
		//while (list($ciudad, $poblacion) = mysqli_fetch_array($res)) {
		while ($datosCiudad = mysqli_fetch_array($res)) {
			echo "<tr>";
			$conta++;

			$poblacion = number_format($datosCiudad['Population'], 0, ',', '.');	
			$ciudad = $datosCiudad['Name'];		
			//$ciudad = mb_convert_encoding($datosCiudad['Name'], 'ISO-8859-1', 'UTF-8');
			echo "<td>$ciudad</td>\n";
			echo "<td>$poblacion</td>\n";
			echo "</tr>\n";
		}
		$conta = $conta - 1;
		echo "<tr><td colspan='2'>$conta ciudades</td></tr>";
	} else {
		echo "<tr><td colspan='2' align='center' >No se obtuvieron resultados</td></tr>";
	}
	mysqli_free_result($res);
	mysqli_close($cnx);
	?>
</table>

<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
	<table>
		<tr>
			<td></td>
		</tr>
	</table>
</form>
<?php
require("includes/pie.php");
?>