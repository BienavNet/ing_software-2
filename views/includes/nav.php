<nav>
			<ul>
				<li><a href="#">Inicio</a></li>
				<li class="principal">
					<a href="#">Clientes</a>
					<ul>
						<li><a href="<?=constant('URL')?>listar_cliente/getClientes">Ver Clientes</a></li>
					</ul>
				</li>
	
				<li class="principal">
					<a href="#">Proveedores</a>
					<ul>
						<li><a href="#">Nuevo Proveedor</a></li>
						<li><a href="#">Lista de Proveedores</a></li>
					</ul>
				</li>
				<li class="principal">
					<a href="#">Productos</a>
					<ul>
						<li><a href="<?=constant('URL')?>registro_producto">Nuevo Producto</a></li>
						<li><a href="<?=constant('URL')?>listar_producto/getProducts">Ver Productos</a></li>
					</ul>
				</li>
				<li class="principal">
					<a href="#">Facturas</a>
					<ul>
						<li><a href="#">Nuevo Factura</a></li>
						<li><a href="#">Facturas</a></li>
					</ul>
				</li>
			</ul>
		</nav>