<?php
/*función conectar: se conecta a MySQL/MariaDB, selecciona la base de datos y devuelve el identificador de conexión */
function conectar()
{
    global $HOSTNAME,$USERNAME,$PASSWORD,$DATABASE,$REGPAG;
	$idcnx = mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD,$DATABASE) or die("Error de conexión con la base de datos");
    //mysqli_set_charset($idcnx,"utf8");
    mysqli_set_charset($idcnx,"latin1");
	return $idcnx;		
}
/* Función para eliminar etiquetas HTML y espacios de las entredas de los usuarios */
function limpiar_dato(string $dato): string {
    $dato = htmlspecialchars($dato);
    $dato = trim($dato);
}
?>
