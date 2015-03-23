<?php
require_once('libs/Mysql.php');
$mysql = new Mysql();

session_start();

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

    <title>Listar anuncios</title>

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
    <script src="http://localhost:3000/socket.io/socket.io.js"></script>
            <script>
            $(document).ready(function(){
                // Connect to our node/websockets server
                var socket = io.connect('http://localhost:3000');

                // Initial set of notes, loop through and add to list
                socket.on('initial notes', function(data){
                    var html = ''
                    for (var i = 0; i < data.length; i++){
                        // We store html as a var then add to DOM after for efficiency
                        html += '<li>' + data[i].note + '</li>'
                    }
                    $('#notes').html(html)
                })

                // New note emitted, add it to our list of current notes
                socket.on('new note', function(data){
                    $('#notes').append('<li>' + data.note + '</li>')
                })

                // New socket connected, display new count on page
                socket.on('users connected', function(data){
                    $('#usersConnected').html('Users connected: ' + data)
                })

                // Add a new (random) note, emit to server to let others know
                $('#newNote').click(function(){
                    var newNote = 'This is a random ' + (Math.floor(Math.random() * 100) + 1)  + ' note'
                    socket.emit('new note', {note: newNote})
                })
            })
            </script> 
      
    
      
      
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
            <li class="dropdown active">
              <a href="#" class="dropdown-toggle text-center" data-toggle="dropdown" role="button" aria-expanded="false">Clasificados<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu" id="liwant">
                <li class="text-center"><a href="listarAnuncios.php?page=1">TODOS</a></li>
                <li class=divider></li>
                <?php
                     $query = "SELECT * FROM tipoclasificado order by nombre asc";
                     $res = $mysql->query($query);
                     echo "";
                     foreach ($res as $row){
                      echo "<li><a href=listarAnuncios.php?type=".$row["tipoclasificado"]["id_tipoclasificado"]."&page=1".">".$row["tipoclasificado"]["nombre"]."</a></li>";
                     }
                 ?>
                <li class=divider></li>
                </ul>
            </li>
            <li><a href="crearAnuncio.php">Crear Anuncio</a></li>
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
    <div id="masthead">  
    <div class="container">
      <div class="row">
        <div class="col-md-5">
          <div class="well well-lg"> 
            <div class="row">
              <div class="col-sm-12">
                <p>Buscar por fecha:</p>
                <form id="form1">
                <label for="dateIni">Fecha: </label>
                <input type="date" id="dateIni" name="InitDate" class="form-control" />
                <input type="submit" value="Buscar" class="btn btn-default" formtarget="_self" formmethod="get"/>
                </form>
               
              </div>
            </div>
          </div>
        </div>
      </div> 
    </div>
    </div>
    <div class="container">
         <?php
         if(!isset($_GET["page"])){
             $_GET["page"] = 1;
         }
         $limit = (($_GET["page"] - 1)*5);
         if(isset($_GET["type"])){
            $where = "WHERE id_tipoclasificado=".$_GET["type"];
            if(isset($_GET["InitDate"])){
                $where = $where.", created_at >= '".$_GET["InitDate"]."'";
            }
         }
        else {
            $where = "";
            if(isset($_GET["InitDate"])){
                $where = "WHERE created_at >= '".$_GET["InitDate"]."'";
            }
        }
            $query = "SELECT * FROM clasificado ".$where." order by updated_at desc LIMIT 5 OFFSET ".$limit;
            $res = $mysql->query($query);
            foreach ($res as $row){
                $imgURL= $row["clasificado"]["imagen1"];
                if(!preg_match("/^.imgages.*/i",$imgURL)){
                    $imgURL= "//placehold.it/100 style=width:100px;height:100px class=img-circle";
                }
                 echo "<div class=row>    
            <br>
            <div class=col-md-2 col-sm-3 text-center>
              <a class=story-img href=#><img src=".$imgURL."></a>
            </div>
            <div class=col-md-10 col-sm-9>
              <h3>".$row["clasificado"]["titulo"]."</h3>
              <div class=row>
                <div class=col-xs-9>
                  <p>".$row["clasificado"]["texto"]."</p>
                  <p class=lead><button class=btn btn-default>Read More</button></p>
                  <ul class=list-inline>
                    <li><a href=#>".$row["clasificado"]["updated_at"]."</a></li>
                  </div>
                <div class=col-xs-3></div>
              </div>
              <br><br>
            </div>
          </div>
          <hr>";
                }
                if(isset($_GET["type"])){
                    
                    if(isset($_GET["InitDate"])){
                        echo "<a href=?page=".($_GET["page"]+1)."&type=".$_GET["type"]."&InitDate=".$_GET["InitDate"]." class=btn btn-primary pull-right btnNext>Ver mas <i class=glyphicon glyphicon-chevron-right></i></a>";
                    }
                    else{
                        echo "<a href=?page=".($_GET["page"]+1)."&type=".$_GET["type"]." class=btn btn-primary pull-right btnNext>Ver mas <i class=glyphicon glyphicon-chevron-right></i></a>";
                    }
                }
                else{
                    if(isset($_GET["InitDate"])){
                        echo "<a href=?page=".($_GET["page"]+1)."&InitDate=".$_GET["InitDate"]." class=btn btn-primary pull-right btnNext>Ver mas <i class=glyphicon glyphicon-chevron-right></i></a>";
                    }
                    else{
                        echo "<a href=?page=".($_GET["page"]+1)." class=btn btn-primary pull-right btnNext>Ver mas <i class=glyphicon glyphicon-chevron-right></i></a>";
                    }
                }
            ?>
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

    <title>Listar anuncios</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilo.css" rel="stylesheet">
      
    <!-- DataTables CSS --> 
