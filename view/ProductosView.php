<?php
class ProductosView
{
    public function getVistaAltaProducto($proveedores)
    {
        ?>
        <h3>Agregar &aacute;rticulo</h3>
        <div class="row" >
            <form  class="col s12"  name="frmAlta" action="index.php?url=Productos&accion=<?php echo EnumAccion::Agregar(); ?>" method="post">
            <input type="hidden" name="hndId" value="-1" />
            <div class="input-field col s12">  
                <input id="nombre" type="text" name="txtNombre" required="true" placeholder="Ingrese nombre"/>
                <label for="nombre">Nombre:</label>
            </div>
            <div class="input-field col s12">  
                <input id="precio" type="text" name="txtPrecio" required="true" placeholder="Ingrese precio"/>
                <label for="precio">Precio:</label>
            </div>
            <div class="input-field col s12"> 
                <input id="cantidad" type="text" name="txtCantidad" required="true" placeholder="Ingrese cantidad"/>
                <label for="cantidad">Cantidad</label>
            </div>
            <div class="input-field col s12">  
                
                <select name="cboProveedor">
                <?php
                foreach ($proveedores as $unProveedor)
                {
                    $html_cbo = '<option value="'.$unProveedor->getIdProveedor().'">'. $unProveedor->getNombreProveedor() . '</option>';
                    echo $html_cbo;
                }
                ?>
                </select>
                <label>Seleccione Proveedor</label>
            </div>
            <div class="input-field col s12"> 
                <input type="submit"  class="btn" name="btnAgregar" value="Agregar" />
                <input type="button"  class="btn" name="btnCancelar" value="Cancelar" onclick="history.go(-1)" />
            </div>
            </form>
        </div>
        <?php 
        $this->inicializarSelect();
    }

    public function getVistaModificarProducto($unProducto, $proveedores)
    {
        ?>
        <h3>Editar &aacute;rticulo</h3>
        <div class="row" >
            <form class="col s12" name="frmEditar" action="index.php?url=Productos&accion=<?php echo EnumAccion::Modificar(); ?>" method="post">
            <input type="hidden" name="hndId" value="<?php echo $unProducto->getIdProducto() ;?>" />
            <div class="input-field col s12">  
                <input id="nombre" type="text" required="true" name="txtNombre" value="<?php echo $unProducto->getNombre() ; ?>" /> 
                <label for="nombre">Nombre:</label>
            </div>
            <div class="input-field col s12">  
                <input type="text" required="true" name="txtPrecio" value="<?php echo $unProducto->getPrecio() ; ?>" /> 
                <label for="txtPrecio">Precio:</label>
            </div>
            <div class="input-field col s12">                  
                <input type="text" required="true" name="txtCantidad" value="<?php echo $unProducto->getCantidad() ; ?>" />
                <label for="txtCantidad">Cantidad</label>
            </div>
            <div class="input-field col s12"> 
                <select name="cboProveedor">
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
                <label for="cboProveedor">Seleccione Proveedor</label>
            </div>
            <div class="input-field col s12">  
            <input type="submit"  class="btn btn-default" name="btnModificar" value="Modificar" />
            <input type="button"  class="btn btn-primary" name="btnCancelar" value="Cancelar" onclick="history.go(-1)" />
            </div>
            </form>
        </div>
        <?php 
         $this->inicializarSelect();
    }

