<?php require_once 'core/view.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "views/includes/scripts.php"; ?>
    <link rel="stylesheet" href="plugins/css/error.css">
	
	
	<title>Registrar Producto</title>
</head>
<body>
	<?php include "views/includes/header.php"; ?>
	<section id="container">
		<div class="form_register">
        
            <h1>Registrar Producto</h1>
            <hr>
             <div class="alert"></div>
             <form name="myForm" action="<?=constant('URL')?>registro_producto/saveProduct" method="POST" enctype="multipart/form-data">
                <label for="codigo">Código:</label>
                <input type="text" name="codigo" id="codigo" placeholder="Ejemplo: P001" />
                <label for="producto">Producto</label>
                <input type="text" name="producto" id="producto" placeholder="Nombre del Producto" />
                <label for="descripcion">Descripcion</label>
                <textarea name="comentarios" rows="10%" cols="47%"></textarea>
                <label for="precio">Precio</label>
 
                <input type="number" name="precio" id="precio" placeholder="Precio del Producto" />
                <label for="cantidad">Cantidad</label>
                <input type="number" name="cantidad" id="cantidad" placeholder="Cantidad del producto" />
                <label for="foto">Imagen: </label>
                <input type="file" name="foto" id="foto" />
              
                <!--<div class="photo">
                    <label for="foto">Foto</label>
                    <div class="prevPhoto">
                        <span class="delPhoto notBlock">X</span>
                        <label for="foto"></label>
                    </div>
                    <div class="upimg">
                        <input type="file" name="foto" id="foto">
                    </div>
                    <div id="form_alert"></div>
                </div>-->


            
                <input type="submit" value="Crear Producto" class="btn_save">
                <div><span><?php $this->showMessages();?></span></div>
             </form>

             
        </div>
	</section>
	<?php include "views/includes/footer.php"; ?>
</body>
</html>