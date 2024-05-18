<?php
session_start();
if (@$_SESSION['admin'] == true) {
	include 'cabecera.php';
?>

	<div class="container">
		<div id="title">Consultar usuarios</div>
		<form class="search-form" action="consultar.php" method="get">
			<input type="text" name="username" placeholder="Buscar por username">
			<button type="submit">Buscar</button>
		</form>
	</div>

	<?php

	include "../connection/connection.php";

	if (isset($_GET['username']) && !empty($_GET['username'])) {
		$username = $_GET['username'];

		$consulta = "SELECT * FROM files.usuario WHERE user LIKE '%$username%'";
	} else {
		$consulta = "SELECT * FROM files.usuario";
	}

	$resultado = $conn->query($consulta);

	printf(
		"<table class='custom-table'>
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Apellido paterno</th>
				<th>Apellido materno</th>
				<th>Username</th>
				<th>Correo electrónico</th>
				<th>Contraseña</th>
				<th>Tipo</th>
				<th>Opciones</th>
			</tr>
		</thead>"
	);

	while ($obj = $resultado->fetch_object()) {
		$tipoletra = 0;
		if ($obj->tipo == 1) {
			$tipoletra = "Administrador";
		} else {
			$tipoletra = "Usuario";
		}

		printf("<tr>");
		printf(
			"<td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td>
		<td>
			<div class='options'>
				<form class='formtable' action='edituser.php' method='get'>
					<input type='hidden' name='idusuario' value='%s'>
					<button class='btntable btn-edit' type='submit'>Editar</button>
				</form>
				<form class='formtable' action='deluser.php' method='get'>
					<input type='hidden' name='idusuario' value='%s'>
					<button class='btntable btn-delete' type='submit'>Eliminar</button>
				</form>
			</div>
		</td>",
			$obj->nombre,
			$obj->apellido_paterno,
			$obj->apellido_materno,
			$obj->user,
			$obj->email,
			$obj->pass,
			$tipoletra,
			$obj->idusuario,
			$obj->idusuario
		);
	}
	printf("</tr></table>");

	?>
	<?php include 'pie.php'; ?>
<?php
}
?>