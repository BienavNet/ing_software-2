
<?php require_once 'views/header.php'; ?>
        <!--/banner-->
        <div class="banner-wthree-info container">
            <div class="row">
                <div class="col-lg-5 banner-left-info">
                    <h3>El más amplio rango de productos<span> para el cuidado personal.</span></h3>
                    <a href="<?=constant('URL')?>shop/list.php" class="btn shop">Ver Ahora</a>
                </div>
                <div class="col-lg-7 banner-img d-flex align-items-end">
                    <img src="plugins/img/img1.png" alt="part image" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

    <!-- //banner-->
    <!--/banner-bottom -->
    <!-- /banner-bottom -->


    <!--/gallery -->
    <section class="banner-bottom py-5">
        <div class="container py-md-5">


            <div class="row">
                <div class="col-lg-4 gallery-content-info text-center mt-lg-5">
                    <h3 class="title-wthree mb-lg-5 mb-4">Trending Now </h3>
                    <p>Lorem ipsum dolor sit,Nulla pellentesque dolor ipsum laoreet eleifend integer,Pellentesque
                        maximus libero.</p>
                    <a href="<?=constant('URL')?>shop" class="btn shop mt-3">Shop Now</a>

                </div>
                <div class="col-lg-8 gallery-content">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 gal-img">
                            <a href="#gal1"><img src="plugins/img/pro1.PNG" alt="Baggage" class="img-fluid mt-4"></a>
                        </div>
                        <div class="col-md-4 col-sm-6 gal-img">
                            <a href="#gal2"><img src="plugins/img/pro3.PNG" alt="Baggage" class="img-fluid mt-4"></a>
                        </div>
                        <div class="col-md-4 col-sm-6 gal-img">
                            <a href="#gal3"><img src="plugins/img/senso1.PNG" alt="Baggage" class="img-fluid mt-4"></a>
                        </div>
                        <div class="col-md-4 col-sm-6 gal-img">
                            <a href="#gal1"><img src="plugins/img/senso3.PNG" alt="Baggage" class="img-fluid mt-4"></a>
                        </div>
                        <div class="col-md-4 col-sm-6 gal-img">
                            <a href="#gal2"><img src="plugins/img/acne1.PNG" alt="Baggage" class="img-fluid mt-4"></a>
                        </div>
                        <div class="col-md-4 col-sm-6 gal-img">
                            <a href="#gal3"><img src="plugins/img/acne2.PNG" alt="Baggage" class="img-fluid mt-4"></a>
                        </div>

                    </div>
                    <!-- gallery popups falta cuadrar bien los popups -->
                    <!-- popup-->
                    <div id="gal1" class="popup-effect">
                        <div class="popup">
                            <img src="plugins/img/pro1.PNG" alt="Popup image" class="img-fluid mt-4" />
                            <a class="close" href="#gallery">&times;</a>
                        </div>
                    </div>
                    <!-- //popup -->
                    <!-- popup-->
                    <div id="gal2" class="popup-effect">
                        <div class="popup">
                            <img src="plugins/img/pro3.PNG" alt="Popup image" class="img-fluid mt-4" />
                            <a class="close" href="#gallery">&times;</a>
                        </div>
                    </div>
                    <!-- //popup -->
                    <!-- popup-->
                    <div id="gal3" class="popup-effect">
                        <div class="popup">
                            <img src="plugins/img/pro3.PNG" alt="Popup image" class="img-fluid mt-4" />
                            <a class="close" href="#gallery">&times;</a>
                        </div>
                    </div>
                    <!-- //popup -->
                    <!-- //gallery popups -->

                </div>
            </div>

        </div>
    </section>
    <!-- //gallery-->
    <!--/newsletter -->
    <section class="newsletter-w3pvt py-5">
        <div class="container py-md-5">
            <form method="post" action="#">
                <p class="text-center">Realiza tus pedidos llamándonos al 3155555555 o escríbenos a nuestras redes
                    sociales: Facebook, Instagram y Whatsapp</p>
                <div class="row subscribe-sec d-flex justify-content-center align-items-center">
                    <a href="https://walink.co/b36ad9" target="_blank" class="btn btn-outline-success m-2"><span class="fa fa-whatsapp"></span> Enviar
                        Mensaje</a>
                    <a href="https://www.facebook.com/104522728375060/posts/104542301706436/?sfnsn=scwspmo" target="_blank" class="btn btn-outline-primary m-2"><span class="fa fa-facebook"></span> Enviar
                        Mensaje</a>
                    <a href="https://www.instagram.com/direct/t/340282366841710300949128232824165638502" target="_blank" class="btn btn-outline-danger m-2"><span class="fa fa-instagram"></span> Enviar
                        Mensaje</a>
                </div>
            </form>
        </div>
    </section>
    <!--//newsletter -->
    <!--/shipping-->
    <section class="shipping-wthree py-3">
        <div class="shiopping-grids d-flex justify-content-center align-items-center">
            <div class="col-lg-4 shiopping-w3pvt-gd text-center">
                <div class="icon-gd"><span class="fa fa-truck" aria-hidden="true"></span>
                </div>
                <div class="icon-gd-info">
                    <h3>Envío Gratis</h3>
                    <p>En compras superiores a 100.000 pesos</p>
                </div>
            </div>
            <!--<div class="col-lg-4 shiopping-w3pvt-gd sec text-center">
                <div class="icon-gd"><span class="fa fa-bullhorn" aria-hidden="true"></span></div>
                <div class="icon-gd-info">
                    <h3>FREE RETURN</h3>
                    <p>On 1st exchange in 30 days</p>
                </div>
            </div>
            <div class="col-lg-4 shiopping-w3pvt-gd text-center">
                <div class="icon-gd"> <span class="fa fa-gift" aria-hidden="true"></span></div>
                <div class="icon-gd-info">
                    <h3>MEMBER DISCOUNT</h3>
                    <p>Register &amp; save up to $29%</p>
                </div>

            </div>-->
        </div>

    </section>
    <!--//shipping-->
    
    <?php require_once 'views/footer.php'?>