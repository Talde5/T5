 <?php
error_reporting(0);
  ?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset=UTF-8">
		<title>Print erabili</title>
	</head>
	<body>
		<?php

		function encrypt($pass, $clave) {
		   $result = '';
		   for($i=0; $i<strlen($pass); $i++) {
		      $char = substr($pass, $i, 1);
		      $charclave = substr($clave, ($i % strlen($clave))-1, 1);
		      $char = chr(ord($char)+ord($charclave));
		      $result.=$char;
		   }
		   return base64_encode($result);
		}

		function decrypt($passEncr, $clave) {
		   $result = '';
		   $passEncr = base64_decode($passEncr);
		   for($i=0; $i<strlen($passEncr); $i++) {
		      $char = substr($passEncr, $i, 1);
		      $charclave = substr($clave, ($i % strlen($clave))-1, 1);
		      $char = chr(ord($char)-ord($charclave));
		      $result.=$char;
		   }
		   return $result;
		}
	
		?>

	</body>
</html>