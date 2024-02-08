<?php
require_once("../autoload.php");
session_start();
if(!isset($_SESSION["rol"])){ header("location:index.php"); }
?>
<!DOCTYPE html>
<html lang="es">
<head>


<!-- basic -->

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- mobile metas -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="initial-scale=1, maximum-scale=1">

<!-- site metas -->
<title>BuggBlock</title>
<link rel="shortcut icon" href="images/LogoE.ico"/>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">	

<!-- bootstrap css -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


<!-- style css -->
<link rel="stylesheet" type="text/css" href="css/style-edit.css">

<!-- Responsive-->
<link rel="stylesheet" href="css/responsive.css">


<!-- Scrollbar Custom CSS -->
<link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
<!-- Tweaks for older IEs-->
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
<!-- owl stylesheets --> 
<link rel="stylesheet" href="css/owl.carousel.min.css">
<link rel="stylesheet" href="css/owl.theme.default.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">

</head>

<!-- body -->
<body>
	<div class="header_main">
		<div class="container">
			<div class="logo"><a href="index.html"><img src="images/LogoInicioBla.png"></a></div>
		</div>
	</div>
	</div>
	<div class="header">
		<div class="container">

        <!--  header inner -->
            <div class="col-sm-12">
                 
                 <div class="menu-area">
                    <nav class="navbar navbar-expand-lg ">

                        <!-- <a class="navbar-brand" href="#">Menu</a> -->
<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                       <i class="fa fa-bars"></i>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                               <li class="nav-item active">
                                <a class="nav-link" href="index.php"><i class="bi bi-house"></i>  Inicio<span class="sr-only">(current)</span></a> </li>
                               <li class="nav-item">
								<a class="nav-link" href="administrador.php"><i class="bi bi-eye"></i> Ver publicaciones</a></li>
                               <li class="nav-item">
							   <li class="nav-item"><a class="btn btn-primary nav-link" href="../controlls/cerrarSesion.php"> <i class="bi bi-door-open-fill"></i>Cerrar Sesion</a></li>
                               <li class="nav-item">
								<li class="nav-item">
								<a class="nav-link">Bienvenido <?php echo $_SESSION['name'];?></a></li>
								</div>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div> 
    </div>
    <!-- end header end -->    

    <!--banner start -->
    <div>
		<br><br><br><br><br>
    </div>
</div>
</div>
<!--banner end -->

    <!--services start -->
    <div class="services_main">
    	<div class="container">
    		<div class="creative_taital" style="text-align: center;">
    			<h1 class="creative_text">Crear Publicacion</h1>
    			<p style="color: #050000; text-align: center;">
					<form action="../controlls/insertarPublicaciones.php" method="post" class="form-container" enctype="multipart/form-data">
						<p><h1 style="color: #050000;">Datos de Publicacion</h1></p>
						
						<label for="titulo">TITULO:</label><br>
						<input type="text" id="fname" name="titulo" required><br>

						<label for="contenido">DESCRIPCION:</label><br>
						<input type="text" id="fname" name="contenido" required><br>

						<span class="file-status"></span><br>

						<label for="custom-file-input" class="btn-primary">Elige la imagen </label>
						<input type="file" accept="image/*" name="img" id="custom-file-input"hidden><br>

						<button type="submit" class="btn">Guardar</button>
						<button type="button" class="btn cancel" onclick="gotoadmin()">Cancelar</button>
					  </form>
					</div>

					<script>
					function openForm() {
					document.getElementById("myForm").style.display = "block";
					}

					function closeForm() {
					document.getElementById("myForm").style.display = "none";
					}
					</script>
    		</div>
    		    
    <!--services end -->

    <!--quote_section start -->
    <div class="quote_section">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-6">
    				<h1 class="quote_text">Universidad De Colima</h1>
    				<p class="loan_text"> Ingenieria en software 2D <br>Facultad de Ingenieria Electromecanica</p>
    			</div>
    		</div>
    	</div>
    </div>
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
	  <script src="js/app.js"></script>
	  <script>
        function gotoadmin(){
            window.location.href="administrador.php"
        }
    </script>
</body>
</html>