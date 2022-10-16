<?php
session_start();
require 'funciones.php';

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../tienda-online/assets/imagenes/LBS (1) verde.png" type="image/png">
    <title>Lectores Books Shop</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/estilos.css">
  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top" style="background-color: #2F5766;">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Lectores Books Shop</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav pull-right">
            <li>
            <a href="carrito.php" class="btn">CARRITO <span class="badge"><?php print cantidadLibros(); ?></span></a>
             </li> 
            <li>
            <a href="../tienda-online/panel/index.php" class="btn">ADMINISTRACION</a>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container" id="main">
        <div class="row">
            <?php
              require 'vendor/autoload.php';
              $libro = new Lectores\Libro;
              $info_libros = $libro->mostrar();
              $cantidad = count($info_libros);
              if($cantidad > 0){
                for($x =0; $x < $cantidad; $x++){
                  $item = $info_libros[$x];
            ?>
              <div class="col-md-2">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h1 class="text-center titulo-libro"><?php print $item['titulo'] ?></h1>  
                    </div>
                    <div class="panel-body">
                      <?php
                          $foto = 'upload/'.$item['foto'];
                          if(file_exists($foto)){
                        ?>
                          <img src="<?php print $foto; ?>" class="img-responsive">
                      <?php }else{?>
                        <img src="assets/imagenes/not-found.jpg" class="img-responsive">
                        
                      <?php }?>
                    </div>
                    
                    <div class="panel-price">
                    <h4 class="text-center titulo-precio"> $ <?php print $item['precio'] ?></h4> 
                    
                    </div>

                    <div class="panel-footer">
                        <a href="carrito.php?id=<?php print $item['id'] ?>" class="btn btn-success btn-block" style="background-color: #2F5766;">
                          <span class="glyphicon glyphicon-shopping-cart" style="background-color: #2F5766;"></span> Comprar
                        </a>
                    </div>
                  </div>
              
              
              </div>
          <?php
                }
            }else{?>
              <h4>NO HAY REGISTROS</h4>

          <?php }?>




        </div>
      

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

  </body>
</html>
