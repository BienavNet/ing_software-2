<!DOCTYPE html>
<html lang="es">

<head>
    <title>Inicio</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords"
        content="Salma, SalmaClinic, SalmaClinicPadua, belleza, salud, cuidado personal, clinica, autocuidado, productos, posología, venta online, whatsapp" />





    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>


    <!-- //Meta tag Keywords -->
    <!-- Custom-Files -->
    <!-- Bootstrap-Core-CSS -->
    <link rel="stylesheet" href="<?=constant('URL')?>plugins/bootstrap/css/bootstrap.min.css">
    <!-- Style-CSS -->
    <link rel="stylesheet" href="<?=constant('URL')?>plugins/css/style.css">
    <!-- font-awesome-icons -->
    <link rel="stylesheet" href="<?=constant('URL')?>plugins/css/font-awesome.css">
    <!-- //font-awesome-icons -->
    <!-- /Fonts -->
    <!--<link href="//fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet">-->
    <!-- //Fonts -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-RZLB74LJBZ"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-RZLB74LJBZ');
    </script>







    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '300235104967915');
        fbq('track', 'PageView');
        </script>
        <noscript><img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id=300235104967915&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Facebook Pixel Code -->

</head>

<body>
    <div class="main-sec">
        <!-- //header -->
        <header class="py-sm-3 pt-3 pb-2" id="home">
            <div class="container">
                <!-- nav -->
                <div class="top-w3pvt d-flex">
                    <div id="logo">
                        <h1> <a href="<?=constant('URL')?>"><span class="log-w3pvt">S</span>almaClinic <span
                                    class="log-w3pvt">P</span>adua</a> <label class="sub-des">Tienda Online</label></h1>
                    </div>
                    <div class="forms ml-auto">
                    
                        
                        <?php if(isset($_SESSION['user']) && !empty($_SESSION['user'])){ 
                            print_r('<a href="' .constant('URL'). 'user" class="btn"><span class="fa fa-user-circle-o"></span> Información Cuenta</a>');
                            print_r('<a href="' .constant('URL'). 'sistema/logOut" class="btn"><span class="fas fa-sign-out-alt"></span> Cerrar sesión</a>');
                        }else {
                            echo '<a href="' .constant('URL'). 'login" class="btn"><span class="fa fa-user-circle-o"></span> Iniciar sesión</a>';
                            print_r('<a href="' .constant('URL'). 'signup" class="btn"><span class="fa fa-pencil-square-o"></span> Inscribirse</a>');
                        }
                        ?>
                        
                    </div>
                </div>
                <div class="nav-top-wthree">
                    <nav>
                        <label for="drop" class="toggle"><span class="fa fa-bars"></span></label>
                        <input type="checkbox" id="drop" />
                        <ul class="menu">
                            <li class="active"><a href="<?=constant('URL')?>">Inicio</a></li>
                            <li><a href="about.html">Sobre Nosotros</a></li>

                            <li><a href="<?=constant('URL')?>tienda/getProducts?page=1">Colecciones</a></li>
                            <li><a href="contact.html">Contáctanos</a></li>
                        </ul>
                    </nav>
                    <div><?php $this->showMessages();?></div>
                    <!-- //nav -->
                    <div class="clearfix"></div>
                </div>
            </div>
        </header>


    
