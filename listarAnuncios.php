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

    <title>Listar anuncios</title>

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
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Clasificados<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="listarAnuncios.php?page=1">TODOS</a></li>
                <li class=divider></li>
                <?php
                     $query = "SELECT * FROM tipoclasificado order by nombre asc";
                     $res = $mysql->query($query);
                     foreach ($res as $row){
                      echo "<li><a href=listarAnuncios.php?type=".$row["tipoclasificado"]["id_tipoclasificado"]."&page=1".">".$row["tipoclasificado"]["nombre"]."</a></li>";
                     }
                 ?>
              </ul>
            </li>
            <li><a href="#about">Crear Anuncio</a></li>
            <li class="active"><a href="#contact">Modificar Password</a></li>
          </ul>
            <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="./">Bienvenido!! ...<span class="sr-only">(current)</span></a></li>
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
                <label for="dateIni">Fecha inicio</label>
                <input type="date" id="dateIni" name="InitDate"/>
                <input type="submit" value="Buscar" formtarget="_self" formmethod="get""/>
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

      
      
      
  </body>
</html>