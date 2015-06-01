<!DOCTYPE html>
<html lang="es">
<head>
	<title>Probando php</title>
	<meta charset="utf-8">

</head>
<body>
	<!-- <form action="registrar_c.php" method="post" name="form">
		Nombre: <input type="text" name="nombre" /><br /><br />
		User: <input type="text" name="usuario" /><br /><br />
		Contraseña: <input type="password" name="pw" /><br /><br />
		Confirmar Contraseña: <input type="password" name="pw2" /><br /><br />
		Email: <input type="text" name="email" /><br /><br />
		<input type="submit" value="Registrar" />
	</form> -->
	<!-- <form action="verificar.php" method="post" name="form">
		User: <input type="text" name="usuario" /><br /><br />
		Contraseña: <input type="password" name="pw" /><br /><br />
		<input type="submit" value="Ingresar" />
	</form> -->
	<!-- <form action="procesar.php" method="post" enctype="multipart/form-data">
		<input type="file" name="foto" /><br /><br />
		<input type="submit" value="Upload" />
	</form> -->
	<form action="enviar_c.php" method="post">
		<input type="text" name="asunto" /><br /><br />
		<textarea name="mensaje"></textarea><br /><br />
		<input type="submit" value="Enviar correo" />
	</form>
	<!-- <form action="modificar.php" method="post" name="form">
		<input type="text" name="viejo" /><br /><br />
		<input type="text" name="nuevo" /><br /><br />
		<input type="submit" value="Actualizar" />
	</form> -->
</body>
</html>