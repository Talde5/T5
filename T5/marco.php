 <?php session_start();

     $sarrera=$_GET['IdSarrera'];
 ?>

<!DOCTYPE html>
<html>
  <head>
    <link href="Plantilla.css" rel="stylesheet" type="text/css"/>
    <link href="estilos1.css" rel="stylesheet" type="text/css"/>
  </head>
  <body>
    <div>
      <?php

       
        try { $connect= new mysqli("localhost","root","","proyecto_T5");
              echo "conexion exitosa. <br/>"; 
              
              
              $consulta="SELECT IdSarrera, Tituloak, Gaia, Describapena , Bisitak, Data, Especialidades, Jefe_de_cocina, Localizacion,Medios_de_pago, Precios_medios, Servicios, Estrellas, Contacto FROM Sarrerak WHERE IdSarrera= $sarrera";

             $resultado = $connect-> query($consulta);
              if (!$resultado) {
                echo "Ha habido un gran  problema. <br/>";
              }

            }catch (PDOException $e) { 
          echo "Ha habido un problema. <br/>" . $e->getMessage();}

//escripe los resultados del select
        while ($row =mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
     ?>
     <h2>
     <?php
             echo $row['Tituloak'];

      ?>
      </h2>
      <p>
      <h4>
      <?php

             echo $row['Gaia']; 
      ?>
      </h4>
      </p>
      <hr>
       <p>
      <?php  
             echo $row['Describapena'];  
      ?>
      </p>
       <p>
      <?php
             echo $row['Bisitak'];
      ?>
      </p>
       <p>
      <?php  
             echo $row['Data'];
      ?>
      </p>
       <p>
        <ul>
            <li>Especialidades
              <ul>
                
              
      <?php  
            /*echo $row['Especialidades'];*/
            $especial = explode(".",$row['Especialidades']);
            $array_esp = count($especial) - 1;
             for ($i=0; $i < $array_esp ; $i++) {  
            ?>
            <li>
              <?php
              echo $especial[$i];
            ?>
          </li>
          <?php
             }

               
            
      ?>
            </ul>
          </li>
        </ul>
      </p>
       <p>
        <ul>
          <li>Jefe de cocina
            <ul>
              <li>
      <?php  
             echo $row['Jefe_de_cocina'];
      ?>
            </li>
          </ul>
        </li>
      </ul>
      </p>
       <p>
        <ul>
          <li>Localizacion 
            <ul>
              <li>
      <?php  
             echo $row['Localizacion'];
      ?>
              </li>
            </ul>
          </li>
        </ul>
      </p>
       <p>
        <ul>
          <li>Medios de pago 
             <ul>
      <?php  
            /*echo $row['Medios_de_pago'];*/

            $precio = explode("-",$row['Medios_de_pago']);
            $array_pre = count($precio);

            for ($i=0; $i < $array_pre ; $i++) { 
      ?>   
     
        <li>
      <?php    
             echo $precio[$i];
      ?> 
              </li>
      <?php 
        }
      ?>
            </ul>
          </li>
      </ul> 
      </p>
       <p>
          <ul>
            <li>Precios medios
              <ul>
                <li>
      <?php  
             echo $row['Precios_medios']; 
       ?>
                </li>
              </ul>
            </li>
        </ul>
      </p>
       <p>
        <ul>
            <li> Servicios
              <ul>
            
      <?php 


            $servi = explode("-",$row['Servicios']);
            $array_ser = count($servi);

            for ($i=0; $i < $array_ser ; $i++) { 
        ?>
              
        <li>
          <?php 
           echo $servi[$i];
            ?>
          </li>


          <?php 
            }
          ?>
            </ul>
          </li>
        </ul>


      </p>
       <p>
        <ul>
          <li>Estrellas Michelin
            <ul>
              <li>
      <?php  
             echo $row['Estrellas'];
       ?>
              </li>
            </ul>
          </li>
        </ul>
      </p>
       <p>
        <ul>
          <li>Contactos
            <ul>
            
      <?php 


            $contactos = explode(": ",$row['Contacto']);
            $array_cont = count($contactos);

            for ($i=0; $i < $array_cont ; $i++) { 
        ?>
              
        <li>
          <?php 
           echo $contactos[$i];
            ?>
          </li>


          <?php 
            }
          ?>
            </ul>
     <!--  <?php   
             echo $row['Contacto']; 
         
        }

      ?> -->
        </li>
      </ul>
    </p>
      <?php 

       if(isset($_SESSION['username'])){   
      ?>

 <div>
   

<form id="form_iruzkina" action="marco.php?IdSarrera=<?php echo $sarrera; ?>" method="post">

          iruzkina :<textarea name="Edukia" class="caja" id="Edukia"> </textarea><br>

          
        <div id="fb-root"></div>
        <p class="clasificacion">


 <input class="estrellas" id="radio1" name="estrellas" value="5" type="radio" required><!--
        --><label for="radio1">★</label><!--
        --><input id="radio2" name="estrellas" value="4" type="radio"><!--
        --><label for="radio2">★</label><!--
        --><input id="radio3" name="estrellas" value="3" type="radio"><!--
        --><label for="radio3">★</label><!--
        --><input id="radio4" name="estrellas" value="2" type="radio"><!--
        --><label for="radio4">★</label><!--
        --><input id="radio5" name="estrellas" value="1" type="radio"><!--
        --><label for="radio5">★</label>
        </p>
               <input type="submit"  name="enviar" value="Enviar">

        <input type="reset" value="Garbitu" >
</form>

 </div>
      <?php 

         }else{
      echo "Inicia sesión para comentar";
      echo "<a href='index1.php'>Login</a>";
    }

         if(isset($_POST['enviar'])){
             
           try  { $connect= new mysqli("localhost","root","","proyecto_T5");
            
            
            $Nick= $_SESSION ['username'];
            $IdSarrera= $_GET ['IdSarrera'];
            $Edukia= $_POST ['Edukia'];
            $iritzia= $_POST ['estrellas'];
            echo $iritzia;
               /* $newdate= new DateTime();
                $dateformato=toString($newdate);
      */
            $max_id="SELECT IdIruzkina FROM Iruzkinak where IdIruzkina= (SELECT MAX(IdIruzkina) from Iruzkinak)";
            $result_id = $connect-> query($max_id);
             while ($row =mysqli_fetch_array($result_id, MYSQLI_ASSOC)) {
            $id_buena=$row['IdIruzkina'];
            $id_buena++;
          }

          //DATE
          /*setlocale(LC_TIME, "es_ES");
          $fecha=strftime("%d-%m-%Y");
          */



             $consulta="INSERT INTO Iruzkinak( IdIruzkina, Nick, Edukia, Iritzia, Data, IdSarrera) VALUES ('".$id_buena."','".$Nick."','".$Edukia."','".$iritzia."',curdate(),'$sarrera' )";

               $resultado = $connect-> query($consulta);
               header("location: marco.php?IdSarrera=$sarrera");

              if (!$resultado) {
              echo "Ha habido un problema. <br/>"; 
            }

          }  catch (PDOException $e) { 
        echo "Ha habido un problema. <br/>" . $e->getMessage();
}
//escripe los resltados del select    
}

 $consulta1="SELECT Data FROM Iruzkinak where IdIruzkina='29'";
 $resultado1 = $connect-> query($consulta1);
 while ($row =mysqli_fetch_array($resultado1, MYSQLI_ASSOC)) {
      $fechabuena=$row['Data'];
      $fechabuen=date("d/m/Y", strtotime($fechabuena));
      echo $fechabuen;
    }

