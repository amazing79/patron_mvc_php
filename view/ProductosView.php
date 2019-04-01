<?php
class ProductosView
{
    public function getVistaAltaProducto($proveedores)
    {
        ?>
        <h3>Agregar &aacute;rticulo</h3>
        <div class="container" >
            <form name="frmAlta" action="index.php?url=Productos&accion=<?php echo EnumAccion::Agregar(); ?>" method="post">
            <input type="hidden" name="hndId" value="-1" />
            <div class="form-group">  
                <label>Nombre:</label>
                <input type="text" name="txtNombre" class="form-control" required="true" placeholder="Ingrese nombre"/>
            </div>
            <div class="form-group">  
                <label>Precio:</label>
                <input type="text" name="txtPrecio" class="form-control" required="true" placeholder="Ingrese precio"/>
            </div>
            <div class="form-group">  
                <label>Cantidad</label>
                <input type="text" name="txtCantidad" class="form-control" required="true" placeholder="Ingrese cantidad"/>
            </div>
            <div class="form-group">  
                <label>Seleccione Proveedor</label>
                <select name="cboProveedor" class="form-control">
                <?php
                foreach ($proveedores as $unProveedor)
                {
                    $html_cbo = '<option value="'.$unProveedor->getIdProveedor().'">'. $unProveedor->getNombreProveedor() . '</option>';
                    echo $html_cbo;
                }
                ?>
                </select>
            </div>
            <div class="form-group">  
                <input type="submit"  class="btn btn-default" name="btnAgregar" value="Agregar" />
                <input type="button"  class="btn btn-primary" name="btnCancelar" value="Cancelar" onclick="history.go(-1)" />
            </div>
            </form>
        </div>
        <?php 
    }

    public function getVistaModificarProducto($unProducto, $proveedores)
    {
        ?>
        <h3>Editar &aacute;rticulo</h3>
        <div class="container" >
            <form name="frmEditar" action="index.php?url=Productos&accion=<?php echo EnumAccion::Modificar(); ?>" method="post">
            <input type="hidden" name="hndId" value="<?php echo $unProducto->getIdProducto() ;?>" />
            <div class="form-group">  
                <label>Nombre:</label>
                <input type="text" class="form-control" required="true" name="txtNombre" value="<?php echo $unProducto->getNombre() ; ?>" /> 
            </div>
            <div class="form-group">  
                <label>Precio:</label>
                <input type="text" class="form-control" required="true" name="txtPrecio" value="<?php echo $unProducto->getPrecio() ; ?>" /> 
            </div>
            <div class="form-group">  
                <label>Cantidad</label>
                <input type="text" class="form-control" required="true" name="txtCantidad" value="<?php echo $unProducto->getCantidad() ; ?>" />
            </div>
            <div class="form-group">  
                <label>Seleccione Proveedor</label>
                <select name="cboProveedor" class="form-control">
                <?php
                foreach ($proveedores as $unProveedor)
                {
                    $es_activo = '';
                    if ($unProveedor->getIdProveedor() == $unProducto->getProveedor()->getIdProveedor())
                    {
                        $es_activo = 'selected="selected"';
                    }
                    $html_cbo = '<option value="'.$unProveedor->getIdProveedor().'" '. $es_activo . '>'. $unProveedor->getNombreProveedor() . '</option>';
                    echo $html_cbo;
                }
                ?>
                </select>
            </div>
            <div class="form-group">  
            <input type="submit"  class="btn btn-default" name="btnModificar" value="Modificar" />
            <input type="button"  class="btn btn-primary" name="btnCancelar" value="Cancelar" onclick="history.go(-1)" />
            </div>
            </form>
        </div>
        <?php 
    }

    public function getVistaEliminarProducto($unProducto, $proveedores)
    {
        ?>
        <h3>Eliminar &aacute;rticulo</h3>
        <div class="container" >
        <form name="frmEliminar" action="index.php?url=Productos&accion=<?php echo EnumAccion::Eliminar(); ?>" method="post">
        <input type="hidden" name="hndId" value="<?php echo $unProducto->getIdProducto() ;?>" />
        <div class="form-group">  
            <label>Nombre:</label>
            <input type="text" class="form-control" required="true" name="txtNombre" value="<?php echo $unProducto->getNombre() ; ?>" /> 
        </div>
        <div class="form-group">  
            <label>Precio:</label>
            <input type="text" class="form-control" required="true" name="txtPrecio" value="<?php echo $unProducto->getPrecio() ; ?>" /> 
        </div>
        <div class="form-group">  
            <label>Cantidad</label>
            <input type="text" class="form-control" required="true" name="txtCantidad" value="<?php echo $unProducto->getCantidad() ; ?>" />
        </div>
        <div class="form-group">  
                <label>Seleccione Proveedor</label>
                <select name="cboProveedor" class="form-control">
                <?php
                foreach ($proveedores as $unProveedor)
                {
                    $es_activo = '';
                    if ($unProveedor->getIdProveedor() == $unProducto->getProveedor()->getIdProveedor())
                    {
                        $es_activo = 'selected="selected"';
                    }
                    $html_cbo = '<option value="'.$unProveedor->getIdProveedor().'" '. $es_activo . '>'. $unProveedor->getNombreProveedor() . '</option>';
                    echo $html_cbo;
                }
                ?>
                </select>
            </div>
        <div class="form-group">  
            <input type="submit"  class="btn btn-default" name="btnEliminar" value="Eliminar" />
            <input type="button"  class="btn btn-primary" name="btnCancelar" value="Cancelar" onclick="history.go(-1)" />
            </div>
        </form>
        </div>
        <?php 
    }

