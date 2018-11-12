<?php 
session_start();
?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset=UTF-8">
		<title>Print erabili</title>
	</head>
	<body>
		<?php 
          if(!isset($_POST['aceptar'])){   
        ?>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
              
	   		 Nick:<br>
	        <input type ="text"  name="Nick"/> <br/><br/>
	    	Pasahitza:<br>
	    	<input type ="text"  name="Pasahitza" /> <br/><br/>

	   		<button type="submit" name="aceptar">Aceptar</button>
		</form>
		<?php
	 		} else{
				try  { $connect= new mysqli("localhost","root","","proyecto_T5");
            	
            
            
           			$Nick= $_POST ['Nick'];

		            $Pasahitza= $_POST ['Pasahitza'];
		            $consulta="SELECT  Pasahitza FROM Erabiltzailea WHERE Nick='$Nick' ";
		 



              		$resultado = $connect-> query($consulta);
					if (mysqli_num_rows($resultado) == 1){
	                	while ($row =mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
	  
	 						
	           
	             			include 'Encrypt.php';
	           				$resultado = $row['Pasahitza'];

	                		$Pasahitza = encrypt($Pasahitza,$Nick);
	               		

		              			if ($row['Pasahitza'] == $Pasahitza ) {
		              		
		            		
					            	$_SESSION['loggedin'] = true;
					                $_SESSION['username'] = $Nick;
					                $_SESSION['start'] = time();
					                $_SESSION['browser'] = $_SERVER['HTTP_USER_AGENT'];
					                $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
					                $consultaadmin="SELECT Permisuak FROM Erabiltzailea WHERE Nick='$Nick' ";
					                $resultadoadmin = $connect-> query($consultaadmin);
					                while ($row1 =mysqli_fetch_array($resultadoadmin, MYSQLI_ASSOC)) {
					                	$result = $row1['Permisuak'];
					                }
					                
					                if($result == 1){
					                	$_SESSION['admin'] = 1;

					                }else{
					                	$_SESSION['admin'] = 0;
					              
					                }
					                	header( "Refresh:0; url=index1.php", true, 303);

		            			}
		            			else {
		             				echo "Usuario y/o contraseña mal introducidos. <br/>";
		            			}
	            			
						}
					}else {
		             	echo "Usuario y/o contraseña mal introducidos. <br/>";
		            }
          		}  catch (PDOException $e) { 
       			echo "conexion fallida. <br/>" . $e->getMessage();
				}

   
      		}

      	?>
	</body>
</html>