<?php
    class ProveedoresModel{
        
        private $db;

        public function __construct (){
                require_once('model/conexion.php');
                $this->db = conexion::conectar();
        }

        public function getProveedores()
        {
            $vec_proveedores = array();
            $query = 'SELECT idproveedor, nombre_proveedor, mail_contacto FROM proveedores;';

            if ($rs = $this->db->query($query)) {

                while ($fila = $rs->fetch_assoc())
                {
                    $unProveedor = new ProveedoresDTO();

                    $unProveedor->setIdProveedor($fila['idproveedor']);
                    $unProveedor->setNombreProveedor($fila['nombre_proveedor']);
                    $unProveedor->setMailContacto($fila['mail_contacto']);
                    $vec_proveedores[] = $unProveedor;
                }
                /* liberar el conjunto de resultados */
                $rs->free();
            }
            
            return $vec_proveedores;
        }

        public function getProveedorById($idProveedor)
        {
            $unProveedor = null;
            $rs = null;
            $query = ' SELECT idproveedor, nombre_proveedor, mail_contacto FROM proveedores ';
            $query .= ' WHERE idproveedor = ' .$idProveedor . ';';

            $rs = $this->db->query($query);

            if (!is_null($rs))
            {
                $fila = $rs->fetch_assoc();
                $unProveedor = new ProveedoresDTO();

                $unProveedor->setIdProveedor($fila['idproveedor']);
                $unProveedor->setNombreProveedor($fila['nombre_proveedor']);
                $unProveedor->setMailContacto($fila['mail_contacto']);

            }

            return $unProveedor;
        }

        public function dbAgregarUnProveedor($unProveedor)
        {
            $todo_ok = false;

            $sql = " INSERT INTO proveedores (nombre_proveedor, mail_contacto) ";
            $sql .= " VALUES ('". $unProveedor->getNombreProveedor(). "', ";
            $sql .= " '" . $unProveedor->getMailContacto() . "'  ";
            $sql .= ");";

            try {
                $todo_ok = $this->db->query($sql);
                return $todo_ok;
            } catch (Exception $e) {
                return false;
            }

        }

        public function dbModificarUnProveedor($unProveedor)
        {
            $todo_ok = false;

            $sql = " UPDATE proveedores SET ";
            $sql .= " nombre_proveedor ='". $unProveedor->getNombreProveedor(). "', ";
            $sql .= " mail_contacto = '" . $unProveedor->getMailContacto() . "' ";
            $sql .= " WHERE idproveedor =" . $unProveedor->getIdProveedor() . " ";
            $sql .= ";";

            try {
                $todo_ok = $this->db->query($sql);
                return $todo_ok;
            } catch (Exception $e) {
                return false;
            }

        }

        public function dbEliminarUnProveedor($unProveedor)
        {
            $todo_ok = false;

            $sql = " DELETE FROM  proveedores ";
            $sql .= " WHERE idproveedor =" . $unProveedor->getIdProveedor() . " ";
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