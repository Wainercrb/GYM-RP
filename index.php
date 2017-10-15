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
				<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Ingresar</label>
				<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Registrase</label>
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
							<label for="check"><span class="icon"></span> recordame</label>
						</div>
						<div class="group">
							<input onclick="loginIngreso();" type="submit" class="button" value="Ingresar">
						</div>
						<div class="foot-lnk">
							<a href="#forgot">Olvido su contraseña?</a>
						</div>
					</div>
					<div class="sign-up-htm">
						<div class="group">
							<label for="user" class="label">Usuario</label>
							<input id="user" type="text" class="input">
						</div>
						<div class="group">
							<label for="pass" class="label">Contraseña</label>
							<input id="pass" type="password" class="input" data-type="password">
						</div>
						
						<div class="group">
							<label for="pass" class="label">Email </label>
							<input id="pass" type="text" class="input">
						</div>
						<div class="group">
							<label  id="pass"for="combobox" class="label">Sexo</label>
							<select  id="combobox" class="input"name="select">
								<option value="value1">Masculino</option>
								<option value="value2" >Femenino</option>
								<option value="value3">Desconocido</option>
							</select>
						</div>
						<div class="group">
							<label for="pass" class="label">Peso</label>
							<input id="pass" type="password" class="input" data-type="text">
						</div>
						<div class="group">
							<label for="pass" class="label">Altura</label>
							<input id="pass" type="password" class="input" data-type="text">
						</div>
						<div class="group">
							<label for="pass" class="label">Talla</label>
							<input id="pass" type="password" class="input" data-type="text">
						</div>
						<div class="group">
							<input  id="pass" type="submit" class="button" value="Registarse ">
						</div>
						<div class="foot-lnk">
						<label for="tab-1"> Ya eres Mienbro?</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include "footer.php" ?>
	<script language="JavaScript" type="text/javascript" src="js/direccionamiento.js"></script>
</body>
</html>