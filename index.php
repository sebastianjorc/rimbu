<?php
    require_once("config/server.php");
    # require_once("controllers/personas_controller.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto" >
    <link rel="stylesheet" href="vistas/css/normalize.css">    
    <!--<link rel="stylesheet" href="vistas/css/main.css">-->
    <link rel="stylesheet" href="vistas/css/header.css">
    <link rel="stylesheet" href="vistas/css/home.css">
    
    <script src="https://kit.fontawesome.com/351b7647d6.js" crossorigin="anonymous"></script>
    <script src="prefixfree.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>     

    <script src="vistas/js/main.js"></script>
    <title>Rimbultd</title>
</head>
<body class="contenedor">
    <header class="header">
        <div class="top-nav"></div> <!--¿Aquí el contacto?-->
        <div class="nav-1">
            <div class="logo noselect">
                <img src="" alt="" class="img-logo">
                <a href="index.php" class="logo__a"><p class="logo__p">RIMBU</p></a>
            </div>
            <div class="busqueda-nav">
                <input class="busqueda-nav__input" for="" placeholder="&#xf002"></input>            
            </div>
            <div class="eslogan noselect">
                <p class="eslogan__p"> ¡Nunca reparar tu vehiculo fue tan rápido!</p>
            </div>
            <div class="login noselect">
                <i class="fas fa-user-circle"></i>
                <a class="login__a" href="">Mi sesión</a> 
            </div>
            <div class="carro noselect">
                <i class="fas fa-shopping-cart fa-flip-horizontal carro__i"></i>
                <a class="carro__a" href="">Carro</a>
            </div>
        </div>
        <nav class="nav-2">
            <ul class="nav-2__ul">
                <li class="nav-2__ul__li" ><a class="nav-2__ul__li__a" href="index.php">INICIO</a></li>
                <li class="nav-2__ul__li"><a class="nav-2__ul__li__a" href="vistas/categorias.php">CATEGORÍAS</a>
                    <ul     class="nav-2__ul__li__ul">
                        <li class="nav-2__ul__li__ul__li"><a class="nav-2__ul__li__ul__li__a" href="vistas/Motor.php">Motor</a></li>
                        <li class="nav-2__ul__li__ul__li"><a class="nav-2__ul__li__ul__li__a" href="vistas/freno.php">Freno</a></li>
                        <li class="nav-2__ul__li__ul__li"><a class="nav-2__ul__li__ul__li__a" href="vistas/distribucion.php">Distribución</a></li>
                        <li class="nav-2__ul__li__ul__li"><a class="nav-2__ul__li__ul__li__a" href="vistas/filtro.php">Filtro</a></li>
                        <li class="nav-2__ul__li__ul__li"><a class="nav-2__ul__li__ul__li__a" href="vistas/aceite.php">Aceite</a></li>
                        <li class="nav-2__ul__li__ul__li"><a class="nav-2__ul__li__ul__li__a" href="vistas/sistema_de_escape.php">Sist. de escape</a></li>
                        <li class="nav-2__ul__li__ul__li"><a class="nav-2__ul__li__ul__li__a" href="vistas/carroceria.php">Carrocería</a></li>
                        <li class="nav-2__ul__li__ul__li"><a class="nav-2__ul__li__ul__li__a" href="vistas/suspension.php">Suspensión</a></li>
                        <li class="nav-2__ul__li__ul__li"><a class="nav-2__ul__li__ul__li__a" href="vistas/accesorios.php">Accesorios</a></li>
                        <li class="nav-2__ul__li__ul__li"><a class="nav-2__ul__li__ul__li__a" href="vistas/refrigeracion.php">Refrigeración</a></li>
                        <li class="nav-2__ul__li__ul__li"><a class="nav-2__ul__li__ul__li__a" href="vistas/sensores.php">Sensores</a></li>
                    </ul>
                </li>
                <li class="nav-2__ul__li"><a class="nav-2__ul__li__a" href="vistas/talleres_mecanicos.php">TALLERES MECÁNICOS</a>            
                </li>
                <li class="nav-2__ul__li"><a class="nav-2__ul__li__a" href="vistas/ofertas.php">OFERTAS</a></li>
                <li class="nav-2__ul__li"><a class="nav-2__ul__li__a" href="vistas/blog.php">BLOG</a></li>
                <li class="nav-2__ul__li"><a class="nav-2__ul__li__a" href="vistas/nosotros.php">NOSOTROS</a></li>
            </ul>
        </nav>
    </header>
    

    <main>
        <aside class="sidebar">
            <div class="sidebar__barra">                
                <ul class="sidebar__tabs">
                    <li><a href="#tab1" class="sidebar__patente">N° Patente</a></li>
                    <li><a href="#tab2" class="sidebar__vin">N° de vin</a></li>
                </ul>
            </div>

            <div class="sidebar__section">
                <div class="container__patente" id="tab1">
                    <input type="text" class="patente_input" placeholder="  Ingresa tu patente aquí        &#xf002">
                    <p>Búsqueda por Marca</p>
                    <select class="busqueda_marca" placeholder="     Marca..." id="" >
    
                    </select>
                    <select class="busqueda_modelo" placeholder="     Modelo..." id="">
    
                    </select>
                    <select class="busqueda_anio" placeholder="     Año..." id="">
    
                    </select>
                    <select class="busqueda_motor" placeholder="     Motor..." id="">
    
                    </select>
                </div>
                
                <div class="container__vin" id="tab2">   
                    <input type="text" class="patente_input" placeholder="  Ingresa tu N° de VIN aquí        &#xf002">
                    <p>Búsqueda por Marca</p>
                    <select class="busqueda_marca" placeholder="     Marca..." id="" >
    
                    </select>
                    <select class="busqueda_modelo" placeholder="     Modelo..." id="">
    
                    </select>
                    <select class="busqueda_anio" placeholder="     Año..." id="">
    
                    </select>
                    <select class="busqueda_motor" placeholder="     Motor..." id="">
    
                    </select>          
                </div>
            </div>

        </aside>

        <div class="banner">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel" data-slide-to="1"></li>
                  <li data-target="#myCarousel" data-slide-to="2"></li>
                  <li data-target="#myCarousel" data-slide-to="3"></li>
                </ol>
                
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                  <div class="item active">
                    <img class="carousel__img" src="https://www.battlefieldautomotive2010.com/Images/banner-1.jpg" alt="">
                  </div>
            
                  <div class="item">
                    <img class="carousel__img" src="https://images.squarespace-cdn.com/content/v1/5912373d46c3c48ff6f237f7/1498584923734-YLMRDX1T1L9AKAGXJ6G6/ke17ZwdGBToddI8pDm48kPqQfq0L3n3wpHIsRapTfg8UqsxRUqqbr1mOJYKfIPR7LoDQ9mXPOjoJoqy81S2I8N_N4V1vUb5AoIIIbLZhVYxCRW4BPu10St3TBAUQYVKczo5Zn4xktlpMsMj-QlHXeMfNK6GwvtVkYEWiR8XAPyD3GfLCe_DXOSC_YcAacWL_/general-car-repair-CA-Motor-Works.jpg?format=1500w" alt="">
                  </div>
                
                  <div class="item">
                    <img class="carousel__img" src="https://preparatoriastorreon.com/wp-content/uploads/2019/12/1_duVdgJ3oEQOxtsyPw7ofYA.jpeg" alt="">
                  </div>
                  
                  <div class="item">
                    <img class="carousel__img" src="http://www.autodeluxe.co/wp-content/uploads/2017/09/Banner-Carro.jpg" alt="">
                  </div>
                </div>
            
                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
        </div>        
    </main>


    <?php include_once('vistas/layout/Component/footer.php'); ?>
    
    
</body>
</html>