<!--    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css"> -->
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
            <li class="dropdown active">
              <a href="#" class="dropdown-toggle text-center" data-toggle="dropdown" role="button" aria-expanded="false">Clasificados<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu" id="liwant">
                <li class="text-center"><a href="listarAnuncios.php?page=1">TODOS</a></li>
                <li class=divider></li>
                <?php
                     $query = "SELECT * FROM tipoclasificado order by nombre asc";
                     $res = $mysql->query($query);
                     echo "";
                     foreach ($res as $row){
                      echo "<li><a href=listarAnuncios.php?type=".$row["tipoclasificado"]["id_tipoclasificado"]."&page=1".">".$row["tipoclasificado"]["nombre"]."</a></li>";
                     }
                 ?>
                <li class=divider></li>
                </ul>
            </li>
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
    <div id="masthead">  
    <div class="container">
      <div class="row">
        <div class="col-md-5">
          <div class="well well-lg"> 
            <div class="row">
              <div class="col-sm-12">
                <p>Buscar por fecha:</p>  
                <form id="form1">
                <label for="dateIni">Fecha: </label>
                <input type="date" id="dateIni" name="InitDate" class="form-control" />
                <input type="submit" value="Buscar" class="btn btn-default" formtarget="_self" formmethod="get"/>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div> 
    </div>
    </div>
    <div class="container">
         <?php
         if(!isset($_GET["page"])){
             $_GET["page"] = 1;
         }
         $limit = (($_GET["page"] - 1)*5);
         if(isset($_GET["type"])){
            $where = "WHERE id_tipoclasificado=".$_GET["type"];
            if(isset($_GET["InitDate"])){
                $where = $where.", created_at >= '".$_GET["InitDate"]."'";
            }
         }
        else {
            $where = "";
            if(isset($_GET["InitDate"])){
                $where = "WHERE created_at >= '".$_GET["InitDate"]."'";
            }
        }
            $query = "SELECT * FROM clasificado ".$where." order by updated_at desc LIMIT 5 OFFSET ".$limit;
            $res = $mysql->query($query);
            foreach ($res as $row){
                $imgURL= $row["clasificado"]["imagen1"];
                if(!preg_match("/^.imgages.*/i",$imgURL)){
                    $imgURL= "//placehold.it/100 style=width:100px;height:100px class=img-circle";
                }
                 echo "<div class=row>    
            <br>
            
            <div class=col-md-2 col-sm-3 text-center>
              <a class=story-img href=#><img src=".$imgURL."></a>
            </div>
            <div class=col-md-10 col-sm-9>
              <h3>".$row["clasificado"]["titulo"]."</h3>
              <div class=row>
                <div class=col-xs-9>
                  <p>".$row["clasificado"]["texto"]."</p>
                  <p class=lead><button class=btn btn-default>Read More</button></p>
                  <ul class=list-inline>
                    <li><a href=#>".$row["clasificado"]["updated_at"]."</a></li>
                  </div>
                <div class=col-xs-3></div>
              </div>
              <br><br>
            </div>
          </div>
          <hr>";
                }
                if(isset($_GET["type"])){
                    
                    if(isset($_GET["InitDate"])){
                        echo "<a href=?page=".($_GET["page"]+1)."&type=".$_GET["type"]."&InitDate=".$_GET["InitDate"]." class=btn btn-primary pull-right btnNext>Ver mas <i class=glyphicon glyphicon-chevron-right></i></a>";
                    }
                    else{
                        echo "<a href=?page=".($_GET["page"]+1)."&type=".$_GET["type"]." class=btn btn-primary pull-right btnNext>Ver mas <i class=glyphicon glyphicon-chevron-right></i></a>";
                    }
                }
                else{
                    if(isset($_GET["InitDate"])){
                        echo "<a href=?page=".($_GET["page"]+1)."&InitDate=".$_GET["InitDate"]." class=btn btn-primary pull-right btnNext>Ver mas <i class=glyphicon glyphicon-chevron-right></i></a>";
                    }
                    else{
                        echo "<a href=?page=".($_GET["page"]+1)." class=btn btn-primary pull-right btnNext>Ver mas <i class=glyphicon glyphicon-chevron-right></i></a>";
                    }
                }
            ?>
    </div>
    
	<footer class="footer">
      <div class="container">
        <p class="text-muted">Competencia Actualizacion I 2015</p>
          <time></time><br><br><hr>
          <div id="container">   Loading ... 
           
          </div>
          <hr>
          <table id="tablita"></table>
      </div>
    </footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->
   

	<script src="js/jquery-1.11.2.min.js"> </script> 

      
      
      <!-- DataTables --> 
