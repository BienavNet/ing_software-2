<?php require_once 'views/header.php'; ?>

<div class="container">
    <!--navbar-->
    <div class="row  alert alert-success d-flex justify-content-center">
        <div class="col-10 w-100 text-center"><h3>Bienvenido a nuestra tienda <?php echo $this->data['current_user'][':first_name'].' '.$this->data['current_user'][':last_name']?></h3></div>
        <p>
            Aquí encontrará sus datos personales y podrá actualizarlos siempre que usted quiera :)
        </p>
    </div>
    
    <style>
        
        .content-input-field input
        {
            background-color: #ffffff !important;
            border-width: 1px;
            border-style: solid;
            border-radius: 10px;
            border-color:#000000 !important;
            
        }
        
        
    </style>


    
    

    <div class="container" style="background-color: #00cccc !important;">
        
        <div class="row pt-5 d-flex justify-content-center align-items-center">
            <span class="text-center w-100 text-black" style="font-size: 2rem;">Información Personal</span>
        </div>
        
        
    <div class="row d-flex justify-content-center bg-ligth" style="background-color: #00cccc !important;">
        <form action="<?=constant('URL')?>user/updateInfo" method="POST" id="register" class="my-5">
                        <div class="field-group">
                            <div class="row form-group">
                                <div class="col-6">
                                    <div class="content-input-field">
                                        <input name="fname" id="name" type="text" value="<?php echo $this->data['current_user'][':first_name'];?>" placeholder="First Name" required="">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="content-input-field">
                                        <input name="lname" id="surname" type="text" value="<?php echo $this->data['current_user'][':last_name'];?>" placeholder="Last Name" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="content-input-field">
                                <input name="username" id="username" type="text" value="<?php echo $this->data['current_user'][':username'];?>" placeholder="Username" required="">
                            </div>
                        </div>
                        <div class="field-group">

                            <div class="content-input-field">
                                <input name="email" id="email" type="email" value="<?php echo $this->data['current_user'][':email'];?>" placeholder="User Email" required="">
                            </div>
                        </div>
                        <div class="field-group">

                            <div class="content-input-field">
                                <input name="phone" id="phone" type="text" value="<?php echo $this->data['current_user'][':phone'];?>" placeholder="UserPhone" required="">
                            </div>
                        </div>
                        <div class="field-group">
                            <div class="content-input-field">
                                <label for="password">Contraseña: </label>
                                <input name="password" id="password" type="Password" value="<?php echo $this->data['current_user'][':pass'];?>" placeholder="Password" required>
                            </div>
                            
                        </div>
                        <div class="field-group">
                            <div class="content-input-field">
                                <label for="vpassword">Comprobar contraseña: </label>
                                <input name="vpassword" id="password2" type="Password" value="<?php echo $this->data['current_user'][':pass'];?>" placeholder="Password" required>
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="p1">Ver contraseñas</label>
                            <input class="m-3" type="checkbox" onclick="myFunction()" id="p1">
                        </div>
                        <div class="content-input-field">
                            <button type="submit" class="btn">Guardar Cambios</button>
                        </div>
                        <div class="list-login-bottom text-center mt-lg-5 mt-4">

                            <a href="#" class="">Al hacer clic en Registrarse, acepto sus términos.</a>
                        </div>
                    </form>
                    
    
    </div>
    </div>

    


</div>

<script src="<?=constant('URL')?>/views/dashboard/password.js"></script>

<?php require_once 'views/footer.php'; ?>