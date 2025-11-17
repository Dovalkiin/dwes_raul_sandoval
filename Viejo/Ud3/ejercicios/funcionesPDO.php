<?php
/*función conectar: se conecta a MySQL/MariaDB, selecciona la base de datos y devuelve el identificador de conexión */
function conectar(){
    global $HOSTNAME, $USERNAME, $PASSWORD, $DATABASE;

    $idcnx = new mysqli($HOSTNAME, $USERNAME,$PASSWORD,$DATABASE) or die("ERROR: No se puedo establecer la conexión a la base de datos.");

    mysqli_set_charset($idcnx, "utf8");

    return $idcnx;
}
?>
