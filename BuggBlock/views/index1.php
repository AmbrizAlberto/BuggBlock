<?php
  require_once("../autoload.php");
	use models\publicaciones;
  session_start();
  $publicacion = new publicaciones();
	$posts = $publicacion->getpublicaciones();
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
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/estilos.css">


<!-- Responsive-->
<link rel="stylesheet" href="css/responsive.css">

<!-- fevicon -->
<link rel="icon" href="images/fevicon.png" type="image/gif" />
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
			<div class="logo"><a href="#"><img src="images/LogoInicioBla.png"></a></div>
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
                            	<li class="nav-item active mr-5"><a class="nav-link" href="index.php">Inicio   <i class="bi bi-house"></i><span class="sr-only">(current)</span></a></li>
								<!-- PHP: Cambion de interfaz segun la sesion -->
							
								<?php if(!isset($_SESSION["rol"])){ ?>
								<li class="nav-item mr-5"><a class="nav-link" href="login.php">Iniciar sesion   <i class="bi bi-door-open"></i></a></li>
								<li class="nav-item mr-5"><a class="nav-link" href="About-us.html">Sobre Nosotros     <i class="bi bi-people"></i></a></li>

								<?php } else {?>
								<li class="nav-item mr-5"><a class="nav-link" href="administrador.php">Administrador    <i class="bi bi-person-bounding-box"></i></a></li>
								<li class="btn-primary"><a class="nav-link" href="../controlls/cerrarSesion.php">Cerrar sesion     <i class="bi bi-box-arrow-right"></i></a></li>
								<li class="nav-item"><a class="nav-link">  |  Bienvenido <?php echo $_SESSION['name'];?></a></li>
								
								<?php } ?>
								<!-- Fin de PHP -->
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div> 
    </div>
    <!-- end header end -->    

    <!--banner start -->
    <div class="banner-main">
    	<div class="container">
		<br><br><br><br>
           <div id="main_slider" class="carousel slide" data-ride="carousel">  

           <!-- The slideshow -->
            <div class="carousel-inner">
                <div class="carousel-item active">
    		    <div class="titlepage-h1">
    	        <h1 class="bnner_title">NUEVAS GRAFICAS<br><br>
    	        <span style="color: #ffffff">Las Radeon RX 7900 XTX y RX 7900 XT de AMD ya están aquí, y nos prometen romper moldes en rendimiento por vatio.</span></h1>
    	        <p class="long_text">Un blogg donde expertos prueban y dan su opinion sobre la tecnologia</p>
    		    </div>
        </div>
    <div class="carousel-item">
    		<div class="titlepage-h1">
    	       <h1 class="bnner_title">NOTICIAS PARA EL MERCADO DE LAS GRAFICAS<br><br>
    	       <span style="color: #ffffff">El mercado de tarjetas gráficas vive su peor momento desde 2008. Malas noticias para las Radeon RX 7000 de AMD</span></h1>
    	       <p class="long_text">El próximo 13 de diciembre llegarán a las tiendas las primeras tarjetas gráficas Radeon RX 7000 de AMD. Son la alternativa de esta marca a las GeForce RTX 40 de NVIDIA, pero ambas tienen un futuro cercano complicado. Muy complicado. </p>
    		</div>
        </div>
    <div class="carousel-item">
    		<div class="titlepage-h1">
    	       <h1 class="bnner_title">CHINA LO HACE DE NUEVO<br><br>
    	       <span style="color: #ffffff">China se prepara para inundar el mercado con sus propias tarjetas gráficas. Este es su plan</span></h1>
    	       <p class="long_text">Ahora mismo a la mayor parte de los entusiastas de la tecnología las marcas MetaX, Biren, Moore Threads, Innosilicon o Zhaoxin no nos dicen nada, pero con toda seguridad dentro de poco tiempo estaremos familiarizados con ellas. </p>
    		</div>
    </div>
  </div> 
         <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
            </a>
        <a class="carousel-control-next" href="#main_slider" role="button" data-slide="prev">
            </a>
    </div>
</div>
</div>
<!--banner end -->

    <!--services start -->
    <div class="services_main">
    	<div class="container">
    		<div class="taital">
				<div class="slider">
						<ul>
							<li>
								<img src="images/noticia1.jpg">
							</li>
							<li>
								<img src="images/noticia2.jpg">
							</li>
							<li>
								<img src="images/noticia3.jpg">
							</li>
							<li>
								<img src="images/noticia4.jpg">
							</li>
						</ul>
				</div>
    		</div>
    		<div class="section_service_2">
					<br><br><br>
    		    	<h1 class="service_text">Publicaciones</h1>
    		</div>
		</div>
		<!-- PHP: Publicaciones -->
		<section class="form-main">
			<div class="form-content">
				<?php foreach ($posts as $post) { ?>
				<div class="box">
					<h4><?php echo $post['titulo'];?></h4>
					<h5><?php echo $post['contenido'];?></h5>
					<?php if($post['dir_img'] != null) {?>
						<img src="<?php echo $post['dir_img']; ?>" alt="imagen de publicación" class="img-post">
					<?php } ?>
					<h6><?php echo $post['fecha_creacion'];?></h6>
				</div>
				<?php } ?>
			</div>
		</section>
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
</body>
</html>