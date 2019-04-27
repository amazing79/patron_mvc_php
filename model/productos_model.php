<?php
    class ProductosModel{
        
        private $db;

        public function __construct (){
                require_once('model/conexion.php');
                $this->db = conexion::conectar();
        }

        public function getProductos($indice=0, $tl_per_page = 5)
        {
            $vec_productos = array();
            $query = 'SELECT idProducto, nombre, cantidad, precio, p.idProveedor, nombre_proveedor, mail_contacto ';
            $query .= ' FROM productos p inner join proveedores pv on (p.idProveedor = pv.idproveedor) ';
            $query .= ' ORDER BY nombre ';

            if($indice !=0)
            {
                //para paginado, ya que puede devolver muchos registros
                $query .= ' LIMIT ' . ($indice -1) * $tl_per_page . ',  '  . $tl_per_page;
            }

            $query .= ';';

            if ($rs = $this->db->query($query)) {

                while ($fila = $rs->fetch_assoc())
                {
                        $vec_productos[] = $fila;
                }
                /* liberar el conjunto de resultados */
                $rs->free();
            }

            return $vec_productos;
        }

        public function getTotal()
        {
            $total = 0;

            $query = 'SELECT count(idProducto) as total';
            $query .= ' FROM productos ';
            $query .= ';';

            try {
                if ($rs = $this->db->query($query)) 
                {
                    $fila = $rs->fetch_assoc();
                    $total = $fila['total'];
                }
                 /* liberar el conjunto de resultados */
                $rs->free();
                return $total;
            } catch (Exception $e) {
                return 0;
            }
        }

        public function getProductoById($idProducto)
        {
            $unProducto = null;
            $unProveedor = null;
            $rs = null;
            $query = ' SELECT idProducto, nombre, cantidad, precio, p.idProveedor, nombre_proveedor, mail_contacto ';
            $query .= ' FROM productos p inner join proveedores pv on (p.idProveedor = pv.idproveedor) ';
            $query .= ' WHERE idProducto = ' .$idProducto . ';';

            if ($rs = $this->db->query($query))
            {
                $fila = $rs->fetch_assoc();
                $unProducto = new ProductosDTO();

                $unProducto->setIdProducto($fila['idProducto']);
                $unProducto->setNombre($fila['nombre']);
                $unProducto->setCantidad($fila['cantidad']);
                $unProducto->setPrecio($fila['precio']);

                //cargo los datos provenientes al proveedor, al cual pertenece el producto
                $unProveedor = new ProveedoresDTO();
                $unProveedor->setIdProveedor($fila['idProveedor']);
                $unProveedor->setNombreProveedor($fila['nombre_proveedor']);
                $unProveedor->setMailContacto($fila['mail_contacto']);

                $unProducto->setProveedor($unProveedor);

                /* liberar el conjunto de resultados */
                $rs->free();
            }

            return $unProducto;
        }

        public function dbAgregarUnProducto($unProducto)
        {
            $todo_ok = false;

            $sql = " INSERT INTO productos (nombre, cantidad, precio, idProveedor) ";
            $sql .= " VALUES ('". $unProducto->getNombre(). "', ";
            $sql .= " " . $unProducto->getCantidad() . " , ";
            $sql .= " " . $unProducto->getPrecio() . " , ";
            $sql .= " " . $unProducto->getProveedor()->getIdProveedor() . " ";
            $sql .= ");";
            try {
                $todo_ok = $this->db->query($sql);
                return $todo_ok;
            } catch (Exception $e) {
                return false;
            }

        }

        public function dbModificarUnProducto($unProducto)
        {
            $todo_ok = false;

            $sql = " UPDATE productos SET ";
            $sql .= "  nombre='". $unProducto->getNombre(). "', ";
            $sql .= " cantidad=" . $unProducto->getCantidad() . " , ";
            $sql .= " precio=" . $unProducto->getPrecio() . " , ";
            $sql .= " idProveedor=" . $unProducto->getProveedor()->getIdProveedor() . " ";
            $sql .= " WHERE idProducto=" . $unProducto->getIdProducto() . " ";
            $sql .= ";";

            try {
                $todo_ok = $this->db->query($sql);
                return $todo_ok;
            } catch (Exception $e) {
                return false;
            }

        }

        public function dbEliminarUnProducto($unProducto)
        {
            $todo_ok = false;

            $sql = " DELETE FROM  productos ";
            $sql .= " WHERE idProducto=" . $unProducto->getIdProducto() . " ";
            $sql .= ";";

            try {
                $todo_ok = $this->db->query($sql);
                return $todo_ok;
            } catch (Exception $e) {
                return false;
            }

        }

    }
?>