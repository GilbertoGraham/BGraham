<?php
//paso 1
session_start();
if (empty($_SESSION['user']))
{
	echo "Debe autentificarse";
	exit();
}
//paso 2
//conexion al servidor web y bd
$conexionBD = mysqli_connect('localhost', 'root', 'root', 'ITS') or die
('No pudo conectarse al Servidor de Base de Datos MySql:' .mysql_error());

//seleccion al servidor web y db
//mysqli_select_db($conexionBD, 'kardex') or die ('No se puede abrir la estructura de BD' .mysql_error());

//query para obtener conjunto de registro de la tabla de especialidades
$qry = "SELECT * FROM Especialidad ORDER BY id";

//ejecutar el query
$tablaBD = mysqli_query($conexionBD, $qry);

//paso 3
//si existen registros crear tabla
if (mysqli_num_rows($tablaBD)>0){
	//crear el encabezado de la tabla
	echo"
	<html>
	<title></title>
	<head>
		<script type = 'text/javascript'>
		funcion enviar(){
			window.location = 'updEspecialidades.php?id=noId';
		}
		</script>
	</head>
	<body>
	<table align='center' width='430' border='1'>
		<tr>
			<td colspan='2' align='center'>
				<input type='button' id='btnAgregar' name='btnAgregar' value='Agregar' onclick='enviar()'>
			</td>
		</tr>
	</table>
	<table id = 'idTabla' border = '1' align = 'center' width = '430'>
		<tr><td>
		<thead>
			<tr style = 'background-color: #BAB7B7'>
			<th width = '30' height = '20'> id </th>
			<th width = '50' height = '20'> Clave </th>
			<th width = '400' height = '20'> Nombre </th>
		</thead>
		<!- ciclo para recorrer la tabla de registros intermedios que forma ->
		<!- la tabla html ->
		</td></tr>
		";
		//desplegar los registros de la tabla especialidades de la bd
		while($registro = mysqli_fetch_array($tablaBD)){
			$id = $registro['id'];
			$clave = $registro['clave'];
			$nombre = $registro['nombre'];
			echo "<tr>";
			echo "<script type = 'text/javascript'> document.getElementByld('hdnld').value = $id; </script>";
			echo "<td><a href = 'updEspecialidades.php?id=$id'>" .$id. "</a></td>";
			echo "<td>" .$clave. "</td>";
			echo "<td>" .$nombre. "</td>";
			echo "</tr>";
		}
		echo "<table>";
}
else{
	//notificar que no existen registros en la tabla de especialidades
	echo "
	<table border = '0' align = 'center' bordercolor = 'ff3333'>
			<tr>
				<td></td>
			</tr>
		<tr align = 'center'>
		<td width = '1000' align = 'center'><font color = '#ff3333'> No existe registros en la tabla de Especialidades!! </font></td>
		</tr>
	</table> ";
	echo " </body> ";
}
//cerrar la conexion a la bd
mysqli_free_result($tablaBD); //libera los registros de la tabla
mysqli_close($conexionBD);
?>
