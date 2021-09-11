<?php require_once 'core/view.php' ?>
<?php require_once 'views/header.php'; ?>
    <!-- //banner-->
    <!--/banner-bottom -->
    <section class="banner-bottom py-5">
        <div class="container py-5">
            <h3 class="title-wthree mb-lg-5 mb-4 text-center">Compra ahora</h3>
            <!--/row-->
           
            <div class="row shop-wthree-info text-center">
                
                <?php

                    for ($i=0; $i < count($this->data['products']); $i++) { 
                        echo $this->data['products'][$i];
                    }
                
                ?>
                
                <!--//row-->
            </div>
            <nav aria-label="Page navigation example" class="w-100 mt-5 d-flex justify-content-center align-items-center">
                <ul class="pagination">
                    <li class="page-item" id="anterior">
                        <a class="page-link" href="<?=constant('URL')?>tienda/getProducts?page=<?=$this->data['before']?>">Anterior</a>
                    </li>

                    
                    <?php
                        for ($i=1; $i <= $this->data['pagination']; $i++) { 

                            echo 
                            '<li class="page-item">
                                <a class="page-link" href="'.constant('URL').'tienda/getProducts?page='.$i.'">'.$i.'</a>
                            </li>';
                        }
                    
                    ?>
                    
                    <li class="page-item" id="siguiente">
                        <a class="page-link" href="<?=constant('URL')?>tienda/getProducts?page=<?=$this->data['after']?>">Siguiente</a>
                    </li>
                </ul>
            </nav>
        </div>
    </section>
    <!-- /banner-bottom -->
    <!--/newsletter -->
    <section class="newsletter-w3pvt py-5">
        <div class="container py-md-5">
            <form method="post" action="#">
                <p class="text-center">¿Viste algo que te gusta? Contáctanos por cualquiera de estos medios: </p>
                <div class="row subscribe-sec d-flex justify-content-center align-items-center">
                    <a href="https://wa.me/3006926669" class="btn btn-outline-success m-2"><span class="fa fa-whatsapp"></span> Enviar
                        Mensaje</a>
                    <a href="#" class="btn btn-outline-primary m-2"><span class="fa fa-facebook"></span> Enviar
                        Mensaje</a>
                    <a href="#" class="btn btn-outline-danger m-2"><span class="fa fa-instagram"></span> Enviar
                        Mensaje</a>
                </div>

            </form>
        </div>
    </section>
    <!--//newsletter -->
    <!--/shipping-->
    <section class="shipping-wthree">
        <div class="shiopping-grids d-flex justify-content-center align-items-center">
            <div class="col-lg-4 shiopping-w3pvt-gd text-center">
                <div class="icon-gd"><span class="fa fa-truck" aria-hidden="true"></span>
                </div>
                <div class="icon-gd-info">
                    <h3> ENVÍO GRATIS</h3>
                    <p>En todos los pedidos superiores a 100.000</p>
                </div>
            </div>
            <!--<div class="col-lg-4 shiopping-w3pvt-gd sec text-center">
                <div class="icon-gd"><span class="fa fa-bullhorn" aria-hidden="true"></span></div>
                <div class="icon-gd-info">
                    <h3>DEVOLUCIÓN GRATUITA</h3>
                    <p> En el primer intercambio en 30 días</p>
                </div>
            </div>
            <div class="col-lg-4 shiopping-w3pvt-gd text-center">
                <div class="icon-gd"> <span class="fa fa-gift" aria-hidden="true"></span></div>
                <div class="icon-gd-info">
                    <h3>DESCUENTO PARA MIEMBROS</h3>
                    <p>Registrarse &amp;  ahorre hasta $ 29%</p>
                </div>

            </div>-->
        </div>

    </section>
    <!--//shipping-->


    <?php require_once 'views/footer.php'?>
