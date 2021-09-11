<?php require_once 'core/view.php' ?>
<?php require_once 'views/header.php' ?>


    <!-- //banner-->
    <!--/login -->
    <section class="banner-bottom py-5">
        <div class="container">
            <div class="content-grid">
                <div class="text-center icon">
                    <span class="fa fa-user-circle-o"></span>
                </div>
                <div class="content-bottom">
                    <form action="<?=constant('URL')?>signup/registrarUsuario" method="POST" id="register">
                        <div class="field-group">
                            <div class="row form-group">
                                <div class="col-6">
                                    <div class="content-input-field">
                                        <input name="fname" id="name" type="text" value="" placeholder="First Name" required="">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="content-input-field">
                                        <input name="lname" id="surname" type="text" value="" placeholder="Last Name" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="content-input-field">
                                <input name="username" id="username" type="text" value="" placeholder="User Name" required="">
                            </div>
                        </div>
                        <div class="field-group">

                            <div class="content-input-field">
                                <input name="email" id="email" type="email" value="" placeholder="User Email" required="">
                            </div>
                        </div>
                        <div class="field-group">

                            <div class="content-input-field">
                                <input name="phone" id="phone" type="text" value="" placeholder="UserPhone" required="">
                            </div>
                        </div>
                        <div class="field-group">
                            <div class="content-input-field">
                                <input name="password" id="password" type="Password" placeholder="Password">
                            </div>
                        </div>
                        <div class="content-input-field">
                            <button type="submit" class="btn">Inscribirse</button>
                        </div>
                        <div class="list-login-bottom text-center mt-lg-5 mt-4">

                            <a href="#" class="">Al hacer clic en Registrarse, acepto sus términos.</a>


                            <div class="row">
                                <div class="alert alert-danger d-none" id="results">
                                    <?=$this->showMessages()?>
                                </div>
                            </div>



                        </div>
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
    <!--//shipping-->
    
    <script src="views/login/js/validate.js"></script>
    <?php require_once 'views/footer.php'?>