<!--      <script type="text/javascript" charset="utf8" src="js/jquery.dataTables.js"></script>-->

      
      
<!--
    <script src="http://localhost:8000/socket.io/socket.io.js"></script>
    <script>

        // create a new websocket
        var socket = io.connect('http://localhost:8000');
        // on message received we print all the data inside the #container div
        socket.on('notification', function (data) {
            
            console.log(data);
//                        $('#tablita').DataTable({ data: data });

   
        var usersList = '<div class="row">';
        $.each(data.users,function(index,clasificado){
            usersList += '<div class="col-md-2"><img style="float: center; vertical-align:middle;" height="100" width="100" src="php/uploads/' + clasificado.imagen1 + '"></div>' +
                         '<div class="col-md-10"><h3>' + clasificado.titulo + "</h3><br>" +
                         '<p>' + clasificado.texto + '</p><br><p class="lead"><a class="btn btn-default" href="comentarios.php?id_clasificado=' + clasificado.id_clasificado +'">Ver Más</a></p>' +
                             '<h4><a >'+ clasificado.updated_at + "</h4></a><br><hr></div>";
           
        });
       usersList += "</div>";
        $('#container').html(usersList);
   
        $('time').html('Last Update at:' + data.time);
      });
    </script>  
-->
      
      
      <script src="http://localhost:3000/socket.io/socket.io.js"></script>
<script>
$(document).ready(function(){
    // Connect to our node/websockets server
    var socket = io.connect('http://localhost:3000');
 
    var datits;
    
    // Initial set of notes, loop through and add to list
    socket.on('initial notes', function(data){
        console.log(data);
        
        datits = data;
    
        var html = '<div class="row">'
        for (var i = 0; i < data.length; i++){
            // We store html as a var then add to DOM after for efficiency
            html += '<div class="col-md-2"><img style="float: center; vertical-align:middle;" height="100" width="100" src="php/uploads/' + data[i].imagen1 + '"></div>' +
                         '<div class="col-md-10"><h3>' + data[i].titulo + "</h3><br>" +
                         '<p>' + data[i].texto + '</p><br><p class="lead"><a class="btn btn-default" href="comentarios.php?id_clasificado=' + data[i].id_clasificado +'">Ver Más</a></p>' +
                             '<h4><a >'+ data[i].updated_at + "</h4></a><br><hr></div>";
        }
        
        
       html += "</div>";
        $('#container').html(html)
    })
 
    // New note emitted, add it to our list of current notes
    socket.on('new note', function(data){
        datits += data;
        
        console.log(data)
       $('#container').prepend('<div class="col-md-2"><img style="float: center; vertical-align:middle;" height="100" width="100" src="php/uploads/' + data.imagen1 + '"></div>' +
                         '<div class="col-md-10"><h3>' + data.titulo + "</h3><br>" +
                         '<p>' + data.texto + '</p><br><p class="lead"><a class="btn btn-default" href="comentarios.php?id_clasificado=' + data.id_clasificado +'">Ver Más</a></p>' + '<h4><a >'+ data.updated_at + "</h4></a><br><hr></div>");
    })
 
    // New socket connected, display new count on page
    socket.on('users connected', function(data){
      //  $('#usersConnected').html('Users connected: ' + data)
    })
 
    // Add a new (random) note, emit to server to let others know
    $('#newNote').click(function(){
//        var newNote = 'This is a random ' + (Math.floor(Math.random() * 100) + 1)  + ' note'
//        socket.emit('new note', {texto: newNote})
    })
})
</script>
      
	<script src="js/bootstrap.min.js"></script>

      
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>

      <script>
          
          $(function() {
            console.log( "ready!" );
              $.ajax({
                        type: "GET",
                        url: "api/tipoclasificado",
                        success: function(data) {
                            console.log(data);
                          //  alert(data);
                            $.each(data, function(index, tipoclasificado) {
                                    //$("#liwant").append ("<li>" + tipoclasificado.nombre + "</li>" );
                                });
                            
                        },
                        error: function(data){
                            console.log(data);
                        }
                    });
          });
 
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