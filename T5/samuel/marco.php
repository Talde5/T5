 <?php session_start();

 /* $_SESSION['IdSarrera'] = $_GET['IdSarrera'];
          
        $v2 = $_SESSION['IdSarrera'];
        echo $v2;
$("#inputId").removeAttr('name'); no mostrar atributos específicos en el get
        */

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
              
              
              
              $consulta="SELECT IdSarrera, Tituloak, Gaia, Describapena , Bisitak, Data, Especialidades, Jefe_de_cocina, Localizacion,Medios_de_pago, Precios_medios, Servicios, Estrellas, Contacto FROM Sarrerak WHERE IdSarrera=$sarrera";

              $resultado = $connect-> query($consulta);
              if (!$resultado) {
                echo "Ha habido un problema. <br/>";
              }

            }catch (PDOException $e) { 
          echo "Ha habido un problema. <br/>" . $e->getMessage();}

//escripe los resultados del select
        while ($row =mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
   
             echo $row['Tituloak'];
             echo $row['Gaia'];   
             echo $row['Describapena'];  
             echo $row['Bisitak'];  
             echo $row['Data'];  
             echo $row['Especialidades'];  
             echo $row['Jefe_de_cocina'];  
             echo $row['Localizacion'];  
             echo $row['Medios_de_pago'];  
             echo $row['Precios_medios']; 
             echo $row['Servicios']; 
             echo $row['Estrellas'];  
             echo $row['Contacto']; 
         
        }

      ?>

      <?php 

        if(isset($_SESSION['username'])){   
      ?>

 <form id="form_iruzkina" action="marco.php?IdSarrera=<?php echo $sarrera; ?>" method="post">



          iruzkina :<textarea name="Edukia" class="caja" id="Edukia" required></textarea><br>

          
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

  <div class="comentariosOcultar"> 
    <?php 
 echo $row['Nick'];
 echo $row['Edukia'];   
 echo $row['Iritzia'];
$fechabuena=$row['Data'];
$fechabuen=date("d/m/Y", strtotime($fechabuena));
echo $fechabuen;


   ?>
 </div>
<?php 

}    
      
        ?>



      
    </div>

  </body>
    </html>