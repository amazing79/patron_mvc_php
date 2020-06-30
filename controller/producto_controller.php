<?php
class ProductoController
{
    private $productosModel;
    private $productosView;
    private $proveedoresModel;

    public function __construct ()
    {
        require_once('model/productos_model.php');
        require_once('model/proveedores_model.php');
        require_once('view/ProductosView.php');
        require_once('dtos/ProductosDTO.php');
        require_once('dtos/ProveedoresDTO.php');

        $this->productosModel = new ProductosModel();
        $this->proveedoresModel = new ProveedoresModel();
        $this->productosView = new ProductosView();

    }

    public function index($mostrar_alert = false, $resu = false, $accion = 0)
    {
        //obtiene el total de elementos productos, el cual luego se usará para armar el paginado
        $total_elementos = $this->productosModel->getTotal();
        //indice para el paginado. indicará tambien desde que posicion arrancar la búsqueda
        $indice = (isset ($_REQUEST['actual']) && $_REQUEST['actual'] != 0) ? $_REQUEST['actual'] : 1;
        //cuantos elmenentos mostrará la vista, si fuera mayor al total, requiere paginado
        $nro_per_page = $this->productosView->getTotalPerPage();
        
        if($mostrar_alert)
        {
             $this->productosView->getVistaResultado($resu, $accion);
        } 
       $this->productosView->getVistaProductos($this->productosModel->getProductos($indice, $nro_per_page), $indice, $total_elementos);
    }

    public function cargarAlta()
    {
        $this->productosView->getVistaAltaProducto($this->proveedoresModel->getProveedores());
    }
    
    public function cargarEdicion($data = 1)
    {
        $unProducto = $this->productosModel->getProductoById($data['hdn_key']);
        $this->productosView->getVistaModificarProducto($unProducto, $this->proveedoresModel->getProveedores());

    }

    public function cargarEliminar($data = 1)
    {
        $unProducto = $this->productosModel->getProductoById($data['hdn_key']);
        $this->productosView->getVistaEliminarProducto($unProducto, $this->proveedoresModel->getProveedores());

    }

    public function guardarDatos($unProducto)
    {
        $resu = false;

        $resu = $this->productosModel->dbAgregarUnProducto($unProducto);
        //$this->productosView->getVistaResultado($resu, EnumAccion::Agregar());
        $this->index(true, $resu,EnumAccion::Agregar());

    }

    public function modificarDatos($unProducto)
    {
        $resu = false;

        $resu = $this->productosModel->dbModificarUnProducto($unProducto);
        //$this->productosView->getVistaResultado($resu, EnumAccion::Modificar());
        $this->index(true, $resu,EnumAccion::Modificar());

    }

    public function eliminarDatos($unProducto)
    {
        $resu = false;

        $resu = $this->productosModel->dbEliminarUnProducto($unProducto);
        //$this->productosView->getVistaResultado($resu, EnumAccion::Eliminar());
        $this->index(true, $resu,EnumAccion::Eliminar());

    }

    public funCtion cargarDatos($data)
    {
        $unProducto = new ProductosDTO();
        $unProveedor = new ProveedoresDTO();

        $unProducto->setProveedor($unProveedor);
        if (isset($data['hndId']))
        {
            $unProducto->setIdProducto($data['hndId']);
        }
        
        $unProducto->setNombre($data['txtNombre']);
        $unProducto->setPrecio($data['txtPrecio']);
        $unProducto->setCantidad($data['txtCantidad']);
        $unProducto->getProveedor()->setIdProveedor($data['cboProveedor']);

        return $unProducto;
    }
}
?>