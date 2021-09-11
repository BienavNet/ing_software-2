<?php require_once 'views/header.php'; ?>

<div class="container ">
    <!--navbar-->
    <div class="row  alert alert-success">
        <div class="col-10"><h3>Bienvenido <?php $this->data['name'];?> al panel Dashboard</h3></div>
        <p>
            Aquí mostraremos todo lo relacionado con el usuario como: 
            - pedidos
            - estados
            - compras
            - entre otras cosas
        </p>
    </div>

</div>

<?php require_once 'views/footer.php'; ?>