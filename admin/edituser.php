<?php
session_start();
if (@$_SESSION["admin"] == true) {
	include 'cabecera.php';
?>

	<?php

	include "../connection/connection.php";

	$idreceiveduser = $_GET['idusuario'];
	$consulta = "SELECT * FROM files.usuario WHERE idusuario='" . $idreceiveduser . "'";
	$resultado = $conn->query($consulta);
	$obj = $resultado->fetch_object();
	?>

	<div id="title">Actualizar usuario</div>
	<form method="get" action="updatedb.php">
		<input type="hidden" name="iduser" value='<?php echo $idreceiveduser; ?>' />

		<label for="name">Nombre:</label>
		<input type="text" name="name" value='<?php echo $obj->nombre; ?>' />

		<label for="apellidop">Apellido paterno:</label>
		<input type="text" name="apellidop" value='<?php echo $obj->apellido_paterno; ?>' />

		<label for="apellidom">Apellido materno:</label>
		<input type="text" name="apellidom" value='<?php echo $obj->apellido_materno; ?>' />

		<label for="user">Username:</label>
		<input type="text" name="user" value='<?php echo $obj->user; ?>' />

		<label for="email">Correo:</label>
		<input type="email" name="email" value='<?php echo $obj->email; ?>' />

		<label for="pass">Contraseña</label>
		<input type="password" name="pass" value='<?php echo $obj->pass; ?>' />

		<label for="tipo">Tipo:</label>
		<select name="tipo">
			<?php
			if ($obj->tipo == 1) {
				echo "<option value=1 selected>Administrador</option>";
			} else {
				echo "<option value=1>Administrador</option>";
			}

			if ($obj->tipo == 2) {
				echo "<option value=2 selected>Usuario</option>";
			} else {
				echo "<option value=2>Usuario</option>";
			}
			?>
		</select>
		<input type="submit" value="Actualizar usuario" />
	</form>

	<?php include 'pie.php'; ?>

<?php
}
?>