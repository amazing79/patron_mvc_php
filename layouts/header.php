
<div class="navbar-fixed">
<nav>
	<div class="nav-wrapper blue-grey darken-3">
					
		<a class="brand-logo center" href="index.php">
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
			<li>
				<a href="validator.php">Cerrar Sesion</a>
			<!--
			<form id="frmLogin" name="frmLogin" method="post" action="validator.php" class="col">
                    <input type="hidden" name="hdn_user" value=""/>
                    <input type="submit" name="btnCerrar" value="Cerrar Sesion">
                </form>
			-->
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
	<li><a href="validator.php">Cerrar Sesion</a></li>
</ul>

<script>
	document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems, {});
  });
</script>