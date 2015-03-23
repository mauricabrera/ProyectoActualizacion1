<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mauri C.">
    <link rel="icon" href="images/favicon.ico">

    <title>Registrar Usuario</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilo.css" rel="stylesheet">
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
            <li class="active"><a>Regístrate</a></li>
          </ul>
            
            <form class="navbar-form navbar-right" id="loginform">
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="password" id="password" placeholder="Password">
                    </div>
                    <button type="button" id="login" class="btn btn-default">Log In</button>
                </form>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	</head>

    <!-- Begin page content -->
    <div class="container">
     
       <form id="formulario">
          <div class="form-group">
            <label for="usuario" class="control-label">Usuario:</label>
            <input type="text" class="form-control" id="usuario" placeholder="Nombre de Usuario" name="usuario" required>
          </div>
          <div class="form-group">
            <label for="password1" class="control-label">Password1:</label>
            <input type="password" class="form-control" id="password1" placeholder="Password" name="password1" required>
          </div>
          <div class="form-group">
            <label for="password2" class="control-label">Password2:</label>
            <input type="password" class="form-control" id="password2" placeholder="Repetir Password" name="password2" required></input>
          </div>
          <div class="form-group">
            <label for="nombres" class="control-label">Nombres:</label>
            <input type="text" class="form-control" id="nombres" placeholder="Nombres" name="nombres" required>
          </div>
          <div class="form-group">
            <label for="apellidos" class="control-label">Apellidos:</label>
            <input type="text" class="form-control" id="apellidos" placeholder="Apellidos" name="apellidos" required>
          </div>
          <div class="form-group">
            <label for="telefono" class="control-label">Telefono:</label>
            <input type="number" class="form-control" id="telefono" placeholder="Telefono/cel" name="telefono" required>
          </div>
          <div class="form-group">
            <label for="email" class="control-label">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="ejemplo@dominio.com" name="email" required>
          </div>
            <button type="reset" class="btn btn-default">Limpiar</button>
            <button type="button" class="btn btn-primary" id="Registrar"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Registrar</button> 
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
          
          $( "#login" ).click(function() {
              var dataString = $('#loginform').serialize();    
              var username = $("#username").val();
              var password = $("#password").val();
                
               if(username == ''){
                    alert("¡Ingrese un username!!")
                  } else if (password == ''){
                    alert("¡Ingrese un password!!")
                  } else {
                      console.log(dataString)
                    $.ajax({
                        type: "GET",
                        url: "api/login/"+ username + "/" + password,
                        success: function(data) {
                            console.log(data)
                            if(data == true){
                            window.location.replace("listarAnuncios.php");
                               // window.location.href = "AdminAnuncios.php";
                            }
                            if (data == 1){
                             window.location.replace("AdminAnuncios.php");
                            }
                            if(data == false){
                            alert("Credenciales Incorrectas!")
                            }
//                            location.reload(true)
                        },
                        error: function(data){
                            console.log(data)
                        }

                    })
                    
                    }
                      
            })
          

          $( "#Registrar" ).click(function() {
              var dataString = $('#formulario').serialize();    
              var password1 = $("#password1").val();
              var password2 = $("#password2").val();
                
               if(password1 == ''){
                    alert("¡Ingrese un password!!")
                  } else if (password2 == ''){
                    alert("¡Ingrese un password2!!")
                  } else if (password1 == password2) {
              
                      alert(dataString)
                    $.ajax({
                        type: "POST",
                        url: "api/RegistrarUsuario",
                        data: dataString,
                        success: function(data) {
                            console.log(data)
                            alert("¡Usuario Registrado! Ahora puedes iniciar Sesión :)")
                           // location.reload(true)
                        },
                        error: function(data){
                            console.log(data)
                             alert("mensaje error")
                        }

                    })
                    
                    }
                      else {
                          alert("¡Los passwords no coinciden!!!!")
                      }
            })
          
      </script>

      
      
      
  </body>
</html>