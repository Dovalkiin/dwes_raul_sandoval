<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title><?= $titulo ?></title>
	<link rel="stylesheet" type="text/css" href="style/style.css" />
</head>

<body>
	<?php
	require("config.php");
	require("funciones.php");
	?>
	<header id="cab">
		<h1 class="centrado">Ejercicios Progresivos de PHP con acceso a Bases de Datos</h1>
		<h2 class="centrado">Versión con la biblioteca MySQLi estilo procedimental</h2>
		<h3 class="centrado"><?= $titulo ?></h3>
	</header>
