<?php
class ClientesView
{
    public function getVistaAltaCliente($DESTINO)
    {
        ?>
        <h3>Agregar Cliente</h3>
        <div class="container" >
            <form name="frmAlta" action="index.php?url=Clientes&accion=<?php echo EnumAccion::Agregar(); ?>" method="post">
            <input type="hidden" name="hndId" value="-1" />
            <div class="form-group">  
                <label>Apellidos:</label>
                <input type="text" name="txtApellido" class="form-control" required="true" placeholder="Ingrese Apellidos"/>
            </div>
            <div class="form-group">  
                <label>Nombres:</label>
                <input type="text" name="txtNombre" class="form-control" required="true" placeholder="Ingrese Nombres"/>
            </div>
            <div class="form-group">  
                <label>Dni:</label>
                <input type="text" name="txtDni" class="form-control" required="true" placeholder="Ingrese Dni"/>
            </div>
            <div class="form-group">  
                <label>Fecha Nacimiento</label>
                <input type="date" name="txtFechaNacimiento" class="form-control" required="true" placeholder="Ingrese fecha"/>
            </div>
            <div class="form-group">  
                <input type="submit"  class="btn btn-default" name="btnAgregar" value="Agregar" />
                <input type="button"  class="btn btn-primary" name="btnCancelar" value="Cancelar" onclick="history.go(-1)" />

               
            </div>
            </form>
        </div>
        <?php 
    }

    public function getVistaModificarCliente($unCliente)
    {
        ?>
        <h3>Editar Cliente</h3>
        <div class="container" >
            <form name="frmEditar" action="index.php?url=Clientes&accion=<?php echo EnumAccion::Modificar(); ?>" method="post">
            <input type="hidden" name="hndId" value="<?php echo $unCliente['idcliente'] ?>" />
            <div class="form-group">  
                <label>Apellidos:</label>
                <input type="text" class="form-control" required="true" name="txtApellido" value="<?php echo $unCliente['apellido'] ?>" /> 
            </div>
            <div class="form-group">  
                <label>Nombres:</label>
                <input type="text" class="form-control" required="true" name="txtNombre" value="<?php echo $unCliente['nombre'] ?>" /> 
            </div>
            <div class="form-group">  
                <label>Dni:</label>
                <input type="text" class="form-control" required="true" name="txtDni" value="<?php echo $unCliente['dni'] ?>" /> 
            </div>
            <div class="form-group">  
                <label>Fecha Nacimiento</label>
                <input type="date" class="form-control" required="true" name="txtFechaNacimiento" value="<?php echo date('Y-m-d', $unCliente['fecha_nacimiento']); ?>" />
            </div>
            <div class="form-group">  
            <input type="submit"  class="btn btn-default" name="btnModificar" value="Modificar" />
            <input type="button"  class="btn btn-primary" name="btnCancelar" value="Cancelar" onclick="history.go(-1)" />
            </div>
            </form>
        </div>
        <?php 
    }

    public function getVistaEliminarCliente($unCliente)
    {
        ?>
        <h3>Eliminar Cliente</h3>
        <div class="container" >
        <form name="frmEliminar" action="index.php?url=Clientes&accion=<?php echo EnumAccion::Eliminar(); ?>" method="post">
        <input type="hidden" name="hndId" value="<?php echo $unCliente['idcliente'] ?>" />
        <div class="form-group">  
            <label>Apellidos:</label>
            <input type="text" class="form-control" required="true" name="txtApellido" value="<?php echo $unCliente['apellido'] ?>" /> 
        </div>
        <div class="form-group">  
            <label>Nombres:</label>
            <input type="text" class="form-control" required="true" name="txtNombre" value="<?php echo $unCliente['nombre'] ?>" /> 
        </div>
        <div class="form-group">  
            <label>Dni:</label>
            <input type="text" class="form-control" required="true" name="txtDni" value="<?php echo $unCliente['dni'] ?>" /> 
        </div>
        <div class="form-group">  
            <label>Fecha Nacimiento</label>
            <input type="date" class="form-control" required="true" name="txtFechaNacimiento" value="<?php echo date('Y-m-d', $unCliente['fecha_nacimiento']); ?>" />
        </div>
        <div class="form-group">  
            <input type="submit"  class="btn btn-default" name="btnEliminar" value="Eliminar" />
            <input type="button"  class="btn btn-primary" name="btnCancelar" value="Cancelar" onclick="history.go(-1)" />
            </div>
        </form>
        </div>
        <?php 
    }

    public function getVistaClientes ($lista_Clientes)
    {
    ?>
        <h3>Listado de Clientes</h3>
        <table  class="table table-hover">
        <thead>
				<tr>
					<th>Apellidos</th>
					<th>Nombres</th>
					<th>dni</th>
                    <th>fecha Nacimiento</th>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
				</tr>
		</thead>
        <?php
            //se muestra la consulta
            if(count($lista_Clientes) > 0)
            {
                foreach($lista_Clientes as $unCliente)
                {
                    echo '<tr>';
                    echo '<td>' . $unCliente['apellido'] . '</td>';
                    echo '<td>' . $unCliente['nombre'] . '</td>';
                    echo '<td>' . $unCliente['dni'] . '</td>';
                    echo '<td>' . date('d/m/Y', $unCliente['fecha_nacimiento']) . '</td>';
                    echo '<td>' . $this->buttonEdition($unCliente['idcliente']) . '</td>';
                    echo '<td>' . $this->buttonDelete($unCliente['idcliente']) . '</td>';
                    echo '</tr>';
                }
            }
            else{
                echo '<tr><td colspan="6">Aun no se han cargado Datos! Pulse el boton para agregar alguno</td></tr>';
            }
        ?>
        </table>
        <form name="frmAlta" method="POST" action="index.php?url=Clientes&accion=<?php echo EnumAccion::Mostrar_Agregar() ?>">
            <input type="Submit" class="btn btn-primary" name="btnAgregar" value="Agregar Cliente" />
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
                echo '<p>Se ha dado de alta el Cliente exitosamente!</p>'; 
            }
            else{
                echo '<p>Problemas al intentar dar de alta el Cliente!</p>'; 
            }
            break;
            case EnumAccion::Modificar():
            if ($resu)
            {
                echo '<p>Se han actualizado los datos exitosamente!</p>'; 
            }
            else{
                echo '<p>Problemas al intentar actualizar el Cliente!</p>'; 
            }
            break;
            case EnumAccion::Eliminar():
            if ($resu)
            {
                echo '<p>Se ha eliminado el Cliente exitosamente!</p>'; 
            }
            else{
                echo '<p>Problemas al intentar dar de baja el Cliente!</p>'; 
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
        $html = '<form name="frmEditar_' .$id. '" action="index.php?url=Clientes&accion='. EnumAccion::Mostrar_Editar(). '" method="POST" >';
        $html .= '<input type="hidden" name="hdn_key" value="'. $id .'" >';
        $html .= '<input type="Submit" class="btn btn-default" name="btnEditar" value="Editar Cliente" >';
        $html .= '</form>';

        return $html;
    }

    private function buttonDelete($id)
    {
        $html = '<form name="frmEditar_' .$id. '" action="index.php?url=Clientes&accion='. EnumAccion::Mostrar_Eliminar(). '" method="POST" >';
        $html .= '<input type="hidden" name="hdn_key" value="'. $id .'" >';
        $html .= '<input type="Submit" class="btn btn-default" name="btnEliminar" value="Eliminar Cliente" >';
        $html .= '</form>';

        return $html;
    }

    public function getNombreArchivo ()
    {
        return basename( __FILE__ );
    }

}

?>