<?php
	session_start();
	if(empty($_SESSION['user'])){
		echo "Debe autenticarse";
	}
?>
<!DOCTYPE html>
<html>
<head>
		<title>Gilberto Graham Cortes</title>
		<link rel="icon" type="image/png" href="/Web2/img/Aicon.png" />
	<meta charset="utf-8"/>
	<title></title>
	<script type="text/javascript">
		function opcion(opc){
			switch (opc){
				case 'Especialidades':
					top.frames['2'].location.href="/Web2/php/Especialidades/shwEspecialidades.php";
					break;
					case 'Materias':
					top.frames['2'].location.href="materias/shwMaterias.php";
					break;
					case 'Alumnos':
					top.frames['2'].location.href="alumnos.html";
					break;
					case 'Calificaciones':
					top.frames['2'].location.href="calificaciones.html";
					break;
					case 'Terminar':
					window.top.location.href="/Web2/index.html";
					break;
			}
			opc="";
		}
	</script>
	<style type="text/css">
		.tamanoBoton{
			width: 150px;
			height: 40px;
			}
	</style>
</head>
<body background="/Web2/img/black.jpg" height="50px">
	<table align="center">
		<tr>
			<td>
				<input type="button" value="Especialidades" class="tamanoBoton" onclick="opcion('Especialidades');">
			</td>
		</tr>
		<tr>
			<td>
				<input type="button" value="Materias" class="tamanoBoton" onclick="opcion('Materias');">
			</td>
		</tr>
		<tr>
			<td>
				<input type="button" value="Alumnos" style="width: 150px; height:40px;" onclick="opcion('Alumnos');">
			</td>
		</tr>
		<tr>
			<td>
				<input type="button" value="Calificaciones" style="width: 150px; height:40px;" onclick="opcion('Calificaciones');">
			</td>
		</tr>
		<tr style="height: 200px">
			<td>
				<input type="button" value="Terminar" style="width: 150px; height:40px;" onclick="opcion('Terminar');">
			</td>
		</tr>
	</table>
</body>
</html>