    public function getVistaProductos ($lista_productos)
    {
    ?>
        <h3>Listado de Productos</h3>
        <table  class="table table-hover">
        <thead>
				<tr>
					<th>Nombre Producto</th>
					<th>Precio</th>
                    <th>Cantidad</th>
                    <th>Proveedor</th>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
				</tr>
		</thead>
        <?php
            if(count($lista_productos) > 0)
            {
                foreach($lista_productos as $unProducto)
                {
                    echo '<tr>';
                    echo '<td>' . $unProducto['nombre'] . '</td>';
                    echo '<td>$' . $unProducto['precio'] . '</td>';
                    echo '<td>' . $unProducto['cantidad'] . '</td>';
                    echo '<td>' . $unProducto['nombre_proveedor'] . '</td>';
                    echo '<td>' . $this->buttonEdition($unProducto['idProducto']) . '</td>';
                    echo '<td>' . $this->buttonDelete($unProducto['idProducto']) . '</td>';
                    echo '</tr>';
                }
            }
            else{
                echo '<tr><td colspan="6">Aun no se han cargado Datos! Pulse el boton para agregar alguno</td></tr>';
            }
        ?>
        </table>
        <form name="frmAlta" method="POST" action="index.php?url=Productos&accion=<?php echo EnumAccion::Mostrar_Agregar() ?>">
            <input type="Submit" class="btn btn-primary" name="btnAgregar" value="Agregar Producto" />
        </form>
        <?php
    }

    public function getVistaResultado ($resu, $accion_actual)
    {
        if ($resu)
        {
            echo '<div class="alert alert-success" role="alert">';
        }
        else 
        {
            echo '<div class="alert alert-danger" role="alert">';
        }

        echo '<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>';
        
        echo '<h3>Resultado de la Operaci&oacute;n</h3>';
       
        switch($accion_actual)
        {
            case EnumAccion::Agregar():
            if ($resu)
            {
                echo '<p>Se ha dado de alta el producto exitosamente!</p>'; 
            }
            else{
                echo '<p>Problemas al intentar dar de alta el producto!</p>'; 
            }
            break;
            case EnumAccion::Modificar():
            if ($resu)
            {
                echo '<p>Se han actualizado los datos exitosamente!</p>'; 
            }
            else{
                echo '<p>Problemas al intentar actualizar el producto!</p>'; 
            }
            break;
            case EnumAccion::Eliminar():
            if ($resu)
            {
                echo '<p>Se ha eliminado el producto exitosamente!</p>'; 
            }
            else{
                echo '<p>Problemas al intentar dar de baja el producto!</p>'; 
            }
            break;
            default:
            echo '<p>Operacion no admitida!</p>'; 
        }
        
       //echo '<a href="'. $_SERVER['PHP_SELF'] .'?url=Clientes">Volver</a>';
       echo '</div>';
    }

    private function buttonEdition($id)
    {
        $html = '<form name="frmEditar_' .$id. '" action="index.php?url=Productos&accion='. EnumAccion::Mostrar_Editar(). '" method="POST" >';
        $html .= '<input type="hidden" name="hdn_key" value="'. $id .'" >';
        $html .= '<input type="Submit" class="btn btn-default" name="btnEditar" value="Editar Articulo" >';
        $html .= '</form>';

        return $html;
    }

    private function buttonDelete($id)
    {
        $html = '<form name="frmEditar_' .$id. '" action="index.php?url=Productos&accion='. EnumAccion::Mostrar_Eliminar(). '" method="POST" >';
        $html .= '<input type="hidden" name="hdn_key" value="'. $id .'" >';
        $html .= '<input type="Submit" class="btn btn-default" name="btnEliminar" value="Eliminar Articulo" >';
        $html .= '</form>';

        return $html;
    }

    public function getNombreArchivo ()
    {
        return basename( __FILE__ );
    }

}

?>