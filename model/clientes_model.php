<?php
    class ClientesModel{
        
        private $db;

        public function __construct (){
                require_once('model/conexion.php');
                $this->db = conexion::conectar();
        }

        public function getClientes()
        {
            $vec_clientes = array();
            $query = 'SELECT idcliente, apellido, nombre, dni, fecha_nacimiento FROM Clientes;';

            if ($rs = $this->db->query($query)) {

                while ($fila = $rs->fetch_assoc())
                {
                        $vec_clientes[] = $fila;
                }
                /* liberar el conjunto de resultados */
                $rs->free();
            }

            return $vec_clientes;
        }

        public function getClienteById($idCliente)
        {
            $vec_clientes = array();
            $rs = null;
            $query = ' SELECT idcliente, apellido, nombre, dni, fecha_nacimiento FROM Clientes ';
            $query .= ' WHERE idcliente = ' .$idCliente . ';';

            $rs = $this->db->query($query);

            if (!is_null($rs))
            {
                $fila = $rs->fetch_assoc();
                $vec_clientes[] = $fila;
            }

            return $vec_clientes[0];
        }

        public function dbAgregarUnCliente($unCliente)
        {
            $todo_ok = false;

            $sql = " INSERT INTO Clientes (apellido, nombre, dni, fecha_nacimiento) ";
            $sql .= " VALUES ('". $unCliente->getApellido(). "', ";
            $sql .= " '" . $unCliente->getNombre() . "' , ";
            $sql .= " " . $unCliente->getDni() . ", ";
            $sql .= " " . $unCliente->getFechaNacimiento() . " ";
            $sql .= ");";

            try {
                $todo_ok = $this->db->query($sql);
                return $todo_ok;
            } catch (Exception $e) {
                return false;
            }

        }

        public function dbModificarUnCliente($unCliente)
        {
            $todo_ok = false;

            $sql = " UPDATE Clientes SET ";
            $sql .= "  apellido='". $unCliente->getApellido(). "', ";
            $sql .= "  nombre='". $unCliente->getNombre(). "', ";
            $sql .= " dni=" . $unCliente->getDni() . " , ";
            $sql .= " fecha_nacimiento=" . $unCliente->getFechaNacimiento() . " ";
            $sql .= " WHERE idcliente =" . $unCliente->getIdCliente() . " ";
            $sql .= ";";

            try {
                $todo_ok = $this->db->query($sql);
                return $todo_ok;
            } catch (Exception $e) {
                return false;
            }

        }

        public function dbEliminarUnCliente($unCliente)
        {
            $todo_ok = false;

            $sql = " DELETE FROM  Clientes ";
            $sql .= " WHERE idcliente=" . $unCliente->getIdCliente() . " ";
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