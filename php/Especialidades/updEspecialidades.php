<?php
	//aqui la variable de sesion valida la autenticacion al programa, queda pendiente

//conexion al servidor de Base de Datos
$connect = mysqli_connect("localhost", "root", "root", "ITS");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
	//identificar la accion del usuario para conocer que tipo de query usar en la actializacion de la bd

if(isset($_GET['id'])){
  $accion = $_GET['id'];
}


	if($accion == 'noId')
	{
		//construir el html de la interface pra la opcion de agregar un nuevo registrio
		echo "
			<html>
			<head>
			<title></title>
				<script type='text/javascript'>
					function enviar(opc)
					{
						switch(opc)
						{
							case 'agregar':
								document.getElementById('hdnOpc').value = 'agregar';
								document.getElementById('frmUpdEspecialidades').submit();
								break;
							case 'regresar':
								window.location = 'shwEspecialidades.php'
								break;
						}
					}
				</script>
			</head>
			<body onLoad='javascript: document.getElementById(\"txtId\").focus()'>
			<form name='frmUpdEspecialidades' id='frmUpdEspecialidades' action='qryEspecialidades.php' method='POST'>
				<table align='center' width='430' border='1'>
					<tr height='100'>
						<td colspan='2' align='center'>
							<b>Agregando Especialidades</b>
							<input type='hidden' id='hdnOpc' name='hdnOpc'>
						</td>
					</tr>
					<tr>
						<td>Id</td>
						<td><input type='text' id='txtId' name='txtId'></td>
					</tr>
					<tr>
						<td>Clave</td>
						<td><input type='text' id='txtClave' name='txtClave'></td>
					</tr>
					<tr>
						<td>Nombre</td>
						<td><input type='text' id='txtNombre' name='txtNombre'></td>
					</tr>
					<tr>
						<td colspan='2' align='center'>
						<input type='button' id='btnGrabar' name='btnGrabar' value='Grabar' style='width:100px' onClick='enviar(\"agregar\")'></td>
					</tr>
					<tr>
						<td colspan='2' align='center'>
						<input type='button' id='btnEliminar' name='btnEliminar' value='Eliminar' style='width:100px' onClick='enviar(\"eliminar\")'></td>
					</tr>
					<tr>
						<td colspan='2' align='center'>
						<input type='button' id='btnRegresar' name='btnRegresar' value='Regresar' style='width:100px' onClick='enviar(\"regresar\")'></td>
					</tr>
				</table>
			</html>
		";
	}else
	{
		//construir el formulario para la opcion de modificar el registro
		//obtener el id para recuperar el registro correspondiente
		$id = $_GET['id'];

		//obtener la recoleccion de registros que corresponde al id enviado
		$query = "SELECT * FROM especialidades WHERE id='$id'";

		//ejecutar a consulta
		$tablaBD = mysqli_query($connect, $query);

		//sacar los datos de la tabla de registros intermedios
		$registro = mysqli_fetch_array($tablaBD, MYSQLI_NUM);
		$clave = $registro['clave'];
		$nombre = $registro['nombre'];

		//construir el html de la interfce para la opcion de modificar
		echo "
			<html>
			<head>
			<title></title>
				<script type='text/javascript'>
					function enviar(opc)
					{
						switch (opc) {
							case 'modificar':
								document.getElementById('hdnOpc').value = 'modificar';
								document.getElementById('hdnId').value = '$id';
								document.getElementById('frmUpdEspecialidades').submit();
								break;

							case 'eliminar':
								document.getElementById('hdnOpc').value = 'eliminar';
								document.getElementById('hdnId').value = '$id';
								document.getElementById(frmUpdEspecialidades).submit();
								break;

							case 'regresar':
								window.location = 'shwEspecialidades.php'
								break;
						}
					}
				</script>
			</head>
			<body onLoad='javascript:document.getElementById(\"txtNombre\").focus()'>
				<form name='frmUpdEspecialidades' id='frmUpdEspecialidades' action='qryEspecialidades.php' method='POST'>
					<table align='center' width='430'>
						<tr height='100'>
							<td colspan='2' align='center'>
								<b>Modificando especialidades</b>
								<input type='hidden' id='hdnOpc' name='hdnOpc'>
								<input type='hidden' id='hdnId' name='hdnId'>
							</td>
						</tr>
						<tr>
							<td>Id</td>
							<td>$id</td>
						</tr>
						<tr>
							<td>Clave</td>
							<td><input type='text' id='txtClave' name='txtClave' value='$clave'>
							</td>
						</tr>
						<tr>
							<td>Nombre</td>
							<td><input type='text' id='txtNombre' name='txtNombre' value='$nombre'>
							</td>
						</tr>
						<tr>
							<td colspan='2' align='center'>
							<input type='button' id='btnGrabar' name='btnGrabar' value='Grabar' style='width:100px' onClick='enviar(\"modificar\")'>
							</td>
						</tr>
						<tr>
							<td colspan='2' align='center'>
							<input type='button' id='btnEliminar' name='btnEliminar' value='Eliminar' style='width:100px' onClick='enviar(\"eliminar\")'>
							</td>
						</tr>
						<tr>
							<td colspan='2' align='center'>
							<input type='button' id='btnRegresar' name='btnRegresar' value='Regresar' style='width:100px' onClick='enviar(\"regresar\")'>
							</td>
						</tr>
					</table>
				</body>
			</html>
		";
	}
?>
