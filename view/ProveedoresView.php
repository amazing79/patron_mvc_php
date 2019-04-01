<?php
class ProveedoresView
{
    public function getVistaAltaProveedor($DESTINO)
    {
        ?>
        <h3>Agregar Proveedor</h3>
        <div class="container" >
            <form name="frmAlta" action="index.php?url=Proveedores&accion=<?php echo EnumAccion::Agregar(); ?>" method="post">
            <input type="hidden" name="hndId" value="-1" />
            <div class="form-group">  
                <label>Nombre Proveedor:</label>
                <input type="text" name="txtNombre" class="form-control" required="true" placeholder="Ingrese nombre"/>
            </div>
            <div class="form-group">  
                <label>Mail de contacto:</label>
                <input type="text" name="txtMail" class="form-control" required="true" placeholder="Ingrese Mail"/>
            </div>
            <div class="form-group">  
                <input type="submit"  class="btn btn-default" name="btnAgregar" value="Agregar" />
                <input type="button"  class="btn btn-primary" name="btnCancelar" value="Cancelar" onclick="history.go(-1)" />
            </div>
            </form>
        </div>
        <?php 
    }

    public function getVistaModificarProveedor($unProveedor)
    {
        ?>
        <h3>Editar Proveedor</h3>
        <div class="container" >
            <form name="frmEditar" action="index.php?url=Proveedores&accion=<?php echo EnumAccion::Modificar(); ?>" method="post">
            <input type="hidden" name="hndId" value="<?php echo $unProveedor->getIdProveedor()?>" />
            <div class="form-group">  
                <label>Nombre Proveedor:</label>
                <input type="text" class="form-control" name="txtNombre" value="<?php echo $unProveedor->getNombreProveedor() ?>" /> 
            </div>
            <div class="form-group">  
                <label>Mail de contacto:</label>
                <input type="text" class="form-control" name="txtMail" value="<?php echo $unProveedor->getMailContacto() ?>" /> 
            </div>
            <div class="form-group">  
            <input type="submit"  class="btn btn-default" name="btnModificar" value="Modificar" />
            <input type="button"  class="btn btn-primary" name="btnCancelar" value="Cancelar" onclick="history.go(-1)" />
            </div>
            </form>
        </div>
        <?php 
    }

    public function getVistaEliminarProveedor($unProveedor)
    {
        ?>
        <h3>Eliminar Proveedor</h3>
        <div class="container" >
        <form name="frmEliminar" action="index.php?url=Proveedores&accion=<?php echo EnumAccion::Eliminar(); ?>" method="post">
        <input type="hidden" name="hndId" value="<?php echo $unProveedor->getIdProveedor()?>" />
        <div class="form-group">  
            <label>Nombre Proveedor:</label>
            <input type="text" class="form-control" name="txtNombre" value="<?php echo $unProveedor->getNombreProveedor() ?>" /> 
        </div>
        <div class="form-group">  
            <label>Mail de contacto:</label>
            <input type="text" class="form-control" name="txtMail" value="<?php echo $unProveedor->getMailContacto() ?>" /> 
        </div>
        <div class="form-group">  
            <input type="submit"  class="btn btn-default" name="btnEliminar" value="Eliminar" />
            <input type="button"  class="btn btn-primary" name="btnCancelar" value="Cancelar" onclick="history.go(-1)" />
            </div>
        </form>
        </div>
        <?php 
    }

    public function getVistaProveedores ($lista_Proveedores)
    {
    ?>
        <h3>Listado de Proveedores</h3>
        <table  class="table table-hover">
        <thead>
				<tr>
					<th>Nombre Proveedor</th>
					<th>Mail Contacto</th>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
				</tr>
		</thead>
        <?php
            if(count($lista_Proveedores) > 0)
            {
                foreach($lista_Proveedores as $unProveedor)
                {
                    echo '<tr>';
                    echo '<td>' . $unProveedor->getNombreProveedor() . '</td>';
                    echo '<td>' . $unProveedor->getMailContacto() . '</td>';
                    echo '<td>' . $this->buttonEdition($unProveedor->getIdProveedor()) . '</td>';
                    echo '<td>' . $this->buttonDelete($unProveedor->getIdProveedor()) . '</td>';
                    echo '</tr>';
                }
            }
            else{
                echo '<tr><td colspan="4">Aun no se han cargado Datos! Pulse el boton para agregar alguno</td></tr>';
            }
        ?>
        </table>
        <form name="frmAlta" method="POST" action="index.php?url=Proveedores&accion=<?php echo EnumAccion::Mostrar_Agregar() ?>">
            <input type="Submit" class="btn btn-primary" name="btnAgregar" value="Agregar Proveedor" />
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
                echo '<p>Se ha dado de alta el Proveedor exitosamente!</p>'; 
            }
            else{
                echo '<p>Problemas al intentar dar de alta el Proveedor!</p>'; 
            }
            break;
            case EnumAccion::Modificar():
            if ($resu)
            {
                echo '<p>Se han actualizado los datos exitosamente!</p>'; 
            }
            else{
                echo '<p>Problemas al intentar actualizar el Proveedor!</p>'; 
            }
            break;
            case EnumAccion::Eliminar():
            if ($resu)
            {
                echo '<p>Se ha eliminado el Proveedor exitosamente!</p>'; 
            }
            else{
                echo '<p>Problemas al intentar dar de baja el Proveedor!</p>'; 
            }
            break;
            default:
            echo '<p>Operacion no admitida!</p>'; 
        }
        
        //echo '<a href="'. $_SERVER['PHP_SELF'] .'?url=Proveedores">Volver</a>';
        echo '</div>';
    }

    private function buttonEdition($id)
    {
        $html = '<form name="frmEditar_' .$id. '" action="index.php?url=Proveedores&accion='. EnumAccion::Mostrar_Editar(). '" method="POST" >';
        $html .= '<input type="hidden" name="hdn_key" value="'. $id .'" >';
        $html .= '<input type="Submit" class="btn btn-default" name="btnEditar" value="Editar Proveedor" >';
        $html .= '</form>';

        return $html;
    }

    private function buttonDelete($id)
    {
        $html = '<form name="frmEditar_' .$id. '" action="index.php?url=Proveedores&accion='. EnumAccion::Mostrar_Eliminar(). '" method="POST" >';
        $html .= '<input type="hidden" name="hdn_key" value="'. $id .'" >';
        $html .= '<input type="Submit" class="btn btn-default" name="btnEliminar" value="Eliminar Proveedor" >';
        $html .= '</form>';

        return $html;
    }

    public function getNombreArchivo ()
    {
        return basename( __FILE__ );
    }

}

?>