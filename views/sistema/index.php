<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "views/includes/scripts.php"; ?>
	
	
	<title>Sistema Ventas</title>
</head>
<body>
	<?php include "views/includes/header.php"; ?>
	<section id="container">
		<h1>Bienvenido al sistema <?php print_r($this->data['username']);?></h1>
	</section>
	<?php include "views/includes/footer.php"; ?>
</body>
</html>