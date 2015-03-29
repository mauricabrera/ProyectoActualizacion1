<?php
require_once('libs/Mysql.php');
$mysql = new Mysql();
session_start();

function redirect($url, $statusCode = 303)
{
   header('Location: ' . $url, true, $statusCode);
   die();
}

if (isset($_SESSION['id_usuario']) && isset($_SESSION['usuario']) && isset($_SESSION['password']) && ($_SESSION['admin'] == 1)){
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

    <title>Usuarios | Administrador</title>

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

  <body style="padding-top: 10px;">

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
            <li><a href="AdminAnuncios.php">Anuncios</a></li>
            <li><a href="AdminComentarios.php">Comentarios</a></li>
            <li class="active"><a>Usuarios</a></li>
          </ul>
            <ul class="nav navbar-nav navbar-right">
            <li class="active"><a>Administrador <?php if (isset($_SESSION['id_usuario'])){
echo $_SESSION['usuario']."  ";
}
else { echo "nay";
     }?><button class="btn btn-danger btn-xs" id="logout" type="button">Cerrar Sesión</button></a></li>
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
         <div class="alert alert-success" role="alert" style="display: none;" id="alertSuccess">¡Usuario Actualizado!</div>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createModal"><span class="glyphicon glyphicon-check" aria-hidden="true"></span> Crear Usuario</button>
        <br><br>
        <div class="table-responsive">
            <table class="table" id="table">
                 <thead>
                    <tr>
                        <th class="text-center">ID Usuario</th>
                        <th class="text-center">NombreUsuario</th>
                        <th class="text-center">Password</th>
                        <th class="text-center">Nombres</th>
                        <th class="text-center">Apellidos</th>
                        <th class="text-center">Telefono</th>
                        <th class="text-center">E-Mail</th>
                        <th class="text-center">EsAdmin</th>
                        <th class="text-center">Fecha Creado</th>
                        <th class="text-center">Fecha Actualizado</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                
                 <?php
                        $query = "SELECT * FROM usuario order by id_usuario desc";
                        $res = $mysql->query($query);
                        
                        
                            foreach ($res as $row){
                                echo "<tr>";
                                echo "<td>".$row["usuario"]["id_usuario"]."</td>";
                                echo "<td>".$row["usuario"]["usuario"]."</td>";
                                echo "<td>".$row["usuario"]["password"]."</td>";
                                echo "<td>".$row["usuario"]["nombres"]."</td>";
                                echo "<td>".$row["usuario"]["apellidos"]."</td>";
                                echo "<td>".$row["usuario"]["telefono"]."</td>";
                                echo "<td>".$row["usuario"]["email"]."</td>";
                                echo "<td>".$row["usuario"]["admin"]."</td>";
                                echo "<td>".$row["usuario"]["created_at"]."</td>";
                                echo "<td>".$row["usuario"]["updated_at"]."</td>";
                                echo '<td class="text-center"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"  data-id="'.$row["usuario"]["id_usuario"].'" data-nombres="'.$row["usuario"]["nombres"].'" data-apellidos="'.$row["usuario"]["apellidos"].'" data-usuario="'.$row["usuario"]["usuario"].'" data-password="'.$row["usuario"]["password"].'" data-telefono="'.$row["usuario"]["telefono"].'" data-email="'.$row["usuario"]["email"].'" data-admin="'.$row["usuario"]["admin"].'" ><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Actualizar</button><br><br><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="'.$row["usuario"]["id_usuario"].'"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar</button></td>'; 
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
        <h4 class="modal-title" id="exampleModalLabel">Actualizar Usuario con ID:</h4>
      </div>
      <div class="modal-body">
        <form id="formularioact">
            <input type="hidden" class="form-control" id="id_usuario" name="id_usuario">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Nombres:</label>
            <input type="text" class="form-control" id="recipient-name" name="nombres">
          </div>
          <div class="form-group">
            <label for="recipient-apellidos" class="control-label">Apellidos:</label>
            <input type="text" class="form-control" id="recipient-apellidos" name="apellidos">
          </div>
          <div class="form-group">
            <label for="recipient-usuario" class="control-label">Nombre de Usuario:</label>
            <input type="text" class="form-control" id="recipient-usuario" name="usuario">
          </div>
            <div class="form-group">
            <label for="recipient-password" class="control-label">Password:</label>
            <input type="text" class="form-control" id="recipient-password" name="password">
          </div>
            <div class="form-group">
            <label for="recipient-telefono" class="control-label">Teléfono:</label>
            <input type="text" class="form-control" id="recipient-telefono" name="telefono">
          </div>
            <div class="form-group">
            <label for="recipient-email" class="control-label">E-Mail:</label>
            <input type="text" class="form-control" id="recipient-email" name="email">
          </div>
            <div class="form-group">
            <label for="recipient-admin" class="control-label">Es Admin (0 no, 1 si):</label>
            <input type="text" class="form-control" id="recipient-admin" name="admin">
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
        <h4 class="modal-title" id="exampleModalLabel">Actualizar Usuario con ID:</h4>
          <form id="formularioEliminar">
            <input type="hidden" class="form-control" id="id_usuarioEliminar" name="id_usuario">
          </form>
          
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-danger" id="eliminar"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar</button>
      </div>
    </div>
  </div>
</div>
        
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <form id="formulariocreate">
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
           
        </form>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" id="registrar"><span class="glyphicon glyphicon-check" aria-hidden="true"></span> Registrar</button> 
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
      
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
	

      <script>
          
          function reloadpage(){
            location.reload(true);
          }
          
          $('#exampleModal').on('show.bs.modal', function (event) {
              var button = $(event.relatedTarget) // Button that triggered the modal
              var nombres = button.data('nombres') // Extract info from data-* attributes
              var apellidos = button.data('apellidos')
              var usuario = button.data('usuario')
              var password = button.data('password')
              var telefono = button.data('telefono')
              var email = button.data('email')
              var admin = button.data('admin')
              var id = button.data('id')
              // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
              // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
              var modal = $(this)
              modal.find('.modal-title').text('Actualizar Usuario con ID: ' + id)
              $("#id_usuario").val(id)
              $("#recipient-name").val(nombres)
              $("#recipient-apellidos").val(apellidos)
              $("#recipient-usuario").val(usuario)
              $("#recipient-password").val(password)
              $("#recipient-telefono").val(telefono)
              $("#recipient-email").val(email)
              $("#recipient-admin").val(admin)
            })
          
          $( "#actualizar" ).click(function() {
              var dataString = $('#formularioact').serialize()  
              //alert(dataString)
                    $.ajax({
                        type: "POST",
                        url: "api/actualizarusuario",
                        data: dataString,
                        success: function(data) {
                            console.log(data)
                            $("#alertSuccess").show(0).delay(2000).fadeIn(reloadpage).hide(0);
                            $("#exampleModal").modal('hide');
//                            alert("¡Usuario Actualizado!")
                           // location.reload(true)
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
              modal.find('.modal-title').text('¿Está seguro de eliminar Usuario con ID: ' + id + '?')
              $("#id_usuarioEliminar").val(id)
            
            })
          
          $( "#eliminar" ).click(function() {
              var dataString = $('#formularioEliminar').serialize()  
              console.log(dataString)
                    $.ajax({
                        type: "POST",
                        url: "api/eliminarusuario",
                        data: dataString,
                        success: function(data) {
                            alert("¡Usuario Eliminado!")
                            location.reload(true)
                        },
                        error: function(data){
                            console.log(data)
                        }

                    })
            })
          
          $( "#registrar" ).click(function() {
              var dataString = $('#formulariocreate').serialize();    
              var password1 = $("#password1").val();
              var password2 = $("#password2").val();
                
              if (($("#usuario").val() == '') || ($("#nombres").val() == '') || ($("#apellidos").val() == '') || ($("#telefono").val() == '') || ($("#email").val() == '')){
                    alert("¡Llene todos los campos!")
                  } else if (password1 == ''){
                    alert("¡Ingrese un password!!")
                  } else if (password2 == ''){
                    alert("¡Ingrese un password2!!")
                  } else if (password1 == password2) {
              
                      //alert(dataString)
                    $.ajax({
                        type: "POST",
                        url: "api/RegistrarUsuario",
                        data: dataString,
                        success: function(data) {
                            console.log(data)
                            alert("¡Usuario Registrado! Ahora puedes iniciar Sesión :)")
                            location.reload(true)
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
    redirect("listaranuncios.php", $statusCode = 303);
}
?>