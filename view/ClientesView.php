<?php
class ClientesView
{
    public function getVistaAltaCliente($DESTINO)
    {
        ?>
        <h3>Agregar Cliente</h3>
        <div class="row" >
            <form class="col s12" name="frmAlta" action="index.php?url=Clientes&accion=<?php echo EnumAccion::Agregar(); ?>" method="post">
            <input type="hidden" name="hndId" value="-1" />
            <div class="input-field col s12">  
                <input type="text" id="apellido" name="txtApellido" class="validate" required="true" placeholder="Ingrese Apellidos"/>
                <label for="apellido">Apellidos:</label>
            </div>
            <div class="input-field col s12">  
                <input id="nombre" type="text" name="txtNombre" class="input-field" required="true" placeholder="Ingrese Nombres"/>
                <label for="nombre">Nombres:</label>
            </div>
            <div class="input-field col s12">  
                <input id="dni" type="text" name="txtDni" class="input-field" required="true" placeholder="Ingrese Dni"/>
                <label for="dni">Dni:</label>
            </div>
            <div class="input-field col s12">  
                <input id="fechaNacimiento" type="date" name="txtFechaNacimiento" class="input-field" required="true" placeholder="Ingrese fecha"/>
                <label for="fechaNacimiento">Fecha Nacimiento</label>
            </div>
            <div class="input-field col 12">  
                <input type="submit"  class="waves-effect waves-light btn" name="btnAgregar" value="Agregar" />
                <input type="button"  class="waves-effect waves-light btn" name="btnCancelar" value="Cancelar" onclick="history.go(-1)" />
            </div>
            </form>
        </div>
        <?php 
    }

    public function getVistaModificarCliente($unCliente)
    {
        ?>
        <h3>Editar Cliente</h3>
        <div class="row" >
            <form class="col s12" name="frmEditar" action="index.php?url=Clientes&accion=<?php echo EnumAccion::Modificar(); ?>" method="post">
            <input type="hidden" name="hndId" value="<?php echo $unCliente['idcliente'] ?>" />
            <div class="input-field col s12">  
                <input type="text" id="apellido" name="txtApellido" class="validate" required="true" value="<?php echo $unCliente['apellido'] ?>"/>
                <label for="apellido">Apellidos:</label>
            </div>
            <div class="input-field col s12">  
                <input id="nombre" type="text" name="txtNombre" class="input-field" required="true" value="<?php echo $unCliente['nombre'] ?>"/>
                <label for="nombre">Nombres:</label>
            </div>
            <div class="input-field col s12">  
                <input id="dni" type="text" name="txtDni" class="input-field" required="true"value="<?php echo $unCliente['dni'] ?>"/>
                <label for="dni">Dni:</label>
            </div>
            <div class="input-field col s12">  
                <input id="fechaNacimiento" type="date" name="txtFechaNacimiento" class="input-field" required="true" value="<?php echo date('Y-m-d', $unCliente['fecha_nacimiento']); ?>"/>
                <label for="fechaNacimiento">Fecha Nacimiento</label>
            </div>
            <div class="input-field col 12">  
            <input type="submit"  class="waves-effect waves-light btn" name="btnModificar" value="Modificar" />
            <input type="button"  class="waves-effect waves-light btn" name="btnCancelar" value="Cancelar" onclick="history.go(-1)" />
            </div>
            </form>
        </div>
        <?php 
    }

    public function getVistaEliminarCliente($unCliente)
    {
        ?>
        <h3>Eliminar Cliente</h3>
        <div class="row" >
        <form class="col s12" name="frmEliminar" action="index.php?url=Clientes&accion=<?php echo EnumAccion::Eliminar(); ?>" method="post">
        <input type="hidden" name="hndId" value="<?php echo $unCliente['idcliente'] ?>" />
        <div class="input-field col s12">  
            <input type="text" id="apellido" name="txtApellido" class="validate" required="true" value="<?php echo $unCliente['apellido'] ?>"/>
            <label for="apellido">Apellidos:</label>
        </div>
        <div class="input-field col s12">  
            <input id="nombre" type="text" name="txtNombre" class="input-field" required="true" value="<?php echo $unCliente['nombre'] ?>"/>
            <label for="nombre">Nombres:</label>
        </div>
        <div class="input-field col s12">  
            <input id="dni" type="text" name="txtDni" class="input-field" required="true"value="<?php echo $unCliente['dni'] ?>"/>
            <label for="dni">Dni:</label>
        </div>
        <div class="input-field col s12">  
            <input id="fechaNacimiento" type="date" name="txtFechaNacimiento" class="input-field" required="true" value="<?php echo date('Y-m-d', $unCliente['fecha_nacimiento']); ?>"/>
            <label for="fechaNacimiento">Fecha Nacimiento</label>
        </div>
        <div class="input-field col 12">  
            <input type="submit"  class="waves-effect waves-light btn" name="btnModificar" value="Eliminar" />
            <input type="button"  class="waves-effect waves-light btn" name="btnCancelar" value="Cancelar" onclick="history.go(-1)" />
        </div>
        </form>
        </div>
        <?php 
    }

    public function getVistaClientes ($lista_Clientes)
    {
    ?>
        <h3>Listado de Clientes</h3>
        <table class="responsive-table">
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
        <tbody>
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
        </tbody>
        </table>
        <br />
        <form name="frmAlta" method="POST" action="index.php?url=Clientes&accion=<?php echo EnumAccion::Mostrar_Agregar() ?>">
            <input type="Submit" class="btn light-blue darken-1" name="btnAgregar" value="Agregar Cliente" />
        </form>
        <br />
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
                $html_out .= 'Se ha dado de alta el Cliente exitosamente!'; 
            }
            else{
                $html_out .= 'Problemas al intentar dar de alta el Cliente!'; 
            }
            break;
            case EnumAccion::Modificar():
            if ($resu)
            {
                $html_out .= 'Se han actualizado los datos del Cliente exitosamente!'; 
            }
            else{
                $html_out .= 'Problemas al intentar actualizar el Cliente!'; 
            }
            break;
            case EnumAccion::Eliminar():
            if ($resu)
            {
                $html_out .= 'Se ha eliminado el Cliente exitosamente!'; 
            }
            else{
                $html_out .= 'Problemas al intentar dar de baja el Cliente!'; 
            }
            break;
            default:
            $html_out .='Operacion no admitida!'; 
        }
        echo '<div class="chip">';
        echo $html_out;
        echo '<i class="close material-icons">close</i>';
        echo '</div>';
        
    }

    private function buttonEdition($id)
    {
        $html = '<form name="frmEditar_' .$id. '" action="index.php?url=Clientes&accion='. EnumAccion::Mostrar_Editar(). '" method="POST" >';
        $html .= '<input type="hidden" name="hdn_key" value="'. $id .'" >';
        $html .= '<input type="Submit" class="btn" name="btnEditar" value="Editar Cliente" >';
        $html .= '</form>';

        return $html;
    }

    private function buttonDelete($id)
    {
        $html = '<form name="frmEditar_' .$id. '" action="index.php?url=Clientes&accion='. EnumAccion::Mostrar_Eliminar(). '" method="POST" >';
        $html .= '<input type="hidden" name="hdn_key" value="'. $id .'" >';
        $html .= '<input type="Submit" class="btn waves-effect green lighten-1 white-text" name="btnEliminar" value="Eliminar Cliente" >';
        $html .= '</form>';

        return $html;
    }

    public function getNombreArchivo ()
    {
        return basename( __FILE__ );
    }

}

?>