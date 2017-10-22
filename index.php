<!DOCTYPE html>
<html lang="">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/header.css">
	<link rel="stylesheet" href="css/estiloLogin.css">
</head>

<body>
	<?php
			include "header.php";
		?>
		<div class="login-wrap">
			<div class="login-html">
				<input id="tab-1" type="radio" name="tab" class="sign-in" checked>
				<label for="tab-1" class="tab">Ingresar</label>
				<input id="tab-2" type="radio" name="tab" class="sign-up">
				<label for="tab-2" class="tab">Registrase</label>
				<div class="login-form">
					<div class="sign-in-htm">
						<div class="group">
							<label for="user" class="label">Usuario</label>
							<input id="user" type="text" class="input">
						</div>
						<div class="group">
							<label for="pass" class="label">Contraseña</label>
							<input id="pass" type="password" class="input" data-type="password">
						</div>
						<div class="group">
							<input id="check" type="checkbox" class="check" checked>
							<label for="check">
								<span class="icon"></span> recordame</label>
						</div>
						<div class="group">
							<input onclick="loginIngreso();" type="submit" class="button" value="Ingresar">
						</div>
						<div class="foot-lnk">
							<a href="#forgot">Olvido su contraseña?</a>
						</div>
					</div>
					<form <form role="form" action="php/registroEmpleado.php" name="registroEmpleado" id="prospects_form" method="post" enctype="multipart/form-data">
						<div class="sign-up-htm">
							<div class="group">
								<label for="user" class="label">Usuario</label>
								<input id="txtUsuario" type="text" step=0.01 name="txtUsuario" class="input" REQUIRED>
							</div>
							<div class="group">
								<label for="pass" class="label">Contraseña</label>
								<input id="txtContraseña" type="password" step=0.01 name="txtContraseña" class="input" data-type="password" REQUIRED>
							</div>
							<div class="group">
								<label for="pass" class="label">Cedula </label>
								<input id="txtCedula" type="text" step=0.01 name="txtCedula" class="input" REQUIRED>
							</div>
							<div class="group">
								<label for="pass" class="label">Nombre</label>
								<input id="txtNombre" type="text" step=0.01 name="txtNombre" class="input" REQUIRED>
							</div>
							<div class="group">
								<label for="pass" class="label">Apellido 1 </label>
								<input id="txtApellidoUno" type="text" step=0.01 name="txtApellidoUno" class="input" REQUIRED>
							</div>
							<div class="group">
								<label for="pass" class="label">Apellido 2 </label>
								<input id="txtApellidoDos" type="text" step=0.01 name="txtApellidoDos" class="input" REQUIRED>
							</div>
							<div class="group">
								<label for="pass" class="label">Direccion</label>
								<input id="txtDireccion" step=0.01 name="txtDireccion" type="text" class="input" REQUIRED>
							</div>
							<div class="group">
								<label for="pass" class="label">Telefono</label>
								<input id="txtTelefono" step=0.01 name="txtTelefono" type="text" class="input">
							</div>
							<div class="group">
								<label id="pass" for="combobox" class="label">Rol</label>
								<select id="combobox" class="input" name="combobox" REQUIRED>
									<option value="admin">Admin</option>
									<option value="nutri">Nutricionista</option>
									<option value="entrenador">Entrenador</option>
								</select>
								<br>
								<div class="group">
									<input id="pass" type="submit" class="button" value="Registarse ">
								</div>
								<div class="foot-lnk">
									<label for="tab-1"> Ya eres Mienbro?</a>
								</div>
							</div>
					</form>
					</div>
				</div>
			</div>
		</div>

		<?php include "footer.php" ?>
		<script language="JavaScript" type="text/javascript" src="js/registroEmpleado.js"></script>
		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>

</body>

</html>