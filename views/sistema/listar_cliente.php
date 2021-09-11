<?php require_once 'core/view.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"><?php include "views/includes/scripts.php"; ?>
	
	
	<title>Lista de Clientes</title>
</head>
<body>
    <?php include "views/includes/header.php"; ?>
	<section id="container">
    
        <h1>Lista de Clientes</h1>
        <table class="table table-sm table-bordered table-hover">

        <tr>
            <th scope="col" class="text-center">Código</th>
            <th scope="col" class="text-center">Nombres</th>
            <th scope="col" class="text-center">Apellidos</th>
            <th scope="col" class="text-center">Usuario</th>
            <th scope="col" class="text-center">Email</th>
            <th scope="col" class="text-center">Telefono</th>
        </tr>

        <?php
            for ($i=0; $i < count($this->data['clientes']); $i++) { 
                echo $this->data['clientes'][$i];
            }
        ?>

        </table>

	</section>

    <!-- <div class="row h-25 m-5">
        <div class="results alert alert-success p-auto d-none"><?=$this->showMessages();?></div>
    </div> -->

  <!-- <div class="modal fade" tabindex="-1" role="dialog" id="delete-modal">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Eliminar Cliente</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>¿Estás seguro de que quieres eliminar este cliente?</p>
        </div>
        <div class="modal-footer">
          <a href="<?=constant('URL')?>eliminar_producto/deleteProduct?product_id=" class="btn btn-danger" id="delete">Si, eliminar</a>
          <button type="button" class="btn btn-success" data-dismiss="modal">No, cancelar.</button>
        </div>
      </div>
    </div>
  </div> -->


  <script src="<?=constant('URL')?>plugins/js/modify.js"></script>
  <script src="<?=constant('URL')?>plugins/js/delete.js"></script>

	<?php include "views/includes/footer.php"; ?>
</body>
</html>