<?php
class ClienteController
{
    private $clientesModel;
    private $clientesView;

    public function __construct ()
    {
        require_once('model/clientes_model.php');
        require_once('view/ClientesView.php');
        require_once('dtos/ClientesDTO.php');

        $this->clientesModel = new ClientesModel();
        $this->clientesView = new ClientesView();

    }

    public function index($mostrar_alert = false, $resu = false, $accion = 0)
    {
       if($mostrar_alert)
       {
            $this->clientesView->getVistaResultado($resu, $accion);
       }
       $this->clientesView->getVistaclientes($this->clientesModel->getclientes());
    }

    public function cargarAlta()
    {
        $this->clientesView->getVistaAltacliente($_SERVER['PHP_SELF']);
    }
    
    public function cargarEdicion($data = 1)
    {
        $uncliente = $this->clientesModel->getclienteById($data['hdn_key']);
        $this->clientesView->getVistaModificarcliente($uncliente);

    }

    public function cargarEliminar($data = 1)
    {
        $uncliente = $this->clientesModel->getclienteById($data['hdn_key']);
        $this->clientesView->getVistaEliminarcliente($uncliente);

    }

    public function guardarDatos($uncliente)
    {
        $resu = false;

        $resu = $this->clientesModel->dbAgregarUncliente($uncliente);
        //$this->clientesView->getVistaResultado($resu, EnumAccion::Agregar());
        $this->index(true, $resu,EnumAccion::Agregar());
    }

    public function modificarDatos($uncliente)
    {
        $resu = false;

        $resu = $this->clientesModel->dbModificarUncliente($uncliente);
        //$this->clientesView->getVistaResultado($resu, EnumAccion::Modificar());
        $this->index(true, $resu,EnumAccion::Modificar());

    }

    public function eliminarDatos($uncliente)
    {
        $resu = false;

        $resu = $this->clientesModel->dbEliminarUncliente($uncliente);
        //$this->clientesView->getVistaResultado($resu, EnumAccion::Eliminar());
        $this->index(true, $resu,EnumAccion::Eliminar());

    }

    public funCtion cargarDatos($data)
    {
        $uncliente = new ClientesDTO();
        if (isset($data['hndId']))
        {
            $uncliente->setIdCliente($data['hndId']);
        }
        
        $uncliente->setApellido($data['txtApellido']);
        $uncliente->setNombre($data['txtNombre']);
        $uncliente->setDni($data['txtDni']);
        $uncliente->setFechaNacimiento($data['txtFechaNacimiento']);

        return $uncliente;
    }
}
?>