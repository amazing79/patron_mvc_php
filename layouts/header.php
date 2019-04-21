
<div class="navbar-fixed">
<nav>
	<div class="nav-wrapper">
					
		<a class="brand-logo center" href="http://localhost/m_apptienda/">
		AppTienda<i class="material-icons">cloud</i>
		</a>
		<!-- Icon que mostrara cuando entre con un celu -->
		<a href="#" data-target="menu-movil" class="sidenav-trigger"><i class="material-icons">menu</i></a>	
		<ul id="nav-mobile" class="right hide-on-med-and-down">
			<li>
				<a href="index.php?url=Productos">Productos</a>
			</li>
			<li>
				<a href="index.php?url=Clientes">Clientes</a>
			</li>
			<li>
				<a href="index.php?url=Proveedores">Proveedores</a>
			</li>
		</ul>
	</div>
</nav>
</div>
<!-- Seccion para mostrar cuando detecte que es un dispositivo movil -->
<ul class="sidenav" id="menu-movil">
    <li><a href="index.php?url=Productos">Productos</a></li>
    <li><a href="index.php?url=Clientes">Clientes</a></li>
    <li><a href="index.php?url=Proveedores">Proveedores</a></li>
</ul>

<script>
	document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems, {});
  });
</script>