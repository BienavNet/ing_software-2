<?php require_once 'core/view.php' ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"><?php include "views/includes/scripts.php"; ?>
	
	
	<title>Lista de Productos</title>
</head>
<body>
    <?php include "views/includes/header.php"; ?>
	<section id="container">
    
        <h1>Lista de productos</h1>
        <div class="row d-flex justify-content-center"><div class="col-6"><?php $this->showMessages();?></div></div>
        <table class="table table-sm table-bordered table-hover">

        <tr>
            <th scope="col" class="text-center">Código</th>
            <th scope="col" class="text-center">Nombre</th>
            <th scope="col" class="text-center">Descripción</th>
            <th scope="col" class="text-center">Precio</th>
            <th scope="col" class="text-center">Cantidad</th>
            <th scope="col" class="text-center">Fotos</th>
            <th scope="col" class="text-center">Acciones    </th>
        </tr>

        <?php
            for ($i=0; $i < count($this->data['products']); $i++) { 
                echo $this->data['products'][$i];
            }
        ?>

        </table>

	</section>

    <div class="row h-25 m-5">
        <div class="results alert alert-success p-auto d-none"><?=$this->showMessages();?></div>
    </div>




    <div class="modal fade" id="editing-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modificar producto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?=constant('URL')?>modificar_producto/modifyProduct" method="POST" enctype="multipart/form-data">

          <div class="form-group">
              <input type="hidden" class="form-control" id="product_id" name="product_id" />
            </div>

            <div class="row">
              <div class="form-group w-100">
                <label for="product_name" class="">Nombre: </label>
                <input type="text" class="form-control" id="product_name" name="product_name" />
              </div>
            </div>

            <div class="row">
              <div class="form-group w-100">
                <label for="product_description" class="">Descripción: </label>
                <textarea name="product_description" id="product_description" class="form-control w-100" rows="10"></textarea>
              </div>
            </div>

            <div class="row">
              <div class="form-group w-100">
                <label for="product_price" class="">Precio: </label>
                <input type="text" class="form-control" id="product_price" name="product_price" value="" />
              </div>
            </div>

            <div class="row">
              <div class="form-group w-100">
                <label for="product_amount" class="">Cantidad: </label>
                <input type="text" class="form-control" id="product_amount" name="product_amount" value="" />
              </div>
            </div>

            <div class="row">
              <div class="form-group w-100">
                <label for="foto">Imagen: </label>
                <input type="file" name="foto" id="foto" />
                <input type="hidden" id="first_photo" value="">
              </div>
            </div>

            

            
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </div>

        </form>
      </div>
    </div>
  </div>


  <div class="modal fade" tabindex="-1" role="dialog" id="delete-modal">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Eliminar Producto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>¿Estás seguro de que quieres eliminar este producto?</p>
        </div>
        <div class="modal-footer">
          <a href="<?=constant('URL')?>eliminar_producto/deleteProduct?product_id=" class="btn btn-danger" id="delete">Si, eliminar</a>
          <button type="button" class="btn btn-success" data-dismiss="modal">No, cancelar.</button>
        </div>
      </div>
    </div>
  </div>


  <script src="<?=constant('URL')?>plugins/js/modify.js"></script>
  <script src="<?=constant('URL')?>plugins/js/delete.js"></script>

	<?php include "views/includes/footer.php"; ?>
</body>
</html>