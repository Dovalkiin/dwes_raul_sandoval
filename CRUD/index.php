<?php
require "config.php";
require "functions.php";
// --- Configuración de paginación ---
$por_pagina = 10;
$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
if ($pagina < 1) $pagina = 1;
$inicio = ($pagina - 1) * $por_pagina;

// --- Total de registros ---
$conexion = conectar();
$total_sql = "SELECT COUNT(*) FROM city";
$total_result = mysqli_query($conexion, $total_sql);
$total_filas = mysqli_fetch_row($total_result)[0];
$total_paginas = ceil($total_filas / $por_pagina);

// --- Consulta con LIMIT ---
$sql = "SELECT ID, Name, CountryCode, Population FROM city LIMIT ?, ?";
$stmt = mysqli_prepare($conexion, $sql);
mysqli_stmt_bind_param($stmt, "ii", $inicio, $por_pagina);
mysqli_stmt_execute($stmt);
$resultado = mysqli_stmt_get_result($stmt);
?>

<h2>Ciudades (página <?= $pagina ?> de <?= $total_paginas ?>)</h2>

<a href="create.php">➕ Añadir ciudad</a><br><br>

<table border="1" cellpadding="5">
<tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>País</th>
    <th>Población</th>
    <th>Acciones</th>
</tr>

<?php while ($fila = mysqli_fetch_assoc($resultado)) { ?>
<tr>
    <td><?= $fila['ID'] ?></td>
    <td><?= htmlspecialchars($fila['Name']) ?></td>
    <td><?= htmlspecialchars($fila['CountryCode']) ?></td>
    <td><?= $fila['Population'] ?></td>
    <td>
        <a href="update.php?id=<?= $fila['ID'] ?>">Editar</a> |
        <a href="delete.php?id=<?= $fila['ID'] ?>" onclick="return confirm('¿Seguro?')">Eliminar</a>
    </td>
</tr>
<?php } ?>
</table>

<br>

<?php
if ($pagina > 1)
    echo "<a href='?pagina=" . ($pagina - 1) . "'>⬅️ Anterior</a> ";

for ($i = 1; $i <= $total_paginas; $i++) {
    echo $i == $pagina ? "<strong>$i</strong> " : "<a href='?pagina=$i'>$i</a> ";
}

if ($pagina < $total_paginas)
    echo "<a href='?pagina=" . ($pagina + 1) . "'>Siguiente ➡️</a>";
?>
