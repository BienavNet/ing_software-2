<?php require_once 'core/view.php' ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "views/includes/scripts.php"; ?>
   
   <link rel="stylesheet" href="<?=constant('URL')?>plugins/css/error.css">
	
   
	
	<title>Eliminar Producto</title>
</head>
<body>
	<?php include "views/includes/header.php"; ?>
	<section id="container">
		<div class="form_register">
        
            <h1>Eliminar Producto</h1>
            <hr>
             <div class="alert"></div>
             <form action="<?php constant("URL")?>listar_producto/getProducts" method="post">
                <label for="producto">Id del producto</label>
                <input type="text" name="producto" id="producto" placeholder="Id del producto">
                
            
                <input type="submit" value="Eliminar Producto" class="btn_save">

             </form>

             <div class="results alert alert-success"><?=$this->showMessages();?></div>
        </div>
	</section>
	<?php include "views/includes/footer.php"; ?>
</body>
</html>