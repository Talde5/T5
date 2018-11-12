  <?php
error_reporting(0);
  ?>
  <!DOCTYPE html>
<html>
  <head>
          <link href="css/Plantilla.css"
      rel="stylesheet" type="text/css"/>
    </head>
    <body>
    	<header>
         <p>Datos alumnos</p>   
        </header>
        

       <?php 
           try  { $connect= new mysqli("localhost","root","","proyecto_T5");
            echo "conexion exitosa. <br/>"; 
            
            
            $consulta="SELECT IdSarrera,Tituloak,Gaia,Describapena FROM Sarrerak ORDER BY Bisitak DESC";
               $resultado = $connect-> query($consulta);
              if ($resultado) {
//comprobar que a realizado la conexion y guarda los datos
              echo "datos sacados. <br/>";
            }
            else {
              echo "error en la ejecución de la consulta. <br/>";
            }

          }  catch (PDOException $e) { 
        echo "conexion fallida. <br/>" . $e->getMessage();
}
//escripe los resltados del select
    while ($row =mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
  
 echo $row['Tituloak'];
 echo $row['Gaia'];  	
 echo $row['Describapena'];  	
 

	  	

?>

<?php

}        
      
        ?>

          
        </form>

        <footer>
            <p>@Examen</p>
        </footer>
    </body>

    (idSarrera, titulua, gaia, deskribapen laburra, bisitak, data, )
    
</html>