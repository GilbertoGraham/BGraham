<?php
	session_start();
	if(empty($_SESSION['user'])){
		echo "Debe autentificarse";
	}
?>

<html>
<head>
	<title>Gilberto Graham Cortes</title>
	<link rel="icon" type="image/png" href="/Web2/img/Aicon.png" />
</head>
<frameset rows="36%,*">
	<frame src="/Web2/html/banner.html" noresize="noresize" scrolling="no">
	<frameset cols="15%,60%">
		<frame src="menuopciones.php" noresize="noresize" scrolling="no">
		<frame src="../html/nada.html" noresize="noresize" scrolling="no">
	</frameset>
</frameset>
</html>
