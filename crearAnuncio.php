<?php
require_once('libs/Mysql.php');
$mysql = new Mysql();

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
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.ico">

    <title>Crear Anuncio</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/estilo.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
       <script src="js/jquery-1.11.2.min.js"> </script> 
      <link href="css/uploadfile.css" rel="stylesheet">
	<script src="js/jquery.uploadfile.js"></script>

  </head>

  <body>

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
            <li class="active"><a>Crear Anuncio</a></li>
            <li><a href="cambiarpassword.php">Modificar Password</a></li>
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
        
      <form class="form-signin"  id="formulario" method="post">
        <h2 class="form-signin-heading" style="text-align : center;">Crear Anuncio</h2>
        <label for="inputTitulo" class="">Titulo de Anuncio</label>
        <input type="text" id="inputTitulo" class="form-control" placeholder="Título" required autofocus name="titulo" ></input>
        <label for="inputTexto" class="">Descripción</label>
          <textarea type="text" id="inputTexto" class="form-control" placeholder="Descripcion" required autofocus name="texto" ></textarea>
       
              <label for="tipoclasificado" class="">Seleccione categoria:</label>
              <select name="tipoclasificado" id="tipoclasificado">
                     <?php
                        $query = "SELECT * FROM tipoclasificado order by nombre asc";
                        $res = $mysql->query($query);
                        foreach ($res as $row){
                             echo "<option value=".$row["tipoclasificado"]["id_tipoclasificado"].">".$row["tipoclasificado"]["nombre"]."</option>";
                            }				
                    ?>
               </select>
          
        <div id="fileuploader">Escojer imagenes</div>
                <label id="eventsmessage"></label>
        
        
        <button class="btn btn-lg btn-primary"  type="submit">Publicar</button>
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
   

	

	<script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    <script src="http://localhost:3000/socket.io/socket.io.js"></script>
	<script>
