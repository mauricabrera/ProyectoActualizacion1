<?php
require_once('libs/Mysql.php');
$mysql = new Mysql();
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
	<script type="text/javascript">
			function ver(){
			$.ajax({     
			 type: "GET",     
			 url: "responder.php", 
			 dataType: "json",  
			 success: function(data){     
			 //do your stuff with the JSON data
			 $("#content_div").append(data.ci);
			 }
			 }); 
			}
	</script>
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
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	</head>

    <!-- Begin page content -->
    <div class="container">
        
<!--
        <form action="" method="post" enctype="multipart/form-data">
<p>Pictures:
<input type="file" name="pictures[]" class="btn btn-lg btn-primary btn-block" />
<input type="file" name="pictures[]" />
<input type="file" name="pictures[]" />
<input type="submit" value="Send" />
</p>
</form>
-->
        
      <form class="form-signin"  id="formulario" method="post" action="api/introtipoclasificado">
        <h2 class="form-signin-heading" style="text-align : center;">Crear Anuncio</h2>
        <label for="inputTitulo" class="">Titulo de Anuncio</label>
        <input type="text" id="inputTitulo" class="form-control" placeholder="Título" required autofocus name="titulo">
        <label for="inputTexto" class="">Descripción</label>
          <textarea type="text" id="inputTexto" class="form-control" placeholder="Descripcion" required autofocus name="texto"></textarea>
       
          <label for="tipoclasificado" class="">Seleccione categoria:</label>
          <select name="tipoclasificado" id="tipoclasificado">
<!--        
          <select name="tipoclasificado" id="tipoclasificado">
              <option value="1">1</option>
              <option value="2">2</option>
          </select>
-->
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
            </div>
        
        <button class="btn btn-lg btn-primary btn-block" id="start" type="submit">Submit</button>
      </form>
	  
	 

    <footer class="footer">
      <div class="container">
        <p class="text-muted">Place sticky footer content here.</p>
      </div>
    </footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->
    <script src="js/jquery-1.11.2.min.js"> </script> 

	<link href="css/uploadfile.css" rel="stylesheet">
	<script src="js/jquery.uploadfile.js"></script>

	<script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
	<script>
$(document).ready(function()
{
	var uploadObj = $("#fileuploader").uploadFile({
		url:"php/upload.php",
		maxFileCount: 2,
		autoSubmit:false,
		multiple: true,
		abortStr:"Cancelado",
		cancelStr:"Cancelar",
		doneStr:"Subido",
		allowedTypes: "jpg,jpeg,png,gif",
		showPreview: true,
		previewWidth: "50px",
		previewHeight: "50px",
		returnType: "json",
		fileName:"myfile",   
        onSuccess:function(files,data,xhr)
        {
	       $("#eventsmessage").html($("#eventsmessage").html()+"<br/>Success for: "+JSON.stringify(data));
	       $("#eventsmessage").html($("#eventsmessage").html()+"<br/>Success for: "+JSON.stringify(files));
	       alert(data); 
	       console.log(files); 
	       console.log(xhr); 
	
        }
	});
	
	$("#starte").click(function()
	{
	uploadObj.startUpload();
	//alert(uploadObj.getResponses());
	});
	
	
});

</script>
  </body>
</html>