?>

<?php 
      try  { $connect= new mysqli("localhost","root","","proyecto_T5");
       
          $consulta="SELECT Nick, Edukia, Iritzia, Data  FROM Iruzkinak WHERE IdSarrera=$sarrera ORDER BY Data DESC";
          $resultado = $connect-> query($consulta);

              if (!$resultado) {
              echo "Ha habido un problema. <br/>";
            }

          }  catch (PDOException $e) { 
        echo "conexion fallida. <br/>" . $e->getMessage();
}
//escripe los resltados del select
    while ($row =mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {

 ?>
 <br>
<div class="comentariosOcultar"> 



  <table>
      <tr>
        <th>
		
		<?php 	 
		 
		  
		 
		 
		$fechabuena=$row['Data'];
		$fechabuen=date("d/m/Y", strtotime($fechabuena));
		echo $fechabuen;


   ?>
		</th>
		<th>
    <?php 
		 echo $row['Nick'];
	  ?>
		</th>
	</tr>	
		<tr>
			<td>
	<?php 
		 echo $row['Edukia'];   
		
		 
	 ?>
	 </td>	
	</tr>
	 <tr>
			<td>nota:
	 <?php
	 echo $row['Iritzia'];
	 ?>
	 
		</td>	
	</tr>
	 
	
     
    </tr>
   </table>  
   <br>
 </div>
	<?php 

		;}    
      
        ?>



      
    </div>

  </body>
    </html>