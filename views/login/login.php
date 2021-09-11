<?php require_once 'core/view.php' ?>
<?php require_once 'views/header.php' ?>


    <!--/login -->
    <section class="banner-bottom py-5">
        <div class="container">
            <div class="content-grid">
                <div class="text-center icon">
                    <span class="fa fa-unlock-alt"></span>
                </div>
                <div class="content-bottom">
                    <form action="<?=constant('URL')?>login/verifyLogin" method="post">
                        <div class="field-group">

                            <div class="content-input-field">
                                <input name="username" id="username" type="text" value="" placeholder="User Name" required="">
                            </div>
                        </div>
                        <div class="field-group">
                            <div class="content-input-field">
                                <input name="password" id="password" type="Password" placeholder="Password">
                            </div>
                        </div>
                        <div class="content-input-field">
                            <button type="submit" class="btn"> Iniciar sesión</button>
                            <div class="alert alert-info"><?= $this->showMessages(); ?></div>
                        </div>
                        <ul class="list-login">
                            <li class="switch-slide">
                                <label class="switch">
                                    <input type="checkbox">
                                    <span class="slider round"></span>
                                    mantener conectado
                                </label>
                            </li>
                            <li>
                                <a href="#" class="text-right">¿Olvidastes tu Contraseña?</a>
                            </li>
                            <li class="clearfix"></li>
                        </ul>
                        <ul class="list-login-bottom">
                            <li class="">
                                <a href="register.html" class="">¿No tienes una cuenta?</a>
                            </li>
                            
                            <li class="clearfix"></li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /login -->
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
    
    <?php require_once 'views/footer.php'?>


