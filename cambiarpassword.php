<?php
session_start();

function redirect($url, $statusCode = 303)
{
   header('Location: ' . $url, true, $statusCode);
   die();
}

if (isset($_SESSION['id_usuario']) && isset($_SESSION['usuario']) && isset($_SESSION['password'])){
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mauri C.">
    <link rel="icon" href="images/favicon.ico">

    <title>Modificar Password</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
       
  </head>

  <body style="padding-top: 70px;">

	<head>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">FREE CLASIFICADOS</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="listarAnuncios.php">Clasificados</a></li>
            <li><a href="crearAnuncio.php">Crear Anuncio</a></li>
            <li class="active"><a>Modificar Password</a></li>
          </ul>
            
            <ul class="nav navbar-nav navbar-right">
            <li class="active"><a>¡Bienvenido! <?php if (isset($_SESSION['id_usuario'])){
                                            echo $_SESSION['usuario'];
                                            }
                                            else { echo "nay";}?>
                <button type="button" class="btn btn-danger btn-xs" id="logout">Cerrar Sesión</button></a> </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	</head>

    <!-- Begin page content -->
    <div class="container">

       <form id="formulario">
            <input type="hidden" class="form-control" id="id_usuario" name="id_usuario">
          <div class="form-group">
            <label for="password1" class="control-label">Password1:</label>
            <input type="password" class="form-control" id="password1" name="password1">
          </div>
          <div class="form-group">
            <label for="password2" class="control-label">Password2:</label>
            <input type="password" class="form-control" id="password2" name="password2"></input>
          </div>
            <button type="reset" class="btn btn-default">Limpiar</button>
            <button type="button" class="btn btn-primary" id="modificar"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Modificar</button> 
        </form>
        
      
      </div>
	 

    <footer class="footer">
      <div class="container">
        <p class="text-muted">Competencia Actualizacion I 2015</p>
      </div>
    </footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->
   

	<script src="js/jquery-1.11.2.min.js"> </script> 

	<script src="js/bootstrap.min.js"></script>
    
      
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
	

      <script>

          $( "#modificar" ).click(function() {
              var dataString = $('#formulario').serialize();    
              var password1 = $("#password1").val();
              var password2 = $("#password2").val();
                
               if(password1 == ''){
                    alert("¡Ingrese un password!!")
                  } else if (password2 == ''){
                    alert("¡Ingrese un password2!!")
                  } else if (password1 == password2) {
              
                    $.ajax({
                        type: "POST",
                        url: "api/modificarpassword",
                        data: dataString,
                        success: function(data) {
                            console.log(data)
                            alert("¡Password modificado!")
                            location.reload(true)
                        },
                        error: function(data){
                            console.log(data)
                        }

                    })
                    
                    }
                      else {
                          alert("¡Los passwords no coinciden!!!!")
                      }
            })
          
      </script>
    
    <script>
          $( "#logout" ).click(function() {
              //alert("loggiaout!");
                    $.ajax({
                        type: "GET",
                        url: "api/logout",
                        success: function(data) {
                            console.log(data)
                            if(data == true){
                            window.location.replace("listarAnuncios.php");
                               // window.location.href = "AdminAnuncios.php";
                            }
                            if(data == false){
                            alert("Algo salio mal!!")
                            }
//                            location.reload(true)
                        },
                        error: function(data){
                            console.log(data)
                        }

                    })       
            })
          
      </script>

      
      
      
  </body>
</html>
<?php
}
else {
      redirect("listaranuncios.php", $statusCode = 303);
}
?>