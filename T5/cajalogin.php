 <?php
//session_start();

$connect=new mysqli("localhost","root","","dwes");

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	    <link rel="stylesheet" type="text/css" href="css/common.css"/>
	    <link rel="stylesheet" type="text/css" href="css/login.css" />
	    <script>
	    	function mostrarCuadro(){
				document.getElementById('cajalogin').style.display="block";
			}
			function ocultarCuadro(){
				document.getElementById('cajalogin').style.display="none";
			}
	    </script>

</head>



<body>
	<div>
	 <button onclick="mostrarCuadro()">Click me</button>
	</div>

<div id="cajalogin">
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
	    <p>Iniciar sesión</p>
	    <button onclick="ocultarCuadro()">X</button>
		
		<input class="input-login" type="text" name="username" id="username" placeholder="Usuario">
	
		<input class="input-login" type="password" name="password" id="password" placeholder="Contraseña">

		
		<input class="input-login" type="submit" value="Enviar">
	</form>
</div>

	<div>
		<h1>Contenido</h1>
		<p>Lorem fistrum apetecan ese hombree benemeritaar tiene musho peligro apetecan. Torpedo está la cosa muy malar está la cosa muy malar no puedor ahorarr ahorarr me cago en tus muelas por la gloria de mi madre apetecan tiene musho peligro. A peich está la cosa muy malar caballo blanco caballo negroorl diodenoo. Fistro me cago en tus muelas llevame al sircoo amatomaa al ataquerl. No puedor caballo blanco caballo negroorl benemeritaar torpedo a peich se calle ustée no te digo trigo por no llamarte Rodrigor benemeritaar apetecan. Llevame al sircoo jarl quietooor a wan benemeritaar condemor te va a hasé pupitaa. Papaar papaar no te digo trigo por no llamarte Rodrigor amatomaa diodeno va usté muy cargadoo tiene musho peligro ese que llega. </p>
		<p>Lorem fistrum apetecan ese hombree benemeritaar tiene musho peligro apetecan. Torpedo está la cosa muy malar está la cosa muy malar no puedor ahorarr ahorarr me cago en tus muelas por la gloria de mi madre apetecan tiene musho peligro. A peich está la cosa muy malar caballo blanco caballo negroorl diodenoo. Fistro me cago en tus muelas llevame al sircoo amatomaa al ataquerl. No puedor caballo blanco caballo negroorl benemeritaar torpedo a peich se calle ustée no te digo trigo por no llamarte Rodrigor benemeritaar apetecan. Llevame al sircoo jarl quietooor a wan benemeritaar condemor te va a hasé pupitaa. Papaar papaar no te digo trigo por no llamarte Rodrigor amatomaa diodeno va usté muy cargadoo tiene musho peligro ese que llega. </p>
	</div>
	<br>
	<?php
	$consulta = mysqli_query($connect, "SELECT cod, nombre FROM familia");
    if (mysqli_num_rows($consulta) > 0){
    	 while($row = mysqli_fetch_array($consulta, MYSQLI_ASSOC)) {
    	 htmlspecialchars($utfstring, ENT_QUOTES, 'UTF-8');

 
    	 	echo $row['cod']."----";
    	 	echo $row['nombre'];
    	 }
    }
	?>
</body>



</html>