    public function getVistaEliminarProducto($unProducto, $proveedores)
    {
        ?>
        <h3>Eliminar &aacute;rticulo</h3>
        <div class="row" >
        <form class="col s12" name="frmEliminar" action="index.php?url=Productos&accion=<?php echo EnumAccion::Eliminar(); ?>" method="post">
        <input type="hidden" name="hndId" value="<?php echo $unProducto->getIdProducto() ;?>" />
            <div class="input-field col s12">  
                <input id="nombre" type="text" required="true" name="txtNombre" value="<?php echo $unProducto->getNombre() ; ?>" /> 
                <label for="nombre">Nombre:</label>
            </div>
            <div class="input-field col s12">  
                <input type="text" required="true" name="txtPrecio" value="<?php echo $unProducto->getPrecio() ; ?>" /> 
                <label for="txtPrecio">Precio:</label>
            </div>
            <div class="input-field col s12">                  
                <input type="text" required="true" name="txtCantidad" value="<?php echo $unProducto->getCantidad() ; ?>" />
                <label for="txtCantidad">Cantidad</label>
            </div>
        <div class="input-field col s12">  
                <label>Seleccione Proveedor</label>
                <select name="cboProveedor">
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
        <div class="input-field col s12">  
            <input type="submit"  class="btn" name="btnEliminar" value="Eliminar" />
            <input type="button"  class="btn" name="btnCancelar" value="Cancelar" onclick="history.go(-1)" />
            </div>
        </form>
        </div>
        <?php
         $this->inicializarSelect(); 
    }

    public function getVistaProductos ($lista_productos)
    {
    ?>
        <h3>Listado de Productos</h3>
        <table  class="responsive-table">
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
        <tbody>
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
        </tbody>
        </table>
        <form name="frmAlta" method="POST" action="index.php?url=Productos&accion=<?php echo EnumAccion::Mostrar_Agregar() ?>">
            <input type="Submit" class="btn btn-primary" name="btnAgregar" value="Agregar Producto" />
        </form>
        <?php
    }

    public function getVistaResultado ($resu, $accion_actual)
    {
        if($resu)
        {
            $html_out = '<img src="assets/img/confirm.png"/>';
        }
        else
        {
            $html_out = '<img src="assets/img/error.png"/>';
        }
        $html_out .= 'Resultado de la Operaci&oacute;n = ';
       
        switch($accion_actual)
        {
            case EnumAccion::Agregar():
            if ($resu)
            {
                $html_out .= 'Se ha dado de alta el producto exitosamente!'; 
            }
            else{
                $html_out .= 'Problemas al intentar dar de alta el producto!'; 
            }
            break;
            case EnumAccion::Modificar():
            if ($resu)
            {
                $html_out .= 'Se han actualizado los datos exitosamente!'; 
            }
            else{
                $html_out .= 'Problemas al intentar actualizar el producto!'; 
            }
            break;
            case EnumAccion::Eliminar():
            if ($resu)
            {
                $html_out .= 'Se ha eliminado el producto exitosamente!'; 
            }
            else{
                $html_out .= 'Problemas al intentar dar de baja el producto!'; 
            }
            break;
            default:
            $html_out .= 'Operacion no admitida!'; 
        }
        
        echo '<div class="chip">';
        echo $html_out;
        echo '<i class="close material-icons">close</i>';
        echo '</div>';
    }

    private function buttonEdition($id)
    {
        $html = '<form name="frmEditar_' .$id. '" action="index.php?url=Productos&accion='. EnumAccion::Mostrar_Editar(). '" method="POST" >';
        $html .= '<input type="hidden" name="hdn_key" value="'. $id .'" >';
        $html .= '<input type="Submit" class="btn" name="btnEditar" value="Editar Articulo" >';
        $html .= '</form>';

        return $html;
    }

    private function buttonDelete($id)
    {
        $html = '<form name="frmEditar_' .$id. '" action="index.php?url=Productos&accion='. EnumAccion::Mostrar_Eliminar(). '" method="POST" >';
        $html .= '<input type="hidden" name="hdn_key" value="'. $id .'" >';
        $html .= '<input type="Submit" class="btn" name="btnEliminar" value="Eliminar Articulo" >';
        $html .= '</form>';

        return $html;
    }

    public function getNombreArchivo ()
    {
        return basename( __FILE__ );
    }

    private function inicializarSelect ()
    {
        //este codigo es requerido por materialize, para que muestre los selects tuneas
        echo "
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems, {});
          });
        </script>
        ";
    }

}

?>