$(document).ready(function()
{       
    var resultdata = [];
    
	var uploadObj = $("#fileuploader").uploadFile({
		autoSubmit:false,
		url: "php/upload.php",
        maxFileCount: 6,
		multiple: true,
		cancelStr:"Eliminar",
		doneStr:"Subido",
		allowedTypes: "jpg,jpeg,png,gif",
		showPreview: true,
		previewWidth: "50px",
		previewHeight: "50px",
		fileName:"myfile",
        onSubmit:function(files)
            {
                //$("#eventsmessage").html($("#eventsmessage").html()+"<br/>Submitting:"+JSON.stringify(files));
            },
        onSuccess:function(files,data,xhr)
            {
               // $("#eventsmessage").html($("#eventsmessage").html()+"<br/>Success for: "+JSON.stringify(data));
                resultdata.push(data);

            },
        afterUploadAll:function(obj)
            {
               // $("#eventsmessage").html($("#eventsmessage").html()+"<br/>All files are uploaded"+obj);
                
                console.log(obj);
                console.log(obj.getResponses());
                
                var respond = obj.getResponses();
                
                for (var i = 0; i < respond.length; i++){
                   // $("#eventsmessage").html($("#eventsmessage").html()+"<br/>All files are uploaded and file name"+i+respond[i]);
                    console.log("<br/>All files are uploaded and file name"+i+respond[i]);
                }
                
                for (var i = 0; i < resultdata.length; i++){
                   // $("#eventsmessage").html($("#eventsmessage").html()+"<br/>All files are uploaded and file name"+i+resultdata[i]);
                    console.log("<br/>All files are uploaded and file name"+i+resultdata[i]);
                }
                
                   var dataString = $('#formulario').serialize();

                    console.log('Datos serializados: '+dataString);
                    $.ajax({
                        type: "POST",
                        url: "api/introclasificado",
                        data: {formulario: JSON.stringify(dataString), imagenes : JSON.stringify(respond)},
                        success: function(data) {
                           
                            console.log(data);
                            var socket = io.connect('http://localhost:3000');
                            $.ajax({
                                type: "GET",
                                url: "api/clasificado/" + data,
                                success: function(data) {
                                    console.log(data);

                                    $.each(data, function(index, clasificado) {
        //                                    $("#imagen").append ('<img height="100" width="100" src="php/uploads/' + clasificado.imagen1 + '"></li>' );
                                            console.log(clasificado)
                                            socket.emit('new note', clasificado)

                                        });

                                },
                                error: function(data){
                                    console.log(data);
                                }
                            });
                            
                           // window.location.replace("listarAnuncios.php");
                            alert("¡Clasificado insertado!");
                            
                        },
                        error: function(data){
                            
                            console.log(data);
                        }

                    });

            },
        onError: function(files,status,errMsg)
            {
                $("#eventsmessage").html($("#eventsmessage").html()+"<br/>Error for: "+JSON.stringify(files));
            }
	   });
    
    $('#formulario').on('submit', function(e) { //use on if jQuery 1.7+
        e.preventDefault();  //prevent form from submitting
        var data = $('#formulario').serialize();
        //console.log(data); //use the console for debugging, F12 in Chrome, not alerts
        
        console.log(data);    
        
      //  uploadObj.update({formData: $('#formulario').serialize()});
        
                uploadObj.startUpload();
        
//        console.log(uploadObj.getResponses());

        
        
        
    });
	
	
});

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
                            if (data == 1){
                            window.location.replace("AdminAnuncios.php");
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
//echo "nay";
//      redirect("listaranuncios.php", $statusCode = 303);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.ico">

    <title>Crear Anuncio</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/estilo.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
       <script src="js/jquery-1.11.2.min.js"> </script> 
      <link href="css/uploadfile.css" rel="stylesheet">
	<script src="js/jquery.uploadfile.js"></script>

  </head>

  <body>

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
            <li class="active"><a>Crear Anuncio</a></li>
            <li><a href="formularioRegistro.php">Regístrate</a></li>
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
        
      <form class="form-signin"  id="formulario" method="post">
        <h2 class="form-signin-heading" style="text-align : center;">Crear Anuncio</h2>
        <label for="inputTitulo" class="">Titulo de Anuncio</label>
        <input type="text" id="inputTitulo" class="form-control" placeholder="Título" required autofocus name="titulo" ></input>
        <label for="inputTexto" class="">Descripción</label>
          <textarea type="text" id="inputTexto" class="form-control" placeholder="Descripcion" required autofocus name="texto" ></textarea>
       
              <label for="tipoclasificado" class="">Seleccione categoria:</label>
              <select name="tipoclasificado" id="tipoclasificado">
                     <?php
                        $query = "SELECT * FROM tipoclasificado order by nombre asc";
                        $res = $mysql->query($query);
                        foreach ($res as $row){
                             echo "<option value=".$row["tipoclasificado"]["id_tipoclasificado"].">".$row["tipoclasificado"]["nombre"]."</option>";
                            }				
                    ?>
               </select>
          
        <div id="fileuploader">Escojer imagenes</div>
                <label id="eventsmessage"></label>
        
        
        <button class="btn btn-lg btn-primary"  type="submit">Submit</button>
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
   

	

	<script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
        <script src="http://localhost:3000/socket.io/socket.io.js"></script>

	<script>
$(document).ready(function()
{       
    var resultdata = [];
    
	var uploadObj = $("#fileuploader").uploadFile({
		autoSubmit:false,
		url: "php/upload.php",
        maxFileCount: 6,
		multiple: true,
		cancelStr:"Eliminar",
		doneStr:"Subido",
		allowedTypes: "jpg,jpeg,png,gif",
		showPreview: true,
		previewWidth: "50px",
		previewHeight: "50px",
		fileName:"myfile",
        onSubmit:function(files)
            {
                //$("#eventsmessage").html($("#eventsmessage").html()+"<br/>Submitting:"+JSON.stringify(files));
            },
        onSuccess:function(files,data,xhr)
            {
               // $("#eventsmessage").html($("#eventsmessage").html()+"<br/>Success for: "+JSON.stringify(data));
                resultdata.push(data);

            },
        afterUploadAll:function(obj)
            {
              //  $("#eventsmessage").html($("#eventsmessage").html()+"<br/>All files are uploaded"+obj);
                
                console.log(obj);
                console.log(obj.getResponses());
                
                var respond = obj.getResponses();
                
                for (var i = 0; i < respond.length; i++){
                  //  $("#eventsmessage").html($("#eventsmessage").html()+"<br/>All files are uploaded and file name"+i+respond[i]);
                    console.log("<br/>All files are uploaded and file name"+i+respond[i]);
                }
                
                for (var i = 0; i < resultdata.length; i++){
                  //  $("#eventsmessage").html($("#eventsmessage").html()+"<br/>All files are uploaded and file name"+i+resultdata[i]);
                    console.log("<br/>All files are uploaded and file name"+i+resultdata[i]);
                }
                
                   var dataString = $('#formulario').serialize();

                    console.log('Datos serializados: '+dataString);
                    $.ajax({
                        type: "POST",
                        url: "api/introclasificado",
                        data: {formulario: JSON.stringify(dataString), imagenes : JSON.stringify(respond)},
                        success: function(data) {
                           
                            console.log(data);
                            var socket = io.connect('http://localhost:3000');
                            $.ajax({
                                type: "GET",
                                url: "api/clasificado/" + data,
                                success: function(data) {
                                    console.log(data);

                                    $.each(data, function(index, clasificado) {
        //                                    $("#imagen").append ('<img height="100" width="100" src="php/uploads/' + clasificado.imagen1 + '"></li>' );
                                            console.log(clasificado)
                                            socket.emit('new note', clasificado)

                                        });

                                },
                                error: function(data){
                                    console.log(data);
                                }
                            });
                           
                            //window.location.replace("listarAnuncios.php");
                            alert("¡Clasificado insertado!");
                           // window.location.href = "listarAnuncios.php";
                            
                        },
                        error: function(data){
                            
                            console.log(data);
                        }

                    });


            },
        onError: function(files,status,errMsg)
            {
                $("#eventsmessage").html($("#eventsmessage").html()+"<br/>Error for: "+JSON.stringify(files));
            }
	   });
    
    $('#formulario').on('submit', function(e) { //use on if jQuery 1.7+
        e.preventDefault();  //prevent form from submitting
        var data = $('#formulario').serialize();
        //console.log(data); //use the console for debugging, F12 in Chrome, not alerts
        
        console.log(data);    
        
      //  uploadObj.update({formData: $('#formulario').serialize()});
        
                uploadObj.startUpload();
        
//        console.log(uploadObj.getResponses());

        
        
        
    });
	
	
});

</script>
    
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
          
      </script>
  </body>
</html>
<?php
}
?>