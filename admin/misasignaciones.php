<?php
session_start();
if (@$_SESSION['admin'] == false) {
	$nombreUsuario = @$_SESSION['fname'];
?>

	<!DOCTYPE html>
	<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../css/style2.css" />
		<title>Página Usuarios</title>
	</head>

	<body>
		<header>
			<h1>Página Usuarios sin privilegios</h1>
			<a class="logout-button" href="../connection/logout.php">Salir</a>
			<p>Hola <?php echo $nombreUsuario; ?></p>
		</header>

		<main>
			<h2>Sistemas de informacion</h2>
			<p> es un conjunto de elementos que interactúan entre sí con un fin común; que permite que la información esté disponible para satisfacer las necesidades en una organización</p>
			<img src="https://definicion.de/wp-content/uploads/2008/03/sistema-de-informacion.jpg" alt="Imagen">
			<p>Los componentes de sistema son: Entradas: Datos, información, insumos que ingresan al sistema. Procesos: Cambios que se producen a las entradas para generar salidas, resultados del sistema.</p>
		</main>

		<footer>
			<p>&copy; 2023 <a href="https://github.com/snappiermars/ProyectoSI">EZEQUIEL AMADO CRUZ JUAREZ</a></p>
		</footer>
	</body>

	</html>

<?php
}
?>