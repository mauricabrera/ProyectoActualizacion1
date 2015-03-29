<?php
require_once('libs/Mysql.php');
$mysql = new Mysql();

session_start();

function redirect($url, $statusCode = 303)
{
   header('Location: ' . $url, true, $statusCode);
   die();
}

if (isset($_SESSION['id_usuario']) && isset($_SESSION['usuario']) && isset($_SESSION['password']) && isset($_GET["id_clasificado"])){
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
    <link href="css/crearAnuncio.css" rel="stylesheet">

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
            <li><a href="crearAnuncio.php">Crear Anuncio</a></li>
            <li><a href="cambiarpassword.php">Modificar Password</a></li>
              <li><a href="misAnuncios.php">Mis Anuncios</a></li>
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
                $("#eventsmessage").html($("#eventsmessage").html()+"<br/>Submitting:"+JSON.stringify(files));
            },
        onSuccess:function(files,data,xhr)
            {
                $("#eventsmessage").html($("#eventsmessage").html()+"<br/>Success for: "+JSON.stringify(data));
                resultdata.push(data);

            },
        afterUploadAll:function(obj)
            {
                $("#eventsmessage").html($("#eventsmessage").html()+"<br/>All files are uploaded"+obj);
                
                console.log(obj);
                console.log(obj.getResponses());
                
                var respond = obj.getResponses();
                
                for (var i = 0; i < respond.length; i++){
                    $("#eventsmessage").html($("#eventsmessage").html()+"<br/>All files are uploaded and file name"+i+respond[i]);
                    console.log("<br/>All files are uploaded and file name"+i+respond[i]);
                }
                
                for (var i = 0; i < resultdata.length; i++){
                    $("#eventsmessage").html($("#eventsmessage").html()+"<br/>All files are uploaded and file name"+i+resultdata[i]);
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
                            alert("¡Clasificado insertado!");
                            window.location.reload();
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

elseif(isset($_GET["id_clasificado"])) {
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

    <title>Comentarios</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

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
            <li><a href="crearAnuncio.php">Crear Anuncio</a></li>
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
        <div class="row well">
            <h1 class="text-left" id="titulo"></h1><br>
            <div class="col-md-5" id="imagen">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                      <!-- Indicators -->
                      <ol class="carousel-indicators" id="indicators">
                      </ol>

                      <!-- Wrapper for slides -->
                      <div class="carousel-inner" role="listbox" id="carouselimg">
                      </div>

                      <!-- Controls -->
                      <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>
            </div>
            <div class="col-md-7" id="content">
                <h2 id="texto"></h2>
                <h5 id="id_usuario"></h5>
                <h5 id="id_tipoclasificado"></h5>
                <h6 id="created_at"></h6>
                <h6 id="updated_at"></h6>
            </div>
        </div>
	  </div>
      
      <div class="container" id="comentarios">
          <h1>Comentarios</h1> 
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal" data-id="<?php echo $_GET["id_clasificado"]; ?>"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Añadir Comentario</button><br><br>
        </div>
	  </div>
	 

    <footer class="footer">
      <div class="container">
        <p class="text-muted">Competencia Actualizacion I 2015</p>
      </div>
    </footer>

    
<!-- Modal-->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Nuevo Comentario</h4>
      </div>
      <div class="modal-body">
        <form id="formulario">
            <input type="hidden" class="form-control" id="id_clasificado" name="id_clasificado">
            <div class="form-group">
            <label for="nombre" class="control-label">Nombre:</label>
            <input class="form-control" id="nombre" name="nombre" required>
            </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Comentario:</label>
            <textarea class="form-control" id="message-text" name="texto" required></textarea>
          </div>
           
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="comentar"><span class="glyphicon glyphicon-share" aria-hidden="true"></span> Comentar</button>
          </form>
      </div>
    </div>
  </div>
</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->
   

	<script src="js/jquery-1.11.2.min.js"> </script> 
	<script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
      <script>
          function GetQueryStringParams(sParam)
        {
            var sPageURL = window.location.search.substring(1);
            var sURLVariables = sPageURL.split('&');
            for (var i = 0; i < sURLVariables.length; i++)
            {
                var sParameterName = sURLVariables[i].split('=');
                if (sParameterName[0] == sParam)
                {
                    return sParameterName[1];
                }
         }
        }
      </script>
	<script>
        
$(document).ready(function()
{       
                
    
                $.ajax({
                        type: "GET",
                        url: "api/clasificado/" + GetQueryStringParams('id_clasificado'),
                        success: function(data) {
                            console.log(data);

                            $.each(data, function(index, clasificado) {
//                                    $("#imagen").append ('<img height="100" width="100" src="php/uploads/' + clasificado.imagen1 + '"></li>' );
                                    console.log(clasificado);
                                
                                    $("#titulo").text(clasificado.titulo);
                                    $("#texto").text(clasificado.texto);
                                    $("#id_usuario").text("ID Usuario: " + clasificado.id_usuario);
                                    $("#id_tipoclasificado").text("ID TipoClasificado: " + clasificado.id_tipoclasificado);
                                    $("#created_at").text("Fecha de Creación: " + clasificado.created_at);
                                    $("#updated_at").text("Fecha de Actualización: " + clasificado.updated_at);
                                
                                    if(clasificado.imagen1 != "urlimagen1"){
                                        console.log("entro con " + clasificado.imagen1);
                                        $("#indicators").append('<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>'); 
                                        $("#carouselimg").append(' <div class="item active"><img width="100%" height="300px" src="php/uploads/' + clasificado.imagen1 + '"></div>');
                                    }
                                    if(clasificado.imagen2 != "urlimagen2"){
                                        console.log("entro con " + clasificado.imagen2);
                                        $("#indicators").append('<li data-target="#carousel-example-generic" data-slide-to="1"></li>');
                                        $("#carouselimg").append(' <div class="item"><img width="100%" height="300px" src="php/uploads/' + clasificado.imagen2 + '"></div>');
                                    }
                                    if(clasificado.imagen3 != "urlimagen3"){
                                        console.log("entro con " + clasificado.imagen3);
                                        $("#indicators").append('<li data-target="#carousel-example-generic" data-slide-to="2"></li>');
                                        $("#carouselimg").append(' <div class="item"><img width="100%" height="300px" src="php/uploads/' + clasificado.imagen3 + '"></div>');
                                    }
                                    if(clasificado.imagen4 != "urlimagen4"){
                                        console.log("entro con " + clasificado.imagen4);
                                        $("#indicators").append('<li data-target="#carousel-example-generic" data-slide-to="3"></li>');
                                        $("#carouselimg").append(' <div class="item"><img  width="100%" height="300px" src="php/uploads/' + clasificado.imagen4 + '"></div>');
                                    }
                                    if(clasificado.imagen5 != "urlimagen5"){
                                        $("#indicators").append('<li data-target="#carousel-example-generic" data-slide-to="4"></li>'); 
                                        $("#carouselimg").append(' <div class="item"><img width="100%" height="300px" src="php/uploads/' + clasificado.imagen5 + '"></div>');
                                    }
                                    if(clasificado.imagen6 != "urlimagen6"){
                                        $("#indicators").append('<li data-target="#carousel-example-generic" data-slide-to="5"></li>'); 
                                        $("#carouselimg").append(' <div class="item"><img width="100%" height="300px" src="php/uploads/' + clasificado.imagen6 + '"></div>');
                                    }
                                });
                            
                        },
                        error: function(data){
                            console.log(data);
                        }
                    });
    
    
                $.ajax({
                        type: "GET",
                        url: "api/comentarios/" + GetQueryStringParams('id_clasificado'),
                        success: function(data) {
                            console.log(data);
                            
                            if(data == false){
                                $("#comentarios").append('<h2 class="text-center">Este Anuncio no tiene comentarios, Sé el primero!.</h2>');
                            
                            }
                            
                            $.each(data, function(index, comentario) {
//                                    $("#imagen").append ('<img height="100" width="100" src="php/uploads/' + clasificado.imagen1 + '"></li>' );
                                    console.log(comentario);
                                
                                $("#comentarios").append('<div class="well"><h2 class="text-center">'+ comentario.texto +'</h2><h3 class="text-center">'+ comentario.nombre +'</h3><h5 class="text-left">Fecha de Creación: '+ comentario.created_at +'</h5><h5 class="text-left">Fecha de Actualización: '+ comentario.created_at +'</h5></div>');
                                   
                                });
                            
                        },
                        error: function(data){
                            console.log(data);
                        }
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
          
          $('#modal').on('show.bs.modal', function (event) {
              var button = $(event.relatedTarget) 
              var id = button.data('id')
              $("#id_clasificado").val(id)
            })
          
          $('#formulario').on('submit', function(e) { //use on if jQuery 1.7+
            e.preventDefault();  //prevent form from submitting
                var data = $('#formulario').serialize()
                var id_clasificado = $("#id_clasificado").val()
                //alert(data)
                console.log(data)
                
                $.ajax({
                        type: "POST",
                        url: "api/comentar/" + id_clasificado,
                        data: data,
                        success: function(data) {
                            //console.log(data)
                            if(data == true){
                                alert("Comentario Añadido! :)")
                            location.reload(true)
                            }
                            if(data == false){
                            alert("Ups, Algo no salió bien, intenta de nuevo")
                            }
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
} else {
    echo '<script>window.location.replace("listarAnuncios.php");</script>';
 
}
?>