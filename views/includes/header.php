

<header>
		<div class="header">
			
			<h1>Sistema Facturación</h1>
			<div class="optionsBar">
				<p>Colombia, <?php echo fechaC(); ?> </p>
				<span>|</span>
				<span class="user"><?php $this->data['username'];?></span>
				<img class="photouser" src="plugins/img/user.png" alt="Usuario">
				<a href="<?=constant('URL')?>sistema/logOut"><img class="close" src="<?=constant('URL')?>plugins/img/salir.png" alt="Salir del sistema" title="Salir"></a>
			</div>
		</div>
		<?php include "nav.php"; ?>
	</header>