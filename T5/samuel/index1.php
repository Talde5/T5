 <?php session_start();
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>pagina inicial </title>
    <link rel="stylesheet" href="plantilla.css">
    
  </head>
  <body>
    <script>
      function des_2018(){
        if(document.getElementById("des_2018").style.display == "none"){
          document.getElementById("des_2018").style.display="block";
        } else {
          document.getElementById("des_2018").style.display="none";
        }
      }
      function des_2017(){
        if(document.getElementById("des_2017").style.display == "none"){
          document.getElementById("des_2017").style.display="block";
        } else {
          document.getElementById("des_2017").style.display="none";
        }
      }
      function des_2016(){
        if(document.getElementById("des_2016").style.display == "none"){
          document.getElementById("des_2016").style.display="block";
        } else {
          document.getElementById("des_2016").style.display="none";
        }
      }
      function des_2015(){
        if(document.getElementById("des_2015").style.display == "none"){
          document.getElementById("des_2015").style.display="block";
        } else {
          document.getElementById("des_2015").style.display="none";
        }
      }
      function des_2014(){
        if(document.getElementById("des_2014").style.display == "none"){
          document.getElementById("des_2014").style.display="block";
        } else {
          document.getElementById("des_2014").style.display="none";
        }
      }
    </script>
    <header id="cabecera">
      <img id="logo" id="obj_cab1" src="img/comida.jpg">
      <h1 id="obj_cab2">Nire Jatetxea Blogger</h1>
<?php
  if($_SESSION['loggedin']){
    if($_SESSION['admin'] == 1){
      //ADMINISTRADOR *********BOTONES DE ADMIN*********     
?>    
<h4 id="crear" ><a href="Registrarse.php">Erabiltzaileak sortu</a> edo <a href="SarrerakInsert.php">Sarrerak sortu</a></h4> 
  
<?php   
    }else {
?>
      <h4 id="regis" >
<?php
     echo $_SESSION['username'];
?>
      </h4> 
<?php
    }
  } else {
?>
      <h4 id="regis" ><a href="Registrarse.php">Sign in</a> or <a href="Login.php">Log in</a></h4> 
<?php
  }
?>
      <!--<nav>

      </nav>-->
    </header>
   <section>
<?php 
 try  { $connect= new mysqli("localhost","root","","proyecto_T5");
            echo "conexion exitosa. <br/>"; 
            
            
            $consulta="SELECT IdSarrera,Tituloak,Gaia,Describapena FROM Sarrerak ORDER BY Bisitak ASC";
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
  ?>
 
<section id="cuerpo">
	<?php
    while ($row =mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
?>
    
      <div class="post">
 <h3>
 <?php

echo $row['Tituloak'];

  ?>
  </h3>
 <p>
<?php
 echo $row['Gaia']; 
$IdSarrera=$row['IdSarrera'];
  ?>

   
 </p>


 


<a href="marco.php?IdSarrera=<?php echo $IdSarrera; ?>">Ir</a>


</div>
     

<?php

}        
      
        ?>

 </section>


     </section> 
    


    
       
        Comida Contemporánea</p>
        <form>
          <button>ver más...</button>
        </form>
     



    <aside id="menu">
      <nav>
        <ul id="menu_1">
          <li><a onclick="des_2018();">2018</a>
            <ul class="menu_2" id="des_2018">
              <li><a href="" title="">Urtarrila</a></li>
              <li><a href="" title="">Otsaila</a></li>
              <li><a href="" title="">Martxoa</a></li>
              <li><a href="" title="">Apirila</a></li>
              <li><a href="" title="">Maiatza</a></li>
              <li><a href="" title="">Ekaina</a></li>
              <li><a href="" title="">Uztaila</a></li>
              <li><a href="" title="">Abustua</a></li>
              <li><a href="" title="">Iraila</a></li>
              <li><a href="" title="">Urria</a></li>
              <li><a href="" title="">Azaroa</a></li>
              <li><a href="" title="">Abendua</a></li>
            </ul>
          </li>
          <li><a onclick="des_2017();">2017</a>
            <ul class="menu_2" id="des_2017">
              <li><a href="" title="">Urtarrila</a></li>
              <li><a href="" title="">Otsaila</a></li>
              <li><a href="" title="">Martxoa</a></li>
              <li><a href="" title="">Apirila</a></li>
              <li><a href="" title="">Maiatza</a></li>
              <li><a href="" title="">Ekaina</a></li>
              <li><a href="" title="">Uztaila</a></li>
              <li><a href="" title="">Abustua</a></li>
              <li><a href="" title="">Iraila</a></li>
              <li><a href="" title="">Urria</a></li>
              <li><a href="" title="">Azaroa</a></li>
              <li><a href="" title="">Abendua</a></li>
            </ul>
          </li>
          <li><a onclick="des_2016();">2016</a>
            <ul class="menu_2" id="des_2016">
              <li><a href="" title="">Urtarrila</a></li>
              <li><a href="" title="">Otsaila</a></li>
              <li><a href="" title="">Martxoa</a></li>
              <li><a href="" title="">Apirila</a></li>
              <li><a href="" title="">Maiatza</a></li>
              <li><a href="" title="">Ekaina</a></li>
              <li><a href="" title="">Uztaila</a></li>
              <li><a href="" title="">Abustua</a></li>
              <li><a href="" title="">Iraila</a></li>
              <li><a href="" title="">Urria</a></li>
              <li><a href="" title="">Azaroa</a></li>
              <li><a href="" title="">Abendua</a></li>
            </ul>
          </li>
          <li><a onclick="des_2015();">2015</a>
            <ul class="menu_2" id="des_2015">
              <li><a href="" title="">Urtarrila</a></li>
              <li><a href="" title="">Otsaila</a></li>
              <li><a href="" title="">Martxoa</a></li>
              <li><a href="" title="">Apirila</a></li>
              <li><a href="" title="">Maiatza</a></li>
              <li><a href="" title="">Ekaina</a></li>
              <li><a href="" title="">Uztaila</a></li>
              <li><a href="" title="">Abustua</a></li>
              <li><a href="" title="">Iraila</a></li>
              <li><a href="" title="">Urria</a></li>
              <li><a href="" title="">Azaroa</a></li>
              <li><a href="" title="">Abendua</a></li>
            </ul>
          </li>
          <li><a onclick="des_2014();">2014</a>
            <ul class="menu_2" id="des_2014">
              <li><a href="" title="">Urtarrila</a></li>
              <li><a href="" title="">Otsaila</a></li>
              <li><a href="" title="">Martxoa</a></li>
              <li><a href="" title="">Apirila</a></li>
              <li><a href="" title="">Maiatza</a></li>
              <li><a href="" title="">Ekaina</a></li>
              <li><a href="" title="">Uztaila</a></li>
              <li><a href="" title="">Abustua</a></li>
              <li><a href="" title="">Iraila</a></li>
              <li><a href="" title="">Urria</a></li>
              <li><a href="" title="">Azaroa</a></li>
              <li><a href="" title="">Abendua</a></li>
            </ul>
          </li>
        </ul>
      </nav>

    </aside>
    <footer>
      
    </footer>
  </body>
</html>