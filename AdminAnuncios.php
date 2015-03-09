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
    <meta name="author" content="Mauri C.">
    <link rel="icon" href="images/favicon.ico">

    <title>Anuncios | Administrador</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
<!--    <link href="css/jquery.dataTables.min.css" rel="stylesheet">-->
      <link href="css/dataTables.bootstrap.css" rel="stylesheet">
      

    <!-- Custom styles for this template -->
<!--    <link href="css/crearAnuncio.css" rel="stylesheet">-->

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
       
  </head>

  <body style="min-height: 2000px; padding-top: 70px;">

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
            <li class="active"><a href="#">Anuncios</a></li>
            <li><a href="#about">Comentarios</a></li>
            <li><a href="#contact">Usuarios</a></li>
          </ul>
            <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="./">Administrador<span class="sr-only">(current)</span></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	</head>

    <!-- Begin page content -->
    <div class="container">
<!--
        <div class="jumbotron">
        <h1 class="text-center">Navbar example</h1>
        <p>Chaaachararaaa</p>
        
        <p>
        
        </p>
        </div>
-->
        
        <div class="table-responsive">
            <table class="table" id="table">
                <thead>
                    <tr>
                        <th class="text-center">ID Clasificado</th>
                        <th class="text-center">Titulo</th>
                        <th class="text-center">Texto</th>
                        <th class="text-center">ID Tipo Clasificado</th>
                        <th class="text-center">Fecha Creado</th>
                        <th class="text-center">Fecha Actualizado</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                
                 <?php
                        $query = "SELECT * FROM clasificado order by id_clasificado asc";
                        $res = $mysql->query($query);
                        
                        
                            foreach ($res as $row){
                                echo "<tr>";
                                echo "<td>".$row["clasificado"]["id_clasificado"]."</td>";
                                echo "<td>".$row["clasificado"]["titulo"]."</td>";
                                echo "<td>".$row["clasificado"]["texto"]."</td>";
                                echo "<td>".$row["clasificado"]["id_tipoclasificado"]."</td>";
                                echo "<td>".$row["clasificado"]["created_at"]."</td>";
                                echo "<td>".$row["clasificado"]["updated_at"]."</td>";
                                echo '<td class="text-center"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="'.$row["clasificado"]["titulo"].'" data-id="'.$row["clasificado"]["id_clasificado"].'" data-texto="'.$row["clasificado"]["texto"].'"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Actualizar</button><br><br><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="'.$row["clasificado"]["id_clasificado"].'"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar</button></td>'; 
                                echo "</tr>";
                            }	
                            
                        
                    ?>
            </table>
        </div>

        
<!--        Modal Actualizar-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Actualizar Clasificado con ID:</h4>
      </div>
      <div class="modal-body">
        <form id="formulario">
            <input type="hidden" class="form-control" id="id_clasificado" name="id_clasificado">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name" name="titulo">
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Message:</label>
            <textarea class="form-control" id="message-text" name="texto"></textarea>
          </div>
            <div class="form-group">
            <label for="id_tipoclasificado"  class="control-label">Seleccione categoria:</label>
              <select name="id_tipoclasificado" id="id_tipoclasificado" class="form-control" >
                     <?php
                        $query = "SELECT * FROM tipoclasificado order by nombre asc";
                        $res = $mysql->query($query);
                        foreach ($res as $row){
                             echo "<option value=".$row["tipoclasificado"]["id_tipoclasificado"].">".$row["tipoclasificado"]["nombre"]."</option>";
                            }				
                    ?>
               </select>
                </div>
            
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="actualizar"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Actualizar</button>
      </div>
    </div>
  </div>
</div>
      
        
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Actualizar Clasificado con ID:</h4>
          <form id="formularioEliminar">
            <input type="hidden" class="form-control" id="id_clasificadoEliminar" name="id_clasificado">
          </form>
          
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-danger" id="eliminar"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar</button>
      </div>
    </div>
  </div>
</div>
      
      
      
      
      
      
      
      
      
      
      
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
      
      <script src="js/jquery.dataTables.min.js"></script>
      <script src="js/dataTables.bootstrap.js"></script>
      
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
	

      <script>
          
          $('#exampleModal').on('show.bs.modal', function (event) {
              var button = $(event.relatedTarget) // Button that triggered the modal
              var titulo = button.data('whatever') // Extract info from data-* attributes
              var texto = button.data('texto')
              var id = button.data('id')
              // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
              // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
              var modal = $(this)
              modal.find('.modal-title').text('Actualizar Clasificado con Título: ' + titulo + ' e ID: ' + id)
              $("#id_clasificado").val(id)
              $("#recipient-name").val(titulo)
              modal.find('.modal-body textarea').val(texto)
            })
          
          $( "#actualizar" ).click(function() {
              var dataString = $('#formulario').serialize()              
                    $.ajax({
                        type: "POST",
                        url: "api/actualizarclasificado",
                        data: dataString,
                        success: function(data) {
                            alert("¡Clasificado Actualizado!")
                            location.reload(true)
                        },
                        error: function(data){
                            console.log(data)
                        }

                    })
            })
          
          $('#deleteModal').on('show.bs.modal', function (event) {
              var button = $(event.relatedTarget) // Button that triggered the modal
              var id = button.data('id')
              // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
              // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
              var modal = $(this)
              modal.find('.modal-title').text('¿Está seguro de eliminar Clasificado con ID: ' + id + '?')
              $("#id_clasificadoEliminar").val(id)
            
            })
          
          $( "#eliminar" ).click(function() {
              var dataString = $('#formularioEliminar').serialize()  
              console.log(dataString)
                    $.ajax({
                        type: "POST",
                        url: "api/eliminarclasificado",
                        data: dataString,
                        success: function(data) {
                            alert("¡Clasificado Eliminado!")
                            location.reload(true)
                        },
                        error: function(data){
                            console.log(data)
                        }

                    })
            })
          
      </script>

      
      
      
  </body>
</html>
