<?php
class ProveedorController
{
    private $proveedoresModel;
    private $proveedoresView;

    public function __construct ()
    {
        require_once('model/proveedores_model.php');
        require_once('view/ProveedoresView.php');
        require_once('dtos/ProveedoresDTO.php');

        $this->proveedoresModel = new ProveedoresModel();
        $this->proveedoresView = new ProveedoresView();

    }

    public function index($mostrar_alert = false, $resu = false, $accion = 0)
    {
       if($mostrar_alert)
       {
            $this->proveedoresView->getVistaResultado($resu, $accion);
       }
       $this->proveedoresView->getVistaProveedores($this->proveedoresModel->getProveedores());
    }

    public function cargarAlta()
    {
        $this->proveedoresView->getVistaAltaProveedor($_SERVER['PHP_SELF']);
    }
    
    public function cargarEdicion($data = 1)
    {
        $unProveedor = $this->proveedoresModel->getProveedorById($data['hdn_key']);
        $this->proveedoresView->getVistaModificarProveedor($unProveedor);

    }

    public function cargarEliminar($data = 1)
    {
        $unProveedor = $this->proveedoresModel->getProveedorById($data['hdn_key']);
        $this->proveedoresView->getVistaEliminarProveedor($unProveedor);

    }

    public function guardarDatos($unProveedor)
    {
        $resu = false;

        $resu = $this->proveedoresModel->dbAgregarUnProveedor($unProveedor);
        //$this->proveedoresView->getVistaResultado($resu, EnumAccion::Agregar());
        $this->index(true, $resu,EnumAccion::Agregar());
    }

    public function modificarDatos($unProveedor)
    {
        $resu = false;

        $resu = $this->proveedoresModel->dbModificarUnProveedor($unProveedor);
        //$this->proveedoresView->getVistaResultado($resu, EnumAccion::Modificar());
        $this->index(true, $resu,EnumAccion::Modificar());

    }

    public function eliminarDatos($unProveedor)
    {
        $resu = false;

        $resu = $this->proveedoresModel->dbEliminarUnProveedor($unProveedor);
        //$this->proveedoresView->getVistaResultado($resu, EnumAccion::Eliminar());
        $this->index(true, $resu,EnumAccion::Eliminar());

    }

    public funCtion cargarDatos($data)
    {
        $unProveedor = new ProveedoresDTO();
        if (isset($data['hndId']))
        {
            $unProveedor->setIdProveedor($data['hndId']);
        }
        
        $unProveedor->setNombreProveedor($data['txtNombre']);
        $unProveedor->setMailContacto($data['txtMail']);

        return $unProveedor;
    }
}
?>